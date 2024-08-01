<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use App\Models\MetodePembayaran;

use App\Models\TransaksiStatusTemp;
use App\Models\TransaksiStatusHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scanner.index3')->with([
            'title' => 'Data Jasa',

        ]);
    }

    public function checkScanType(Request $request)
    {

        $idUser = userId();
        $checkUser = TransaksiStatusTemp::where('user_id', '=', $idUser)->first();

        if (empty($checkUser)) { // check user if not exist do this
            $pembayaran = Pembayaran::where('kode', '=', $request->content)->first();
            if (!empty($pembayaran)) { // check qr code pembayaran if exist do this
                DB::table('transaksi_status_temp')->insert([
                    'transaksi_id' =>  $pembayaran->id,
                    'user_id' =>   $idUser,
                    'created_at' => timestamp(),
                    'updated_at' => timestamp()
                ]);

                $transaksi  =  Transaksi::where('pembayaran_id', '=', $pembayaran->id)->get();
                $jumlahData = count($transaksi);
                if ($jumlahData == 1) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Update 1 transaksi ready'
                    ]);
                } else if ($jumlahData > 1) {
                    return response()->json([
                        'jumlah_data' => $jumlahData,
                        'data' => $transaksi,
                        'status' => 'success',
                        'message' => 'Update '.$jumlahData.' transaksi ready'
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan'
                    ]);
                }
            }

            $status =  TransaksiStatus::where('qrcode', '=', $request->content)->first();
            if (!empty($status)) { // check qr code status if exist do this
                //
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Input nota terlebih dahulu '
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Qr code tidak dikenali'
            ]);
        } else if (!empty($checkUser)) {  // check user if exist do this
            $status =  TransaksiStatus::where('qrcode', '=', $request->content)->first();

            if (!empty($status)) { // check qr code status if exist do this
                $temp = TransaksiStatusTemp::where('user_id', '=', $idUser)->first();
                $idPembayaran = $temp->transaksi_id;

                $transaksi  =  Transaksi::where('pembayaran_id', '=', $idPembayaran)->get();
                $jumlahData = count($transaksi);
                if ($jumlahData == 1) {
                    DB::table('transaksi_status_temp')
                        ->where('user_id', $idUser)
                        ->update(['status_id' => $status->id]);
                    $tempTransaksi =  TransaksiStatusTemp::where([
                        ['status_id', '=', $status->id],
                        ['user_id', '=', $idUser],
                        ['transaksi_id', '=',  $idPembayaran],
                    ])->first();

                    $transaksi  =  Transaksi::where('pembayaran_id', '=', $idPembayaran)->first();

                    DB::table('transaksi')
                        ->where('id', $transaksi->id)
                        ->update([
                            'status_id' => $tempTransaksi->status_id,
                            'updated_at' => timestamp()
                        ]);

                    DB::table('transaksi_status_history')->insert([
                        'datetime' => timestamp(),
                        'status_id' => $tempTransaksi->status_id,
                        'transaksi_id' => $transaksi->id,
                        'user_id' => $tempTransaksi->user_id,
                        'created_at' => timestamp(),
                        'updated_at' => timestamp()
                    ]);

                    DB::table('transaksi_status_temp')->where([
                        'id' => $tempTransaksi->id,
                        'status_id' => $tempTransaksi->status_id,
                        'transaksi_id' => $tempTransaksi->transaksi_id,
                        'user_id' => $tempTransaksi->user_id,
                    ])->delete();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Update transaksi berhasil'
                    ]);
                } else if ($jumlahData > 1) {
                    if (empty($request->idTransaksi)) {
                        $data = [
                            'jumlah_data' => $jumlahData,
                            'data' => $transaksi
                        ];
                    } else {
                        DB::table('transaksi_status_temp')
                            ->where('user_id', $idUser)
                            ->update(['status_id' => $status->id]);

                        $tempTransaksi =  TransaksiStatusTemp::where([
                            ['status_id', '=', $status->id],
                            ['user_id', '=', $idUser],
                            ['transaksi_id', '=',  $idPembayaran],
                        ])->first();

                        $transaksi  =  Transaksi::find($request->idTransaksi);

                        DB::table('transaksi')
                            ->where('id', $transaksi->id)
                            ->update([
                                'status_id' => $tempTransaksi->status_id,
                                'updated_at' => timestamp()
                            ]);

                        DB::table('transaksi_status_history')->insert([
                            'datetime' => timestamp(),
                            'status_id' => $tempTransaksi->status_id,
                            'transaksi_id' => $transaksi->id,
                            'user_id' => $tempTransaksi->user_id,
                            'created_at' => timestamp(),
                            'updated_at' => timestamp()
                        ]);

                        DB::table('transaksi_status_temp')->where([
                            'id' => $tempTransaksi->id,
                            'status_id' => $tempTransaksi->status_id,
                            'transaksi_id' => $tempTransaksi->transaksi_id,
                            'user_id' => $tempTransaksi->user_id,
                        ])->delete();
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Update transaksi berhasil'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan'
                    ]);
                }
            } else { // check qr code status if not exist do this
                $pembayaran = Pembayaran::where('kode', '=', $request->content)->first();
                if (!empty($pembayaran)) { // check if qr code pembayaran if exist  do this
                    $tempTransaksi = TransaksiStatusTemp::where('user_id', '=', $idUser)->first();
                    DB::table('transaksi_status_temp')
                        ->where('user_id', $idUser)
                        ->update(['transaksi_id' => $pembayaran->id]);

                    $transaksi  =  Transaksi::where('pembayaran_id', '=', $pembayaran->id)->get();
                    $jumlahData = count($transaksi);  //jumlah transaksi
                    if ($jumlahData > 1) { // check jumlah transaksi if more then one do this

                        return response()->json($data = [
                            'jumlah_data' => $jumlahData,
                            'data' => $transaksi,
                             'status' => 'success',
                                'message' => 'Update '.$jumlahData.' transaksi ready'
                        ]);
                    } else if ($jumlahData == 1) { // check jumlah transaksi if just one do this
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Update 1 transaksi ready'
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Qr code tidak dikenali'
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan'
            ]);
        }
    }

    public function getDataPelangganByIdUser()
    {

        $idUser = userId();

        $result = TransaksiStatusTemp::where('user_id', '=', $idUser)->first();

        if (!empty($result->id)) {



            $pembayaran = Pembayaran::find($result->transaksi_id);
            $transaksi = Transaksi::where('pembayaran_id', '=', $pembayaran->id)->get();
            $transaksi2 = Transaksi::where('pembayaran_id', '=', $pembayaran->id)->first();
            $customer = Customer::find($transaksi2->customer_id);

           $idMetode = $pembayaran->metode_id;
           if($idMetode){
                  $metode = MetodePembayaran::find($idMetode);
           }else{
                  $metode = null;
           }

          


            return  response()->json([
                'customer' => $customer,
                'transaksi' => $transaksi,
                'pembayaran' => $pembayaran,
                'metode' => $metode

            ]);
        } else {
            echo "Kosong";
        }
    }

   

    public function pengambilan(){
         return view('scanner.pengambilan')->with([
            'title' => 'Pengambilan',

        ]);
    }

    public function update(UpdateProdukRequest $request, Produk $produk, $id)
    {
        $data = $request->all();
        $produk->find(crypt_open($id))->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }



    public function updatePembayaran(Request $request){
     

        $id = $request->id;
        $pembayaran = Pembayaran::find($id);
       
        $total = $pembayaran->total_harga;
        $tanggalLunas = $pembayaran->tanggal_lunas;
        $diskon = $pembayaran->diskon;
      
        $status = $pembayaran->status;

        $bayarLunas = $total - $diskon;
        // if($status == 3){

        // }
        $data = [
            'status' => 2 ,
            'bayar_lunas' => $bayarLunas
        ];
        Pembayaran::find($id)->fill($data)->save();

        $dataTransaksi = Transaksi::where('pembayaran_id',$id)->get();

        foreach($dataTransaksi as $transaksi){
           $data = [
            'status_id' => 5 
          
            ];  

            Transaksi::find($transaksi->id)->fill($data)->save();



            $dataStatusHistory = [
                    'datetime' => timestamp(),
                    'status_id' => 5,
                    'transaksi_id' => $transaksi->id,
                    'user_id' => userId()
                ];

            TransaksiStatusHistory::create($dataStatusHistory);
         
        }
       

        return back()->with('success', 'Data berhasil diubah');

    }


}
