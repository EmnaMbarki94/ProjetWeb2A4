<?php
class reclamation
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $msg = null;

    public function __construct($id = null, $n, $a, $m)
    {
        $this->id = $id;
        $this->nom = $n;
        $this->email = $a;
        $this->msg = $m;
    }


    public function getIdReclamation()
    {
        return $this->id;
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


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getMsg()
    {
        return $this->msg;
    }


    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }
}