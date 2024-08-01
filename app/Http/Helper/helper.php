<?php

use App\Models\Transaksi;
use App\Models\Jasa;
use App\Models\Jurnal;
use App\Models\JurnalAkun;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;


function base_url($link = null)
{

    $url = url('/');
    $result = Str::of($url)->isMatch('/127.0.0.1(.*)/');
    if ($result == false) {
        $url =  url('/public/') . $link;
    } else {
        $url = url('/') . $link;
    }



    return $url;
}
function crypt_make($string = null)
{
    if (!empty($string)) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Secret Key By M.Riko';
        $secret_iv = 'ini adalah my secret iv';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        return base64_encode($output);
    }
}

function crypt_open($string = null)
{
    if (!empty($string)) {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Secret Key By M.Riko';
        $secret_iv = 'ini adalah my secret iv';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
}

function number($data = null)
{
    return 1 + ($data->currentPage() - 1) * $data->perPage();
}


function money($money = null)
{
    return number_format($money, 0, ',', '.');
}
function show()
{
    return  request('show') != '' ?  request('show') : '10';
}

function checkData($data = null)
{
    if ($data == null) {
        return false;
    } else {
        $row = $data->toArray();
        if ($row['total'] > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function timestamp()
{
    return Carbon::now();
}

function selected($request = null, $value = null)
{

    return $request == $value ? 'Selected' : '';
}

function formatTanggal($date = null)
{
    $date = Carbon::parse($date);
    return $date->isoFormat('DD-MM-YYYY');
}


function formatJam($date = null)
{
    $date = Carbon::parse($date);
    return $date->isoFormat('HH:mm');
}

function hari($date = null)
{
    Carbon::setLocale('id');
    $date = Carbon::parse($date);
    return $date->isoFormat('dddd');
}

function null_dash($data = null)
{
    if (!empty($data)) {
        return $data;
    } else {
        return '-';
    }
}

function segment($data = null)
{

    if ($data == 1)
        return FacadesRequest::segment(1);
    else if ($data == 2) {
        return FacadesRequest::segment(2);
    } else if ($data == 3) {
        return FacadesRequest::segment(3);
    }
}

function is_active($data = null)
{
    if ($data == 'Y') {
        echo '<span class="badge badge-success" style="width: 80px">Aktif</span>';
    } else if ($data == 'N') {
        echo '<span class="badge badge-danger" style="width: 80px">Tidak
        Aktif</span>';
    } else {
        echo '<span class="badge badge-light" style="width: 80px">-</span>';
    }
}

function deadline($time = null)
{

    $array = explode(':', $time);
    $hour = $array[0];
    $minute = $array[1];

    $totalHour = $hour + ($minute / 60);
    $day = ($totalHour / 24);
    $leftHour =  ((($totalHour / 24) - (int)$day) * 24);
    $leftMinute = (($leftHour -  (int)$leftHour) * 60);

    $day = (int)$day;
    $hour = (int)$leftHour;
    $minute = (int)$leftMinute;
    if ($day < 0 || $hour < 0 || $minute < 0) {
        $deadline = '-';
        $color = 'secondary';
    } else {
        if ($day != 0 && $hour != 0 && $minute != 0) {
            $deadline = $day . ' Hari - ' . $hour . ' Jam';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day != 0 && $hour == 0 && $minute != 0) {
            $deadline = $day . ' Hari - ' . $minute . ' Menit';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day != 0 && $hour == 0 && $minute == 0) {
            $deadline = $day . ' Hari';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day == 0 && $hour != 0 && $minute != 0) {
            $deadline = $hour . ' Jam - ' . $minute . ' Menit';
            $color = 'danger';
        } else if ($day == 0 && $hour != 0 && $minute == 0) {
            $deadline = $hour . ' Jam';
            $color = 'danger';
        } else if ($day == 0 && $hour == 0 && $minute != 0) {
            $deadline =  $minute . ' Menit';
            $color = 'danger';
        } else {
            $deadline = '-';
            $color = 'secondary';
        }
    }


    echo  '<span class="badge badge-' . $color . '" style="width:110px">' . $deadline . '</span>';
}


function addTime($time = null)
{
    $date = date_create();
    date_add($date, date_interval_create_from_date_string($time . ' hours'));
    return    date_format($date, 'Y-m-d H:i:s');
}

function countDown($datetime = null)
{

    $diff  = date_diff(date_create($datetime), date_create());

    $day = $diff->d;
    $hour = $diff->h;
    $minute = $diff->i;
    if ($diff->invert == 0) {
        $deadline = '-';
        $color = 'secondary';
    } else {

        if ($day != 0 && $hour != 0 && $minute != 0) {
            $deadline = $day . ' H - ' . $hour . ' J';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day != 0 && $hour == 0 && $minute != 0) {
            $deadline = $day . ' H - ' . $minute . ' M';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day != 0 && $hour == 0 && $minute == 0) {
            $deadline = $day . ' H';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day == 0 && $hour != 0 && $minute != 0) {
            $deadline = $hour . ' J - ' . $minute . ' M';
            $color = 'danger';
        } else if ($day == 0 && $hour != 0 && $minute == 0) {
            $deadline = $hour . ' J';
            $color = 'danger';
        } else if ($day == 0 && $hour == 0 && $minute != 0) {
            $deadline =  $minute . ' M';
            $color = 'danger';
        } else {
            $deadline = '-';
            $color = 'secondary';
        }
    }


    echo  '<span class="badge badge-' . $color . '" style="width:75px">' . $deadline . '</span>';
}

function deadlineShort($datetime = null)
{

    $diff  = date_diff(date_create($datetime), date_create());
    return $diff;

    $arrayDatetime = explode(' ', $datetime);
    $time = $arrayDatetime[1];

    $array = explode(':', $time);
    $hour = $array[0];
    $minute = $array[1];

    $totalHour = $hour + ($minute / 60);
    $day = ($totalHour / 24);
    $leftHour =  ((($totalHour / 24) - (int)$day) * 24);
    $leftMinute = (($leftHour -  (int)$leftHour) * 60);

    $day = (int)$day;
    $hour = (int)$leftHour;
    $minute = (int)$leftMinute;
    if ($day < 0 || $hour < 0 || $minute < 0) {
        $deadline = '-';
        $color = 'secondary';
    } else {
        if ($day != 0 && $hour != 0 && $minute != 0) {
            $deadline = $day . ' H - ' . $hour . ' J';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day != 0 && $hour == 0 && $minute != 0) {
            $deadline = $day . ' H - ' . $minute . ' M';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day != 0 && $hour == 0 && $minute == 0) {
            $deadline = $day . ' H';
            if ($day == 1) {
                $color = 'warning';
            } else {
                $color = 'success';
            }
        } else if ($day == 0 && $hour != 0 && $minute != 0) {
            $deadline = $hour . ' J - ' . $minute . ' M';
            $color = 'danger';
        } else if ($day == 0 && $hour != 0 && $minute == 0) {
            $deadline = $hour . ' J';
            $color = 'danger';
        } else if ($day == 0 && $hour == 0 && $minute != 0) {
            $deadline =  $minute . ' M';
            $color = 'danger';
        } else {
            $deadline = '-';
            $color = 'secondary';
        }
    }


    echo  '<span class="badge badge-' . $color . '" style="width:65px">' . $deadline . '</span>';
}

function statusPembayaran($status = null)
{
    if ($status == 0 || $status == 1) {
        echo  '<span class="badge badge-warning" style="width:50px">Unpaid</span>';
    } elseif ($status == 2) {
        echo  '<span class="badge badge-success" style="width:50px">Lunas</span>';
    } elseif ($status == 3) {
        echo  '<span class="badge badge-danger" style="width:50px">Lose</span>';
    } else {
        echo  '<span class="badge badge-secondary" style="width:50px">-</span>';
    }
}

function statusPembayaranShort($status = null)
{
    if ($status == 0 || $status == 1) {
        echo  '<span class="badge badge-warning text-center" style="width:25px"><i class="bi bi-hourglass text-white text-center"></i></span>';
    } elseif ($status == 2) {
        echo  '<span class="badge badge-success text-center" style="width:25px"><i class="bi bi-check text-white text-center"></i></span>';
    } elseif ($status == 3) {
        echo  '<span class="badge badge-danger text-center" style="width:25px">x</span>';
    } else {
        echo  '<span class="badge badge-secondary text-center" style="width:25px">-</span>';
    }
}


function getTransaksiById($id)
{
    return Transaksi::where('pembayaran_id', $id)->get();
}

function QrCode($string = null, $size = 300)
{

    if (!empty($string)) {
        return QrCode::size($size)->margin(1)->generate($string);
    }
}

function cabangId()
{
    return auth()->user()->cabang_id;
}

function roleId()
{
    return auth()->user()->role_id;
}

function userId()
{
    return auth()->user()->id;
}


function resetFilter()
{
    return back();
}

function telpWa($nohp = null)
{
    if (!preg_match("/[^+0-9]/", trim($nohp))) {
        // cek apakah no hp karakter ke 1 dan 2 adalah angka 62
        if (substr(trim($nohp), 0, 2) == "62") {
            $hp    = trim($nohp);
        }       // cek apakah no hp karakter ke 1 adalah angka 0
        else if (substr(trim($nohp), 0, 1) == "0") {
            $hp    = "62" . substr(trim($nohp), 1);
        } else {
            $hp = $nohp;
        }

        return $hp;
    }
}

function checkCustomize($id = null)
{
    $jasa = Jasa::find($id);

    return $jasa->customize;
}

function getStokByProdukId($id = null)
{
    $produk = Produk::find($id);
    return $produk->jumlah_stok;
}


function message($type = null, $value = null)
{
    Session::flash($type, $value);
}


function jurnalOtomatis()
{
    $month = date('m');
    $day = date('d');
    if (in_array($day, [1, 2, 3, 4])) {
        $monthPrev =  date("Y-m", strtotime("last day of previous month"));
        $monthNow = date('Y-m');

        $monthPrev31 = $monthPrev . '-31';
        $monthPrev30 = $monthPrev . '-30';
        $monthPrev29 = $monthPrev . '-29';
        $monthPrev28 = $monthPrev . '-28';

        $tanggalTransaksi =  Transaksi::where('tanggal', 'LIKE', "%$monthNow%")
            ->orWhere('tanggal', 'LIKE', "%$monthPrev31%")
            ->orWhere('tanggal', 'LIKE', "%$monthPrev30%")
            ->orWhere('tanggal', 'LIKE', "%$monthPrev29%")
            ->orWhere('tanggal', 'LIKE', "%$monthPrev28%")
            ->groupBy('tanggal')->get();
    } else {
        $tanggalTransaksi =  Transaksi::where('tanggal', 'LIKE', "%$month%")->groupBy('tanggal')->get();
    }





    foreach ($tanggalTransaksi as $value) {
        $tanggal = $value['tanggal'];
        // echo $tanggal;
        // echo '<br>';


        $jurnal =  Jurnal::where('tanggal', $tanggal)
            ->whereIn('akun_id', [7, 8]) // 7 Pendapatan penjualan 8 Biaya Administrasi
            ->exists(); // 
        // dump($jurnal);
        if (!$jurnal) {

            // echo 'create';
            // dd('ta');
            $totalHarga =  DB::table('transaksi')->selectRaw('tanggal, sum(total_harga) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();



            $keterangan = "Pendapatan Penjualan";


            $akundIdPendapatanPenjualan = 7; // pendapatan penjualan
            $jurnalAkun = JurnalAkun::find($akundIdPendapatanPenjualan);


            if ($jurnalAkun->saldo_normal == 'DEBIT') {
                $debit =  $totalHarga->total;
                $kredit = 0;
            } else if ($jurnalAkun->saldo_normal == 'KREDIT') {
                $debit =  0;
                $kredit = $totalHarga->total;
            }

            //Pendapatan
            $data = [
                'tanggal' =>  $tanggal,
                'keterangan' => $keterangan,
                'debit' =>  $debit,
                'kredit' => $kredit,
                'akun_id' => $akundIdPendapatanPenjualan

            ];
            Jurnal::create($data);

            $totalAdministrasi =  DB::table('transaksi')->selectRaw('tanggal, sum(administrasi) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();;

            // $totalAdministrasi =  Transaksi::selectRaw('SUM(administrasi) as administrasi')->where('tanggal', 'LIKE', `%$tanggal%`)->first();



            $akundIdAdministrasi = 8; // Administrasi
            $jurnalAkun = JurnalAkun::find($akundIdAdministrasi);


            $keterangan = "Biaya Administrasi";
            if ($jurnalAkun->saldo_normal == 'DEBIT') {
                $debit =  $totalAdministrasi->total;
                $kredit = 0;
            } else if ($jurnalAkun->administrasi == 'KREDIT') {
                $debit =  0;
                $kredit = $totalAdministrasi->total;
            }
            $data = [
                'tanggal' =>  $tanggal,
                'keterangan' => $keterangan,
                'debit' =>  $debit,
                'kredit' => $kredit,
                'akun_id' => $akundIdAdministrasi

            ];
            Jurnal::create($data);
        } else {
            // echo 'update';

            $totalHarga =  DB::table('transaksi')->selectRaw('tanggal, sum(total_harga) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();



            $keterangan = "Pendapatan Penjualan";


            $akundIdPendapatanPenjualan = 7; // pendapatan penjualan
            $jurnalAkun = JurnalAkun::find($akundIdPendapatanPenjualan);


            if ($jurnalAkun->saldo_normal == 'DEBIT') {
                $debit =  $totalHarga->total;
                $kredit = 0;
            } else if ($jurnalAkun->saldo_normal == 'KREDIT') {
                $debit =  0;
                $kredit = $totalHarga->total;
            }
            // $jurnalUmum = Jurnal::where('tanggal', $tanggal)
            //     ->where('akun_id', $akundIdPendapatanPenjualan)->first();

            $jurnalUmum =  DB::table('jurnal_umum')
                ->where('tanggal', 'LIKE', '%' . $tanggal . '%')
                ->where('akun_id', $akundIdPendapatanPenjualan)
                ->first();



            //Pendapatan
            $data = [
                'tanggal' =>  $tanggal,
                'keterangan' => $keterangan,
                'debit' =>  $debit,
                'kredit' => $kredit,
                'akun_id' => $akundIdPendapatanPenjualan

            ];
            Jurnal::find($jurnalUmum->id)->fill($data)->save();


            $totalAdministrasi =  DB::table('transaksi')->selectRaw('tanggal, sum(administrasi) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();;




            $akundIdAdministrasi = 8; // Administrasi
            $jurnalAkun = JurnalAkun::find($akundIdAdministrasi);


            $jurnalUmum =  DB::table('jurnal_umum')
                ->where('tanggal', 'LIKE', '%' . $tanggal . '%')
                ->where('akun_id', $akundIdAdministrasi)
                ->first();;
            $keterangan = "Biaya Administrasi";

            if ($jurnalAkun->saldo_normal == 'DEBIT') {
                $debit =  $totalAdministrasi->total;
                $kredit = 0;
            } else if ($jurnalAkun->administrasi == 'KREDIT') {
                $debit =  0;
                $kredit = $totalAdministrasi->total;
            }
            $data = [
                'tanggal' =>  $tanggal,
                'keterangan' => $keterangan,
                'debit' =>  $debit,
                'kredit' => $kredit,
                'akun_id' => $akundIdAdministrasi

            ];
            Jurnal::find($jurnalUmum->id)->fill($data)->save();
        }
    }
}



function bulanStringArray($bulan = null)
{

    $dataBulan = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',

    ];
    $bulan = $bulan - 1;
    return $dataBulan[$bulan];
}

function getYearAuto()
{
    return DB::select('SELECT YEAR(tanggal)  as tahun FROM jurnal_umum GROUP BY tahun');
}
