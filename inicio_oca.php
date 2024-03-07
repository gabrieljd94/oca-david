<html>
<head>
	<title>Juego de la oca - inicio</title>
	<link href="css/bootstrap.css?<?= Rand(0, 10000)?>" rel="stylesheet"   />
	<link href="css/styles.css?<?= Rand(0, 10000)?>" rel="stylesheet" />
</head>
<body>
	<div class="portada2">
		<h1 class="text-center text-primary font-weight-bold">El Juego de la Oca</h1>
		<form action="seleccion_jugadores.php" method="get" class="botones">
		<?php 
		require_once("constantes.php");
		for ($i=MINJUGADORES;$i<=MAXJUGADORES;$i++) { ?>
			<button id="j<?=$i?>" value="<?=$i?>" type="submit" name="jugadores" class="btn btn-primary btn-lg">
   				 <?=$i?> jugadores
			</button>
		<?php } ?>
		</form>
	</div>
</body>
</html>
