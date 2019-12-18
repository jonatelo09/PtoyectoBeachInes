<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1.0">
    <title>Beach Hotel Ines</title>

    <style type="text/css">
    body{
        font-size: 16px;
        font-family: "Arial";
    }
    table{
        border-collapse: collapse;
    }
    td{
        padding: 6px 5px;
        font-size: 15px;
    }
    .h1{
        font-size: 21px;
        font-weight: bold;
    }
    .h2{
        font-size: 18px;
        font-weight: bold;
    }
    .tabla1{
        margin-bottom: 20px;
    }
    .tabla2 {
        margin-bottom: 20px;
    }
    .tabla3{
        margin-top: 15px;
    }
    .tabla3 td{
        border: 1px solid #000;
    }
    /*.tabla3 .cancelado{
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
        border-top: 1px dotted #000;
        width: 200px;
    }*/
    .emisor{
        color: red;
    }
    .linea{
        border-bottom: 1px dotted #000;
    }
    .border{
        border: 1px solid #000;
    }
    .fondo{
        background-color: #dfdfdf;
    }
    .fisico{
        color: #fff;
    }
    .fisico td{
        color: #fff;
    }
    .fisico .border{
        border: 1px solid #fff;
    }
    .fisico .tabla3 td{
        border: 1px solid #fff;
    }
    .fisico .linea{
        border-bottom: 1px dotted #fff;
    }
    .fisico .emisor{
        color: #fff;
    }
    .fisico .tabla3 .cancelado{
        border-top: 1px dotted #fff;
    }
    .fisico .text{
        color: #000;
    }
    .fisico .fondo{
        background-color: #fff;
    }
</style>
</head>
<body>
    <div>
        <table width="100%" class="tabla1">
            <tr>
                <td width="15%" align="center"><img id="logo" src="http://nebula.wsimg.com/de6f8dcc6a000db1090a216905c3338e?AccessKeyId=EC043E7A0C4F8DBACC78&disposition=0&alloworigin=1" alt="" width="150" height="100" align="left"></td>
                <td width="45%" align="center">
                	<table width="100%">
                		<tr>
                			<td align="center"><span class="h1"><strong>BEACH HOTEL INES</strong></span></td>
            			</tr>
            			<tr>
                			<td align="center">Tel.: (954) 582-0416 - Cel.: 954-582-0792</td>
            			</tr>
                	</table>
                </td>
                <td width="40%"  align="center" style="padding-right:0">
                    <table width="100%">
                        <tr>
                            <td height="15" align="center" class="border"><span class="h2">Email: info@hotelines.com</span></td>
                        </tr>
                        <tr>
                            <td height="14" align="center" class="border fondo"><span class="h1">Comprobante de pago</span></td>
                        </tr>
                        <tr>
                            <td height="15" align="center" class="border">001- Nº <span class="text">numero</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" class="tabla2">
            <tr>
                <td width="11%">Cliente: {{$details_id->firstname}} {{$details_id->lastname}} </td>
                <td width="55%" class="linea"><span class="text"></span></td>

                <td width="4%">&nbsp;</td>
                <td width="7%" align="center" class="border fondo"><strong>DÍA</strong></td>
                <td width="8%" align="center" class="border fondo"><strong>MES</strong></td>
                <td width="7%" align="center" class="border fondo"><strong>AÑO</strong></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td class="linea"><span class="text">Playa de Zicatela, Calle del Morro, Puerto Escondido, Oax., Mex.</span></td>
                <td>&nbsp;</td>
                <td align="center" class="border"><span class="text"></span>{{$day}} </td>
                <td align="center" class="border"><span class="text"></span>{{$month}} </td>
                <td align="center" class="border"><span class="text"></span>{{$year}} </td>
            </tr>
        </table>
        <table width="100%" class="tabla3">
            <tr>
                <td align="center" class="fondo"><strong>CANTIDAD NOCHES</strong></td>
                <td align="center" class="fondo"><strong>DESCRIPCIÓN</strong></td>
                <td align="center" class="fondo"><strong>COSTO POR NOCHE</strong></td>
                <td align="center" class="fondo"><strong>IMPORTE</strong></td>
            </tr>
<?php
$des = json_decode($details_id->descripcion, true);
?>
            <tr>
                <td width="7%" align="center"><span class="text">{{$details_id->quantity}} </span></td>
                @if(is_array($des))
                  <td class="text-justify" width="59%">
                    <span>
                      @foreach($des as $key => $desc)
                         {{ $desc["descrip"] }}, {{ $desc["can_p"] }}, {{ $desc["can_c"] }}.
                      @endforeach
                  </span>
                  </td>
                @endif
                <td width="16%" align="right"><span class="text">{{$details_id->price}} </span></td>
                <td width="18%" align="right"><span class="text"></span>{{$details_id->price * $details_id->quantity}} </td>
            </tr>

            <tr>
                <td width="7%">&nbsp;</td>
                <td width="59%">&nbsp;</td>
                <td width="16%">&nbsp;</td>
                <td width="18%" align="left">&nbsp;</td>
            </tr>

            <tr>
                <td style="border:0;">&nbsp;</td>
                <td style="border:0;">&nbsp;</td>
                <td align="right"><strong>TOTAL</strong></td>
                <td align="right"><span class="text"></span></td>
            </tr>

        </table>
    </div>
</body>
</html>