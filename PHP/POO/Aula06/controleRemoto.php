<?php
require_once 'Controlador.php';
class ControleRemoto implements Controlador
{
    //Atributos
    private $volume;
    private $ligado;
    private $tocando;
    //Métodos especiais
    public function __construct()
    {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }
    private function getVolume()
    {
        return $this->volume;
    }
    private function getLigado()
    {
        return $this->ligado;
    }
    private function getTocando()
    {
        return $this->tocando;
    }
    private function setVolume($volume)
    {
        return $this->volume;
    }
    private function setLigado($ligado)
    {
        return $this->ligado;
    }
    private function setTocando($tocando)
    {
        return $this->tocando;
    }

    public function ligar()
    {
        $this->setLigado(true);
    }

    public function desligar()
    {
        $this->setligado(false);
    }

    public function abrirMenu()
    {
        echo "<p>----- MENU -----</p>";
        echo "<br>Está ligado?: " . ($this->getLigado() ? "SIM" : "Não");
        echo "<br>Está tocando?: " . ($this->getTocando() ? "SIM" : "Não");
        echo "<br>Volume: " . $this->getVolume();
        for ($i = 0; $i <= $this->getVolume(); $i += 10) {
            echo "i";
        }
        echo "<br>";
    }

    public function fecharMenu()
    {
        echo "<br>Fechar Menu...";
    }

    public function maisVolume()
    {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 5);
        } else {
            echo "<p>ERRO! Não posso aumentar o volume";
        }
    }

    public function menosVolume()
    {
        if ($this->getLigado()) {
            $this->setLigado($this->getVolume() - 5);
        } else {
            echo "<p>ERRO! Não posso diminuir o volume</p>";
        }
    }

    public function ligarMudo()
    {
        if ($this->getLigado() && $this->getVolume()>0) {
            $this->setVolume(0);
        }
    }

    public function desligarMudo()
    {
        if ($this->getLigado() && $this->getVolume()==0) {
            $this->setVolume(50);
        }
    }

    public function play()
    {
        if ($this->getLigado() && !($this->getTocando())) {
            $this->setTocando(true);
        }
    }

    public function pause()
    {
        if ($this->getLigado() && !($this->getTocando())) {
            $this->setTocando(false);
        }
    }
}
