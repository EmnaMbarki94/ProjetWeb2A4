<?php
class pharmacie
{
    private ?int $idPh = null;
    private ?string $nomPh = null;
    private ?string $adressePh = null;
    private ?int $numPh = null;
    private ?string $email = null;
    private ?string $mdp = null;

    public function __construct($id = null, $n, $a, $t, $e,$m)
    {
        $this->idPh = $id;
        $this->nomPh = $n;
        $this->adressePh = $a;
        $this->numPh = $t;
        $this->email = $e;
        $this->mdp = $m;
    }


    public function getIdPharmacie()
    {
        return $this->idPh;
    }


    public function getNom()
    {
        return $this->nomPh;
    }


    public function setNom($nomPh)
    {
        $this->nomPh = $nomPh;

        return $this;
    }


    public function getAdresse()
    {
        return $this->adressePh;
    }


    public function setAdresse($adressePh)
    {
        $this->adressePh= $adressePh;

        return $this;
    }

    public function getNum()
    {
        return $this->numPh;
    }


    public function setNum($numPh)
    {
        $this->numPh = $numPh;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->emailPh = $email;

        return $this;
    }


    public function getMdp()
    {
        return $this->mdp;
    }


    public function setMdp($mdp)
    {
        $this->mdpPh = $mdp;

        return $this;
    }
}