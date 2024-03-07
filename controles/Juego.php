<?php
class Juego {
    private $tablero;
    private $jugadores=array();

    public function __construct($jugadoresInfo) { // Acepta un array asociativo con nombre y color
        $this->tablero = new Tablero();
        foreach ($jugadoresInfo as $jugador) {
            $this->jugadores[] = new Jugador($jugador['nombre'], $jugador['color']);
        }  
    }

    public function getJugador($jugadorIndex) {
        if (isset($this->jugadores[$jugadorIndex])) {
            return $this->jugadores[$jugadorIndex];
        }
    }
    

    public function tirarDados() {
        return rand(2, 12);
    }

    public function jugarTurno($jugadorIndex) {
        $jugador = $this->jugadores[$jugadorIndex]; // Obtener el objeto Jugador
        $dados = $this->tirarDados();
        $jugador->mover($dados);
        // Imprime el nombre y color del jugador
        echo "El jugador " . $jugador->getNombre() . " de color " . $jugador->getColor() . " ha avanzado a la casilla " . $jugador->getPosicion();
    }
    
}
