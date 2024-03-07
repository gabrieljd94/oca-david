<?php

class Casilla {
    private $numero;

    public function __construct($numero) {
        $this->numero = $numero;
    }

    public function getNumero() {
        return $this->numero;
    }
}