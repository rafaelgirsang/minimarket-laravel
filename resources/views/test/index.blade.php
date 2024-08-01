<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local</title>
</head>

<body>
    <table style=" text-align:center">
        <tr>

            <td>Pembayaran 1</td>
            <td>Pembayaran 2</td>
            <td>Pembayaran 3</td>
            <td>Pembayaran 4</td>
            <td>Pembayaran 5</td>
        </tr>
        <tr>
            <td>{{ QrCode('112E78343B4C', 200) }}</td>
            <td>{{ QrCode('112E78343B88', 200) }}</td>
            <td>{{ QrCode('112E78343BA4', 200) }}</td>
            <td>{{ QrCode('112E78343BBE', 200) }}</td>
            <td>{{ QrCode('112ECFEF1619', 200) }}</td>

        </tr>

    </table>
    <hr>
    <table style=" text-align:center; padding-top:10px">
        <tr>

            <td>Antri</td>
            <td>Cuci</td>
            <td>Setrika</td>
            <td>Packing</td>
            <td>Selesai</td>
            <td>Cancel</td>
        </tr>
        <tr>
            <td>{{ QrCode('4j4h3k4j4h', 200) }}</td>
            <td>{{ QrCode('kdbrks9ej4', 200) }}</td>
            <td>{{ QrCode('kdje934j5i', 200) }}</td>
            <td>{{ QrCode('0sj4jfekd3', 200) }}</td>
            <td>{{ QrCode('694k3jfosjk', 200) }}</td>
            <td>{{ QrCode('5rkwjtofkw', 200) }}</td>

        </tr>

    </table>

    <a href="test/download">PDF</a>

</body>

</html>
