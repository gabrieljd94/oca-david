<?php
class Jugador {
    private $nombre="";
    private $posicion = 0;
    private $color; // Nueva propiedad para almacenar el color

    public function __construct($nombre, $color) {
        $this->nombre = $nombre;
        $this->posicion = 0;
        $this->color = $color; // Asignar el color recibido a la propiedad
    }

    public function mover($casillas) {
        $nuevaPosicion = $this->posicion + $casillas;
    
        if ($nuevaPosicion > 63) { // Si se pasa de la casilla 63, rebota
            $nuevaPosicion = 63 - ($nuevaPosicion - 63);
        }
    
        $this->posicion = $nuevaPosicion;
    }
    
    public function getPosicion() {
        return $this->posicion;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function getColor() { // Método getter para el color
        return $this->color;
    }
}
