<?php
session_start(); // Asegúrate de iniciar la sesión para acceder a $_SESSION

require 'Juego.php'; 
require 'Jugador.php'; 
require 'Tablero.php';
require 'Casilla.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jugadorIndex']) && isset($_POST['resultadoDados'])) {
    $jugadorIndex = $_POST['jugadorIndex'];
    $resultadoDados = $_POST['resultadoDados'];
    
    // Asumiendo que tienes una instancia del juego almacenada en la sesión
    if (isset($_SESSION['partida'])) {
        $partida = unserialize($_SESSION['partida']);
    } else {
        // Inicializar el juego si no existe
        $jugadoresInfo = $_SESSION['jugadores']; // Asumiendo que has guardado la info de los jugadores en la sesión
        $partida = new Juego($jugadoresInfo);
    }
    
    $partida->jugarTurno($jugadorIndex, $resultadoDados); // Asume que tu clase Juego tiene un método jugarTurno
    
    // Verificar si el jugador ha ganado
    $jugador = $partida->getJugador($jugadorIndex);
    $ganador = $jugador->getPosicion() >= 63; // Asumiendo que 63 es la casilla de llegada

    // Guardar el estado actualizado del juego en la sesión
    $_SESSION['partida'] = serialize($partida);

    // Preparar la respuesta para el cliente
    $respuesta = [
        'posicion' => $jugador->getPosicion(),
        'ganador' => $ganador,
        'nombre' => $jugador->getNombre(),
    ];

    header('Content-Type: application/json');
    echo json_encode($respuesta);
} else {
    // Enviar una respuesta de error si la petición no es válida
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Petición inválida.']);
}
