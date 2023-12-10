<?php
class LigneCommande
{
    private ?int $id = null;
    private ?int $idM= null;
    private ?int $idC= null;
    private ?float $Quantite = null;
    private ?float $total = null;
    private ?int $idClient = null;

    public function __construct($i = null,$m,$c, $q, $t,$cc)
    {
        $this->id = $i;
        $this->idM = $m;
        $this->idC = $c;
        $this->Quantite = $q;
        $this->total = $t;
        $this->idClient = $cc;
    }

    
    public function getid()
    {
        return $this->id;
    }

    public function getidM()
    {
        return $this->idM;
    }


    public function setidM($idM)
    {
        $this->idM = $idM;

        return $this;
    }
    public function getidC()
    {
        return $this->idC;
    }


    public function setidC($idC)
    {
        $this->idC = $idC;

        return $this;
    }

    public function getQuantite()
    {
        return $this->Quantite;
    }


    public function setQuantite($Quantite)
    {
        $this->Quantite = $Quantite;

        return $this;
    }


    public function gettotal()
    {
        return $this->total;
    }


    public function settotal($total)
    {
        $this->total= $total;

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
