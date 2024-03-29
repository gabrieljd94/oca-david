<?php
session_start();
require './controles/Casilla.php';
require './controles/Jugador.php';
require './controles/Tablero.php';
require './controles/Juego.php';

// Verifica si la partida y los jugadores están establecidos
if (!$_SERVER['REQUEST_METHOD'] === 'POST') return;
if (!isset($_SESSION['partida'])) return;


// TEST
echo json_encode($_SESSION);
// TEST




$partida = $_SESSION['partida'];
$turno = $_SESSION['turnoActual']; // Asume que guardas el turno actual en la sesión

$partida->jugarTurno($turno);

$jugadorActual = $partida->getJugador($turno);

$response = [
    'mensaje' => "Turno del jugador $turno: ...",
    'posicion' => $jugadorActual->getPosicion(),
    'hayGanador' => false,
];

// Verifica si hay un ganador
if ($jugadorActual->getPosicion() >= 63) {
    $response['mensaje'] = "¡El jugador $turno ha ganado el juego!";
    $response['hayGanador'] = true;
}

// Prepara para el siguiente turno
$_SESSION['turnoActual'] = ($turno + 1) % count($_SESSION['jugadoresInfo']);

// Devuelve la respuesta
echo  json_encode($response);
