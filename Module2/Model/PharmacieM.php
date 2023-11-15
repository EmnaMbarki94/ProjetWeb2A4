<?php
class Medicament
{
    private ?int $codeM = null;
    private ?string $Nom = null;
    private ?float $Prix = null;
    private ?int $Quantite = null;

    public function __construct($id = null, $c, $n, $p, $q)
    {
        $this->codeM = $c;
        $this->Nom = $n;
        $this->Prix = $p ?? null; // Utilisation de l'opérateur de coalescence nulle
        $this->Quantite = $q;
    }
    


    public function getcodeM()
    {
        return $this->codeM;
    }


    public function getNom()
    {
        return $this->Nom;
    }


    public function setNom($Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }


    public function getPrix()
    {
        return $this->Prix;
    }


    public function setPrix($Prix)
{
    $this->Prix = $Prix;

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


}

