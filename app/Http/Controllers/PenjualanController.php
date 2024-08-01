<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Pembayaran;
use App\Models\ProdukKategori;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request(['search']);
        $data = Penjualan::filter($filter)
            ->selectRaw('*, timediff(deadline,NOW()) AS jam')
            ->orderBy('jam', 'asc')
            ->paginate(show());
        return view('penjualan.index')->with([
            'title' => 'Penjualan',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jasa = Jasa::where('is_active', 'Y')->get();

        return view('penjualan.create')->with([
            'title' => 'Tambah Transakasi',
            'jasa' => $jasa,

        ]);
    }

    public function newKode()
    {
        $kode = substr(uniqid(), 3);
        $kode = "11" . $kode;
        return $kode;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenjualanRequest $request)
    {

        DB::beginTransaction();

        try {
            $customer = [
                'nama' => ucfirst($request['nama']),
                'kode' => strtoupper($request['kode']),
                'telpon' => $request['telpon'],
                'cabang_id' => $request['cabang_id'],
            ];
            Customer::create($customer);

            $jenisPembayaran = $request['jenis'];

            if ($jenisPembayaran == 1) {
                $request['status'] = 1;
                $request['bayar_dp'] =  0;
                $request['bayar_lunas'] =  0;
            } else if ($jenisPembayaran == 2) {
                $request['tanggal_dp'] = timestamp();
                $request['status'] = 2;
                $request['bayar_lunas'] = 0;
            } else if ($jenisPembayaran == 3) {
                $request['bayar_dp'] =  0;
                $request['tanggal_lunas'] =  timestamp();
                $request['bayar_lunas'] = $request['total_harga'];
                $request['status'] = 3;
            }

            $request['tanggal'] = date('Y-m-d');
            $request['kode'] = strtoupper($this->newKode());

            $pembayaran = [
                'tanggal' => $request['tanggal'],
                'kode' => $request['kode'],
                'total_harga' => $request['total_harga'],
                'tanggal_dp' =>  $request['tanggal_dp'],
                'bayar_dp' => $request['bayar_dp'],
                'tanggal_lunas' => $request['tanggal_lunas'],
                'bayar_lunas' => $request['bayar_lunas'],
                'diskon' => 0,
                'status' => $request['status'],
            ];
            Pembayaran::create($pembayaran);

            $dataPembayaran = Pembayaran::latest()->first();
            $idPembayaran = $dataPembayaran->id;

            $dataCustomer = Customer::latest()->first();
            $idCustomer = $dataCustomer->id;

            $penjualan = $request->kt_docs_repeater_basic;

            foreach ($penjualan as $value) :

                $dataJasa = Jasa::find($value['id_jasa']);
                $request['satuan'] = $dataJasa->satuan;
                $date =  Carbon::now();
                $request['deadline'] =  $date->addHours($value['deadline']);
                $request['jasa'] = $dataJasa->jasa;
                $request['pembayaran_id'] = $idPembayaran;
                $request['customer_id'] = $idCustomer;
                $dataTransaksi = [
                    'tanggal' => $request['tanggal'],
                    'jasa' => $request['jasa'],
                    'jumlah' => $value['jumlah'],
                    'harga' =>  $value['harga'],
                    'satuan' => $request['satuan'],
                    'deadline' =>  $request['deadline'],
                    'invoice' => 9,
                    'jasa_id' => $value['id_jasa'],
                    'status_id' => 1,
                    'pembayaran_id' => $request['pembayaran_id'],
                    'customer_id' => $request['customer_id'],
                    'cabang_id' => 1,
                    'user_id' => 1
                ];

                Penjualan::create($dataTransaksi);
            endforeach;


            DB::commit();
            return redirect('penjualan')->with('success', 'Data berhasil ditambah');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('danger', 'Something Went Wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
