<?php

$a = array();

//sending HTML Code	
$obj8['type'] = 4;//HTML Code


$obj8['content'] = ' <table border="1" style="border-collapse: collapse; width:100%;fon" >
            <thead>
                <tr>

                    <th style="; border-bottom: 1px dotted  black">Jasa</th>
                    <th style="width: 30px; text-align:center; border-bottom: 1px dotted  black;">Jumlah</th>
                    <th style="width: 30px;text-align:right; border-bottom: 1px dotted  black">Harga</th>
                    <th style="width: 30px; text-align:right; border-bottom: 1px dotted  black">Total</th>
                </tr>
            </thead>
            <tbody>

              
             
                <tr>

                    <td ># Cuci Kering</td>
                    <td style="text-align: center">3 Kg</td>
                    <td style="text-align: right">20.000</td>
                    <td style="text-align: right">60.000</td>
                </tr>
               
              
                <tr>
                    <td rowspan="2" style="text-align:center;vertical-align: middle; border-top: 1px dotted  black;" class="img-qrcode">
                    </td>
                    <th colspan="2" style="border-top:1px dotted  black;">Subtotal</th>
                    <th style="text-align: right;border-top:1px dotted  black;">60.000</th>
                </tr>
               
               
                
              
                <tr>

                    <td colspan="2">Pembayaran</td>
                    <td style="text-align: right">Cash</td>
                </tr>
            </tbody>


        </table>';

array_push($a,$obj8);

 


?>