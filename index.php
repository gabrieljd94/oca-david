<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css?<?= Rand(0, 10000)?>" rel="stylesheet" />
    <link href="css/styles.css?<?= Rand(0, 10000)?>" rel="stylesheet" />
    <title>Jugar-OCA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="body">
    <div class="ContenedorTablero">
        <div class="tablero">
            <div class="oca ocaRoja"></div>
            <div class="oca ocaAmarilla"></div>
            <div class="oca ocaAzul"></div>
            <div class="oca ocaVerde"></div>
        </div>
    </div>
    <button id="lanzarDados" class="btn btn-primary btn-lg">Lanzar Dados</button>
    <div id="resultado"></div>
</body>

</html>
<?php
        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asegurarse de que los arrays de 'nombre' y 'color' existen y tienen elementos
            if (isset($_POST['nombre']) && is_array($_POST['nombre']) && isset($_POST['color']) && is_array($_POST['color'])) {
                // Inicializar arrays para almacenar los nombres y colores
                require './controles/Jugador.php';
                require './controles/Tablero.php';
                require './controles/Casilla.php';
                require './controles/Juego.php';
                session_start();
                $_SESSION['jugadores'] = []; // Inicializar el array de jugadores en la sesión
                
                foreach ($_POST['nombre'] as $indice => $nombre) {
                    // Asegurarse de que existe un color correspondiente para el nombre actual
                    if (isset($_POST['color'][$indice])) {
                        // Aplicar trim, stripslashes, y htmlspecialchars a nombre
                        $nombreLimpio = htmlspecialchars(stripslashes(trim($nombre)));
        
                        // Obtener el color y aplicar stripslashes y htmlspecialchars
                        $color = htmlspecialchars(stripslashes($_POST['color'][$indice]));
                        $jugadoresInfo[] = ['nombre' => $nombreLimpio, 'color' => $color];
                        // Almacenar el nombre y el color en el array de jugadores
                        $_SESSION['jugadores'][] = [
                            'nombre' => $nombreLimpio,
                            'color' => $color
                        ];
                    } 
                }
            }
        }
                // $partida = new Juego($jugadoresInfo);
                // $hayGanador = false;
                // $turno = 0; // Variable para llevar cuenta de a quién le toca

                // while (!$hayGanador) {
                //     echo "<br>Turno del jugador " . $turno . ": ";
                //     $partida->jugarTurno($turno);
                //     $jugadorActual = $partida->getJugador($turno); // Asumiendo que tienes un método para obtener el jugador por índice

                //     // Verificar si el jugador actual ha ganado
                //     if ($jugadorActual->getPosicion() >= 63) {
                //         echo "<br>¡El jugador " . $turno . " ha ganado el juego!";
                //         $hayGanador = true;
                //     }
                //  $turno = ($turno + 1) % count($jugadoresInfo); // Pasar al siguiente jugador, vuelve a 0 si supera el número de jugadores
                // }
    ?>

</body>
<script src="js/main.js"></script>

</html>