<?php
class cabinet
{
    private ?int $id_cabinet = null;
    private ?string $adresse_cabinet= null;
    private ?string $specialite = null;

    public function __construct($id = null, $a, $s)
    {
        $this->id_cabinet= $id;
        $this->adresse_cabinet= $a;
        $this->specialite = $s;
    }


    public function getIdM()
    {
        return $this->id_cabinet;
    }


   

    public function getAdresse()
    {
        return $this->adresse_cabinet;
    }


    public function setAdresse($adresse_cabinet)
    {
        $this->adresse_cabinet = $adresse_cabinet;

        return $this;
    }
    
    public function getSpecialite()
    {
        return $this->specialite;
    }


    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }
}