<?php
class Tablero {
    private $casillas = array();

    public function __construct() {
        for ($i = 0; $i < 63; $i++) {
            $this->casillas[] = new Casilla($i);
        }
    }

    public function getCasilla($numero) {
        return $this->casillas[$numero];
    }
}
