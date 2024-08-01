
<?php



function money($money = null)
{
    return number_format($money, 0, ',', '.');
}

function formatTanggalWaktu($date = null)
{
	if($date  == null){
		$tanggal =  "-";
	}else{
		$tanggal = date('d-m-Y', strtotime($date));
		$time =  date('H:i:s', strtotime($date));
		$tanggal = $tanggal.' '.substr($time,0,5);
	}	
	return $tanggal;
	
}

$servername = "localhost";
$database = "u498991828_app";
$username = "u498991828_app";
$password = "SmartLaundry07";
 
// Create connection
 
$conn = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}

$id = $_GET['id'];



$data = $conn->query("SELECT *, transaksi.created_at as tanggal_transaksi, pembayaran.kode as kode_pembayaran, customer.nama as nama_customer, cabang.alamat as alamat_cabang, 
cabang.telp as nomor_telpon, pembayaran.status as status_pembayaran, transaksi.deadline as tanggal_selesai
FROM transaksi 
JOIN pembayaran on pembayaran.id = pembayaran_id
JOIN customer ON customer.id = customer_id
JOIN jasa ON jasa.id = jasa_id
JOIN cabang on cabang.id = transaksi.cabang_id
WHERE transaksi.id = $id")->fetch_array();


$metodeId = $data['metode_id'];

if($metodeId == null){
    $metodePembayaran = '-';
}else{
    
    $metode = $conn->query("SELECT * from metode_pembayaran WHERE id = $metodeId")->fetch_array();
    $metodePembayaran = $metode['metode'];
}
  



$alamatKantor = $data['alamat_cabang'];
$telpon = $data['nomor_telpon'];
$kodeTransaksi = $data['kode_pembayaran'];
$tanggalTransaksi = $data['tanggal_transaksi'];
$tanggalSelesai = $data['tanggal_selesai'];
$namaCustomer = $data['nama_customer'];
$statusPembayaran = $data['status_pembayaran'];
if ($statusPembayaran == 0 || $statusPembayaran == 1) {
    $statusPembayaran = "Belum Bayar";
} else if ($statusPembayaran == 2) {
    $statusPembayaran = "Lunas";
} else {
    $statusPembayaran = '-';
}

$idPembayaran = $data['pembayaran_id'];

$transaksi =  $conn->query("SELECT * FROM transaksi where pembayaran_id = $idPembayaran");
// var_dump($data);



// var_dump($alamat);
// var_dump($telpon);
// var_dump($kodeTransaksi);
// var_dump($tanggalTransaksi);
// var_dump($namaCustomer);


// header('Content-Type: application/json');




$a = array();



$title['type']       = 4;//text
$title['content']    = '<h5 style="font-size:25px ;text-align:center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px" >Purple Bubbles Laundry</h5>';//any string    
                        

array_push($a,$title);

$alamat['type']       = 0;//text
$alamat['content']    = $alamatKantor;//any string    
$alamat['bold']       = 0;//0 if no, 1 if yes
$alamat['align']      =1;//0 if left, 1 if center, 2 if right
$alamat['format']     = 4;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$alamat);

$telp['type']       = 0;//text
$telp['content']    = 'Telp : '.$telpon;//any string    
$telp['bold']       = 0;//0 if no, 1 if yes
$telp['align']      =1;//0 if left, 1 if center, 2 if right
$telp['format']     = 4;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$telp);



$kode['type']       = 0;//text
$kode['content']    = 'Kode Transaksi : '.$kodeTransaksi;//any string    
$kode['bold']       = 0;//0 if no, 1 if yes
$kode['align']      =0;//0 if left, 1 if center, 2 if right
$kode['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$kode);

$tanggal['type']       = 0;//text
$tanggal['content']    = 'Tanggal Masuk   : '.formatTanggalWaktu($tanggalTransaksi);//any string    
$tanggal['bold']       = 0;//0 if no, 1 if yes
$tanggal['align']      =0;//0 if left, 1 if center, 2 if right
$tanggal['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$tanggal);

$tanggalFinish['type']       = 0;//text
$tanggalFinish['content']    = 'Tanggal Selesai : '.formatTanggalWaktu($tanggalSelesai);//any string    
$tanggalFinish['bold']       = 0;//0 if no, 1 if yes
$tanggalFinish['align']      =0;//0 if left, 1 if center, 2 if right
$tanggalFinish['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$tanggalFinish);

$customer['type']       = 0;//text
$customer['content']    = 'Customer       : '.$namaCustomer;//any string    
$customer['bold']       = 0;//0 if no, 1 if yes
$customer['align']      =0;//0 if left, 1 if center, 2 if right
$customer['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$customer);

$line['type']       = 0;//text
$line['content']    = '-----------------------------------------------';//any string    
$line['bold']       = 0;//0 if no, 1 if yes
$line['align']      =0;//0 if left, 1 if center, 2 if right
$line['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$line);

    
while ($value = $transaksi->fetch_array()) {
    
$jasa['type']       = 0;//text
$jasa['content']    = '#'.$value['jasa'];//any string    
$jasa['bold']       = 0;//0 if no, 1 if yes
$jasa['align']      =0;//0 if left, 1 if center, 2 if right
$jasa['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$jasa);


$satuan = $value['satuan'];
if($satuan == 1){
    $satuan = 'Kg';
}else{
    $satuan = 'Pcs';
}


$harga['type']       = 4;//text
$harga['content']    = '<table style="font-size:18px">
                            <tr>
                                <td style="width: 300px; padding-left:10px">'.$value['jumlah'] .' ' .$satuan.' x '.money($value['harga']).'</td>
                                <td  style="width: 100px; text-align:right">'.money($value['jumlah']*$value['harga']).'</td>
                            </tr>
                        </table>';//any string    
array_push($a,$harga);

    $totalHarga[] = $value['jumlah']* $value['harga'];

}

$grandTotal = array_sum($totalHarga);





$line2['type']       = 0;//text
$line2['content']    = '-----------------------------------------------';//any string    
$line2['bold']       = 0;//0 if no, 1 if yes
$line2['align']      =0;//0 if left, 1 if center, 2 if right
$line2['format']     = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$line2);


$subtotal['type']       = 4;//text
$subtotal['content']    = '<table style="font-size:20px">
                            <tr>
                                <td style="width: 300px">Subtotal</td>
                                <td  style="width: 110px; text-align:right">'.money($grandTotal).'</td>
                            </tr>
                        </table>';//any string    
                        


array_push($a,$subtotal);

$pembayaran['type']       = 4;//text
$pembayaran['content']    = '<table style="font-size:20px">
                            <tr>
                                <td style="width: 160px">Pembayaran</td>
                                <td  style="width: 250px; text-align:right">'.$statusPembayaran.'</td>
                            </tr>
                        </table>';//any string    
                        


array_push($a,$pembayaran);

$metodePemb['type']       = 4;//text
$metodePemb['content']    = '<table style="font-size:20px">
                            <tr>
                                <td style="width: 300px">Metode Pembayaran</td>
                                <td  style="width: 110px; text-align:right">'.$metodePembayaran.'</td>
                            </tr>
                        </table>';//any string    

array_push($a,$metodePemb);







$qrcode['type']       = 3;//text
$qrcode['value']      = $kodeTransaksi;//any string    
$qrcode['size']       = 30;//0 if no, 1 if yes
$qrcode['align']      = 1;//0 if left, 1 if center, 2 if right

array_push($a,$qrcode);




$customerName['type']       = 4;//text
$customerName['content']    = '<h1 style="font-size:80px ;text-align:center" >'.strtoupper($namaCustomer).'</h1>';//any string    
                        


array_push($a,$customerName);


$empty['type']       = 0;//text
$empty['content']    = '';//any string    
$empty['bold']       = 0;//0 if no, 1 if yes
$empty['align']      =0;//0 if left, 1 if center, 2 if right

array_push($a,$empty);


$empty['type']       = 0;//text
$empty['content']    = '';//any string    
$empty['bold']       = 0;//0 if no, 1 if yes
$empty['align']      =0;//0 if left, 1 if center, 2 if right

array_push($a,$empty);


echo json_encode($a,JSON_FORCE_OBJECT);



?>