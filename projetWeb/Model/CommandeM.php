<?php
class Commande
{
    private ?int $id = null;
    private ?string $dateC = null;
    private ?float $totale = null;
    private ?int $idClient = null;

    public function __construct($i = null,$d, $t,$c)
    {
        $this->id = $i;
        $this->dateC = $d;
        $this->totale = $t;
        $this->idClient = $c;
    }

    
    public function getid()
    {
        return $this->id;
    }

    
    public function getdateC()
    {
        return $this->dateC;
    }


    public function setdateC($dateC)
    {
        $this->dateC = $dateC;

        return $this;
    }

    public function gettotale()
    {
        return $this->totale;
    }


    public function settotal($totale)
    {
        $this->totale= $totale;

        return $this;
    }
    public function getidClient()
    {
        return $this->idClient;
    }


    public function setidClient($idClient)
    {
        $this->idClient= $idClient;

        return $this;
    }


}
