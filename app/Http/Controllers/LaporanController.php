<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Produk;
use App\Models\ProdukInventori;
use App\Models\Transaksi;
use App\Models\TransaksiInventori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pendapatan()
    {
        $data = TransaksiInventori::selectRaw('transaksi_id,tanggal, ( sum(jumlah*harga_beli) + sum(administrasi) + sum(diskon)) as hpp, sum(jumlah*harga_jual)  as omset,  sum((jumlah*harga_jual) - (jumlah*harga_beli)) - (sum(administrasi) + sum(diskon)) as profit')
            ->join('produk_inventori', 'produk_inventori.id', '=', 'produkInventori_id')
            ->join('produk', 'produk.id', '=', 'produk_inventori.produk_id')
            ->join('transaksi', 'transaksi.id', '=', 'transaksi_id')

            ->groupBy('transaksi_id')
            ->orderBy('transaksi_id', 'desc')
            ->paginate();

        $total = TransaksiInventori::selectRaw('transaksi_id,tanggal,  sum(jumlah*harga_beli) as hpp, (sum(jumlah*harga_jual) ) as omset,
          sum((jumlah*harga_jual) - (jumlah*harga_beli)) -  ( sum(administrasi) - sum(diskon)) as profit,count(distinct(transaksi.id)) as total_transaksi, sum(jumlah) as total_item_terjual')
            ->join('produk_inventori', 'produk_inventori.id', '=', 'produkInventori_id')
            ->join('produk', 'produk.id', '=', 'produk_inventori.produk_id')
            ->join('transaksi', 'transaksi.id', '=', 'transaksi_id')

            ->orderBy('transaksi_id', 'desc')
            ->first();


        $summary = Transaksi::selectRaw('SUM(total_harga) as total_omset, (SUM(total_harga) - SUM(administrasi) - SUM(diskon)) as omset_bersih, (select sum(total_harga) from transaksi where metode_id = 1 and tanggal like "%' . date('Y-m') . '%") as total_cash,
            (select sum(total_harga) - SUM(administrasi) from transaksi where metode_id = 2 and tanggal like "%' . date('Y-m') . '%") as total_qris')
            ->whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->first();




        return view('laporan.pendapatan')->with([
            'title' => 'Pendapatan',
            'data' => $data,
            'omset' => $summary->total_omset,
            'profit' => $total->profit,
            'cash' => $summary->total_cash,
            'qris' => $summary->total_qris,
        ]);
    }

    public function pembelian(Request $request)
    {

        $tanggalAwal =   $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;
        // dd($tanggalAwal, $tanggalAkhir);
        if (!empty($tanggalAwal) && !empty($tanggalAkhir)) {
            $data = Produk::selectRaw('produk_supplier_history.created_at as tanggal, nama_produk, nama_supplier, stok, harga_beli, (stok * harga_beli) total')
                ->join('produk_supplier_history', 'produk.id', '=', 'produk_id')
                ->join('supplier', 'supplier.id', '=',  'supplier_id')
                ->havingBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
                ->orderBy('produk_supplier_history.id', 'desc')
                ->paginate();
        } else {


            $data = Produk::selectRaw('produk_supplier_history.created_at as tanggal, nama_produk, nama_supplier, stok, harga_beli, (stok * harga_beli) total')
                ->join('produk_supplier_history', 'produk.id', '=', 'produk_id')
                ->join('supplier', 'supplier.id', '=',  'supplier_id')
                ->whereMonth('produk_supplier_history.created_at',  date('m'))
                ->whereYear('produk_supplier_history.created_at', date('Y'))
                ->orderBy('produk_supplier_history.id', 'desc')
                ->paginate();
        }


        $total = Produk::selectRaw('count(produk_supplier_history.id) as total_item, sum(stok * harga_beli) total')
            ->join('produk_supplier_history', 'produk.id', '=', 'produk_id')
            ->whereMonth('produk_supplier_history.created_at',  date('m'))
            ->whereYear('produk_supplier_history.created_at', date('Y'))
            ->first();

        $aset = ProdukInventori::selectRaw('sum(jumlah_stok*harga_beli) as total_aset')->first();
        $produk = Produk::selectRaw('count(id) as total_produk')->first();

        // dd($data);

        $totalPendapatan = TransaksiInventori::selectRaw(' (sum(jumlah*harga_jual) ) as omset,
        sum((jumlah*harga_jual) - (jumlah*harga_beli)) -  ( sum(administrasi) - sum(diskon)) as profit')
            ->join('produk_inventori', 'produk_inventori.id', '=', 'produkInventori_id')
            ->join('produk', 'produk.id', '=', 'produk_inventori.produk_id')
            ->join('transaksi', 'transaksi.id', '=', 'transaksi_id')
            ->whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->orderBy('transaksi_id', 'desc')
            ->first();

        $maksimalBelanja = DB::table('saldo_belanja')->find(1);
        $maksimalBelanja = $maksimalBelanja->saldo;
        // dd($maksimalBelanja);

        return view('laporan.pembelian')->with([
            'title' => 'Pembelian',
            'data' => $data,
            'total' => $total,
            'aset' => $aset,
            'produk' => $produk,
            'totalPendapatan' => $totalPendapatan,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'maksimalBelanja' => $maksimalBelanja

        ]);
    }

    public function ambilBelanja(Request $request)
    {
        $saldoAkhir = $request->saldo - $request->jumlah;

        $dataSaldo = [
            'saldo'  => $saldoAkhir
        ];



        DB::table('saldo_belanja')->where('id', 1)->update($dataSaldo);


        $data = [
            'tanggal' => date('Y-m-d'),
            'akun_id' => 2,
            'debit' => $request->jumlah,
            'kredit' => 0,
            'keterangan' => 'Stok Barang',
            'created_at' => timestamp()


        ];
        Jurnal::create($data);

        return back()->with('success', 'Transaksi berhasil disimpan ');
    }
}
