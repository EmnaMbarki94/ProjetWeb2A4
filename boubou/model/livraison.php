<?php

class Livraison
{
    private ?int $idLiv = null;
    private ?string $nom = null;
    private ?string $destination = null;
    private ?string $numero_tele = null;
    private ?string $Etat_livraison = null;

    public function __construct($id = null, $nom, $destination, $numero_tele, $Etat_livraison)
    {
        $this->idLiv = $id;
        $this->nom = $nom;
        $this->destination = $destination;
        $this->numero_tele = $numero_tele;
        $this->Etat_livraison = $Etat_livraison;
    }

    public function getIdLiv()
    {
        return $this->idLiv;
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

    public function getDestination()
    {
        return $this->destination;
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    public function getNumeroTele()
    {
        return $this->numero_tele;
    }

    public function setNumeroTele($numero_tele)
    {
        $this->numero_tele = $numero_tele;
        return $this;
    }

    public function getEtatLivraison()
    {
        return $this->Etat_livraison;
    }

    public function setEtatLivraison($Etat_livraison)
    {
        $this->Etat_livraison = $Etat_livraison;
        return $this;
    }
}
