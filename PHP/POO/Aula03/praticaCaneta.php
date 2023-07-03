<?php
class Caneta {
    public $modelo;
    public  $cor;
    private $ponta;
    protected $carga;
    protected $tampada;

    public function rabiscar() {
        if ($this->tampada == true) {
            echo "<p>ERRO! Não posso rabiscar!";
        } else {
            echo "<p>Estou rabiscando...</P>";
        }
    }

    public function tampar() {
        $this->tampada = true;
    }

    public function destampar() {
        $this->tampada = false;
    }
}
