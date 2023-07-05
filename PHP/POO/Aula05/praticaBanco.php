<?php
class ContaBanco {
    public $numConta;
    protected $tipo;
    private $saldo;
    private $status;
 
    public function __construct($m, $c, $p) {
        $this->numConta = $m;
        $this->tipo = $c;
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
