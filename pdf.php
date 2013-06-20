<?php
require_once("class/class.php");
require_once("class.ezpdf.php");

$pdf =& new Cezpdf('a3');
//seleccionamos la fuente
$pdf->selectFont('fonts/Helvetica.afm');

//seteamos la información del documento que se creará
$datacreator = array (
					'Title'=>'Reporte PDF',
					'Author'=>'Khriz Enríquez',
					'Subject'=>'Reporte Dinámico con PHP y Mysql Exportado a PDF',
					'Creator'=>'khriz@khriz.com',
					'Producer'=>'https://twitter.com/khrizEnriquez'
					);
$pdf->addInfo($datacreator);

//traemos la data de nuestra base de datos
$tra = new Trabajo();
$reg = $tra->obtenerNoticias();
//cargamos la información en el array multidimensional llamado data
for ($i=0;$i<sizeof($reg);$i++)
{//inicio for
	$data[]=array
	(
		"titulo"=>utf8_decode($reg[$i]["titulo"]),
		"detalle"=>utf8_decode($reg[$i]["detalle"]),
		"fecha"=>Conectar::invierte_fecha($reg[$i]["fecha"]),
		"nombre"=>utf8_decode($reg[$i]["Nombre"]),
		"correo"=>$reg[$i]["Correo"],
		"pais"=>utf8_decode($reg[$i]["Pais"]),
		"empresa"=>utf8_decode($reg[$i]["Empresa"])
	);
}//fin for
	$titles=array
	(
		"titulo"=>"Título",
		"detalle"=>"Detalle",
		"fecha"=>"Fecha",
		"nombre"=>"Nombre Autor",
		"correo"=>"Correo Autor",
		"pais"=>"País Autor",
		"empresa"=>"Empresa Autor"
	);

$options = array(
              'shadeCol'=>array(0.9,0.9,0.9),//Color de las Celdas.
              'xOrientation'=>'center',//El reporte aparecerá Centrado.
              'width'=>700//Ancho de la Tabla.
            );
//ponemos un título
$pdf->ezText("<b>Noticias de la Web</b>\n",16);	
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options);
//mostramos el pdf
$pdf->ezStream();
?>