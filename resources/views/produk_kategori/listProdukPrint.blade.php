<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            padding-left: 40px;
            padding-right: 40px;
        }
    </style>
</head>

<body>
    <div class="row" style="text-align: center">
        <span style="text-align: center; font-size:14px; font-weight:bold">Laporan Stok Produk Kategori
            {{ ucFirst(strtolower($kategori)) }} </span>
    </div>
    <div class="row">
        <span style="font-size:12px">Update : <?= formatTanggal(date('Y-m-d')) ?></span>
        <table border="1px" style="width:100%; border: solid 1px black; border-collapse:collapse; font-size:12px";>
            <thead>
                <tr>
                    <td style="text-align: center">No</td>
                    <td style="text-align: center">Nama Produk</td>
                    <td style="text-align: center; width:90px">Stok Sistem</td>
                    <td style="text-align: center; width:90px">Stok Real</td>
                    <td style="text-align: center; width:90px">Catatan</td>
                </tr>
            </thead>
            <tbody>
                <?php
            $no = 1;
            foreach ($data as  $value) { ?>
                <tr>
                    <td style="text-align: center"><?= $no++ ?></td>
                    <td style="text-align:left ; padding-left: 5px"><?= $value['nama_produk'] ?></td>
                    <td style="text-align: center"><?= $value['jumlah_stok'] ?></td>
                    <td></td>
                    <td></td>

                </tr>
                <?php  }?>
            </tbody>

        </table>
    </div>


</body>

</html>
