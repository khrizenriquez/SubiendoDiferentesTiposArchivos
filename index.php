<?php
require_once("class/class.php");
?>
<!DOCTYPE html>
<html lang='es-mx'>
	<head>
		<title>Generar excel dinámico con php y mysql</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><!-- meta para no agrandar la pantalla desde un movil -->
		<!-- area de hojas de estilo -->
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" href="css/jqueryUI/smoothness/jquery-ui-1.10.3.custom.css">
		<!-- area de hojas de estilo -->
	</head>
	<body>
		<?php
		$tra = new Trabajo();
		$reg = $tra->obtenerNoticias();
		?>

		<table align="center" class='table'>
			<tr>
				<td align="center" colspan="7">
					<hr />
					<h2 title='Estas son las noticias'>Noticias de la web</h2>
				</td>
			</tr>

			<tr style="font-size:16px; color: white;" class='label-inverse'>
				<td align="center">
					Título
				</td>
				<td align="center">
					Detalle
				</td>
				<td align="center">
					Fecha
				</td>
				<td align="center">
					Nombre autor
				</td>
				<td align="center">
					Correo autor
				</td>
				<td align="center">
					País autor
				</td>
				<td align="center">
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
						<div align="justify">
						<?php echo $reg[$i]["detalle"];?>
						</div>
					</td>
					<td align="center">
						<?php echo Conectar::invierte_fecha($reg[$i]["fecha"]);?>
					</td>
					<td align="center">
						<?php echo $reg[$i]["Nombre"];?>
					</td>
					<td align="center">
						<?php echo $reg[$i]["Correo"];?>
					</td>
					<td align="center">
						<?php echo $reg[$i]["Pais"];?>
					</td>
					<td align="center">
						<?php echo $reg[$i]["Empresa"];?>
					</td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td align="center" colspan="7">
					<hr>
					<button class='btn btn-success' type="button" title="Presioname para poder exportar este archivo a excel" onClick="window.location='excel.php'"><i class='icon-th icon-white'></i>Exportar a Excel</button>

					<button class='btn btn-primary' type="button" title="Presioname para poder exportar este archivo a archivo txt" onClick="window.location='txt.php';"><i class='icon-edit icon-white'></i>Exportar a TXT</button>

					<button class='btn btn-danger' type="button" title="Presioname para poder exportar este archivo a un pdf" onClick="window.location='pdf.php';"><i class='icon-file icon-white'></i>Exportar a PDF</button>

					<button class='btn btn-danger' type="button"title="Presioname para poder exportar este archivo a un pdf por medio de html" onClick="window.location='pdf_html.php';"><i class='icon-list icon-white'></i>PDF con HTML</button>
					
				</td>
			</tr>
		</table>
		<!-- area de scripts -->
		<script src='js/js/quitandoWebKit.js'></script>
		<script src='js/jQuery/jqueryMin.js'></script>
		<script src='js/jqueryUI/jquery-ui.js'></script>
		<script src='js/jsBootstrap/bootstrap.js'></script>
		<script src='js/jQuery/valoresIniciales.js'></script>
		<!-- area de scripts -->
	</body>
</html>