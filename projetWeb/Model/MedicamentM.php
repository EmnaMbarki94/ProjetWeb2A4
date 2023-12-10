<?php
class Medicament
{
    private ?int $id = null;
    private ?int $codeM = null;
    private ?string $Nom = null;
    private ?float $Prix = null;
    private ?int $Quantite = null;
    private ?string $image= null;



    public function __construct($i = null, $c, $n, $p, $q,$img=null)
    {
        $this->id =$i ;
        $this->codeM = $c;
        $this->Nom = $n;
        $this->Prix = $p ?? null; // Utilisation de l'opérateur de coalescence nulle
        $this->Quantite = $q;
        $this->image = $img;
    }
    
    public function getAllMedicaments()
    {
        return $this->id;
        return $this->codeM;
        return $this->Nom;
        return $this->Prix;
        return $this->Quantite;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getcodeM()
    {
        return $this->codeM;
    }
    
    public function setcodeM($codeM)
    {
        $this->codeM = $codeM;

        return $this;
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

