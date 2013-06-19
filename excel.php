<?php
require_once("class/class.php");
$nombre="reportedenoticias_".date("h:i:s")."_".date("d-m-Y").".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$nombre");
?>
<html>
<head>
<title>Generar excel din&aacute;mico con php y mysql</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<?php
$tra=new Trabajo();
$reg=$tra->get_noticias();
?>

<table align="center">

<tr>
<td align="center" colspan="7">
<h2>Noticias de la web</h2>
</td>
</tr>

<tr style=" background-color:#666666; color:#FFFFFF; font-weight:bold; font-size:12px;">
<td align="center" valign="middle">
T&iacute;tulo
</td>
<td align="center" valign="middle">
Detalle
</td>
<td align="center" valign="middle">
Fecha
</td>
<td align="center" valign="middle">
Nombre autor
</td>
<td align="center" valign="middle">
Correo autor
</td>
<td align="center" valign="middle">
País autor
</td>
<td align="center" valign="middle">
Empresa autor
</td>
</tr>

<?php
for ($i=0;$i<sizeof($reg);$i++)
{
?>

<tr style=" background-color:#f0f0f0; font-size:12px;">
<td align="center">
<?php echo $reg[$i]["titulo"];?>
</td>
<td align="center">
<div align="justify" style="margin: 10px 10px 10px 10px;">
<?php echo $reg[$i]["detalle"];?>
</div>
</td>
<td align="center">
<?php echo Conectar::invierte_fecha($reg[$i]["fecha"]);?>
</td>
<td align="center">
<?php echo $reg[$i]["nombre"];?>
</td>
<td align="center">
<?php echo $reg[$i]["correo"];?>
</td>
<td align="center">
<?php echo $reg[$i]["pais"];?>
</td>
<td align="center">
<?php echo $reg[$i]["empresa"];?>
</td>
</tr>
<?php
}
?>

</table>

</body>
</html>