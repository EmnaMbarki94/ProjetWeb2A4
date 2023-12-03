<?php
class client
{
    private ?int $idClient = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $numTel = null;
    private ?string $mdp = null;
    private ?string $rolee = null;

    public function __construct($id = null, $n, $p, $a, $t, $m,$r)
    {
        $this->idClient = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->numTel = $t;
        $this->mdp = $m;
        $this->rolee = $r;
    }


    public function getIdClient()
    {
        return $this->idClient;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getnumTel()
    {
        return $this->numTel;
    }


    public function setnumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getmdp()
    {
        return $this->mdp;
    }


    public function setmdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getRolee()
    {
        return $this->rolee;
    }


    public function setRolee($rolee)
    {
        $this->rolee = $rolee;

        return $this;
    }

}