<?php
class Caneta {
    private $modelo;
    private $cor;
    private $ponta;
    private $tampada;

    public function __construct($m, $c, $p) {
        $this->modelo = $m;
        $this->cor = $c;
        $this->ponta = $p;
        $this->tampar();

    }

    public function tampar() {
        $this->tampada = true;
    }

    public function getModelo() {
        return $this->modelo;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setCor($cor) {
        $this->cor = $cor; 
    }

    function setPonta($ponta) {
        $this->ponta = $ponta; 
    }
    

    function setTampada($tampada) {
        $this->tampada = $tampada; 
    }

}
