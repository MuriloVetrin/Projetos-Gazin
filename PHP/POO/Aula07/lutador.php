<?php
class Lutador {
    //atributos
    private $nome;
    private $nacionalidade;
    private $idade, $altura, $peso;
    private $categoria, $vitorias, $derrotas, $empates;

    //metodos
    function apresentar() {
        echo "<p> -------------------------------</p>";
        echo "<p> Chegou a hora! O lutador " . $this->getNome();
        echo " Veio diretamente de " .  $this->getNacionalidade();
        echo ", tem " . $this->getIdade() . " anos e pesa " . $this->getPeso() . "Kg";
        echo "<br> Ele tem " . $this->getVitorias() . " vitórias, " ;
        echo $this->getDerrotas() . " derrotas e " . $this->getEmpates() . " empates";
    }
    function status() {
        echo "<p> -------------------------------</p>";
        echo "<p> " . $this->getNome() . " é um peso " . $this->getCategoria();
        echo " e já ganhou " . $this->getVitorias() .  " vezes,";
        echo " perdeu " . $this->getDerrotas() . " vezes e ";
        echo " empatou " . $this->getEmpates() . " vezes!";

    }
    function ganharLuta() {
        $this->setVitorias($this->getVitorias() +1);
    }
    function perderLuta() {
        $this->setDerrotas($this->getDerrotas() +1);
    }
    function empatarLuta() {
        $this->setEmpates($this->getEmpates() +1);
    }
    //Métodos Especiais
    function __construct($no, $na, $id, $al, $pe, $vi, $de, $em)
    {
        $this->nome = $no;
        $this->nacionalidade = $na;
        $this->idade = $id;
        $this->altura = $al;
        $this->setPeso ($pe);
        $this->vitorias = $vi;
        $this->derrotas = $de;
        $this->empates = $em;
    }

    function getNome() {
        return $this->nome;
    }

    function getNacionalidade() {
        return $this->nacionalidade;
    }

    function getIdade() {
        return $this->idade;
    }

    function getAltura() {
        return $this->altura;
    }

    function getPeso() {
        return $this->peso;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getVitorias() {
        return $this->vitorias;
    }

    function getDerrotas() {
        return $this->derrotas;
    }

    function getEmpates() {
        return $this->empates;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setPeso($peso) {
        $this->peso = $peso;
        $this->setCategoria();
    }

    private function setCategoria() {
        if ($this->peso < 52.2) {
            $this->categoria = "iválido";
        } elseif ($this->peso <= 70.3) {
            $this->categoria = "Leve";
        } elseif ($this->peso <= 83.9) {
            $this->categoria = "Médio";
        } elseif ($this->peso <= 120.2) {
            $this->categoria = "Pesado"; 
        } else {
            $this->categoria  = "Inválido";
        }
    }

    function setVitorias($vitorias) {
        $this->vitorias = $vitorias;
    }

    function setDerrotas($derrotas) {
        $this->derrotas = $derrotas;
    }

    function setEmpates($empates) {
        $this->empates = $empates;
    }
}