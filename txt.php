<?php
require_once("class/class.php");
$tra=new Trabajo();
$reg=$tra->get_noticias();
/*
-a = léerá el archivo y se incorporarán los registros al final de la última línea
-r=leer el archivo
-w=leer el archivo y borrar su contenido, y luego reescribir los datos (reescritura)
*/
//$nombre="reportedenoticias_".date("h:i:s")."_".date("d-m-Y").".txt";
$txt=fopen("reporte.txt","w");//creamos y abrimos el txt
//validamos que exista el txt
if (!$txt)
{
	echo "error creando el txt";
	exit;
}
//le insertamos registros al txt
for ($i=0;$i<sizeof($reg);$i++)
{

@fputs($txt,$reg[$i]["titulo"]);
@fputs($txt,"\t");
@fputs($txt,$reg[$i]["detalle"]);
@fputs($txt,"\t");
@fputs($txt,$reg[$i]["fecha"]);
@fputs($txt,"\t");
@fputs($txt,$reg[$i]["nombre"]);
@fputs($txt,"\t");
@fputs($txt,$reg[$i]["correo"]);
@fputs($txt,"\t");
@fputs($txt,$reg[$i]["pais"]);
@fputs($txt,"\t");
@fputs($txt,$reg[$i]["empresa"]);
@fputs($txt,"\t");

@fputs($txt,"\n");
	
}
//cerramos el txt
@fclose($txt);
//de aquí hacia abajo programamos que la descarga sea en un archivo comprimido
require_once("zipfile.php");
$nombre="reportedenoticias_".date("h:i:s")."_".date("d-m-Y").".zip";
$zipfile=new zipfile();
$zipfile->add_file(implode("",file("reporte.txt")), "reporte.txt");

header("Content-type: application/octet-stream");
header("Content-disposition: attachment; filename=$nombre");
echo $zipfile->file();
?>