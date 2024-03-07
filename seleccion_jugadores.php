<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de la oca - selección jugadores</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="portada">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php 
                require_once("constantes.php"); ?>
                <datalist id="colores">
                    <?php 
                    foreach (COLORES as $color =>$valor) {
                        echo "<option value='$valor'>$color</option>";
                    }
                    ?>
                </datalist>

				<form action="index.php" method="post">
    <?php 
    if (!empty($_GET["jugadores"])) {
        $num_jugadores = htmlspecialchars($_GET["jugadores"]);
        if ((is_numeric($num_jugadores)) && ($num_jugadores >= MINJUGADORES) && ($num_jugadores <= MAXJUGADORES)) {
            for ($i = 1; $i <= $num_jugadores; $i++) { ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre jugador <?=$i?>" name="nombre[<?=$i?>]" id="nombre<?=$i?>" required/>
                    <select class="form-select" name="color[<?=$i?>]" id="color<?=$i?>" onchange="cambiarColor(this, <?=$i?>)">
                        <?php foreach (COLORES as $color => $valor) { ?>
                            <option value="<?= $valor ?>"><?= $color ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
        }
    }
    ?>
    <button type="submit" class="btn btn-primary" value="btn_jugar" name="btn_enviar">Jugar</button>
</form>

            </div>
        </div>
    </div>
	<script>
	function cambiarColor(inputColor, jugadorIndex) {
    // Obtener el color seleccionado
    var colorSeleccionado = inputColor.value;

    // Obtener el selector de color y el campo de nombre del jugador
    var selectorColor = document.getElementById("color" + jugadorIndex);
    var inputNombre = document.getElementById("nombre" + jugadorIndex);

    // Cambiar el color de fondo del selector de color
    selectorColor.style.backgroundColor = colorSeleccionado;

    // Actualizar las opciones disponibles en todos los selectores
    actualizarOpcionesColor();
}

function actualizarOpcionesColor() {
    var selectores = document.querySelectorAll('select[class="form-select"]');

    // Crear un array para almacenar los colores ya seleccionados
    var coloresSeleccionados = [];

    // Recorrer todos los selectores para obtener los colores seleccionados
    selectores.forEach(function(selector) {
        coloresSeleccionados.push(selector.value);
    });

    // Recorrer todos los selectores para actualizar las opciones disponibles
    selectores.forEach(function(selector) {
        var valorActual = selector.value;

        // Recorrer todas las opciones del selector
        Array.from(selector.options).forEach(function(opcion) {
            // Si el color de la opción ya está seleccionado en otro selector y no es el valor actual del selector que se está revisando
            if (coloresSeleccionados.includes(opcion.value) && valorActual != opcion.value) {
                // Deshabilitar la opción
                opcion.disabled = true;
            } else {
                // Habilitar la opción
                opcion.disabled = false;
            }
        });
    });
}

// Llamar a actualizarOpcionesColor al cargar la página para inicializar las opciones correctamente
document.addEventListener('DOMContentLoaded', function() {
    actualizarOpcionesColor();
}, false);

	</script>
</body>
</html>
