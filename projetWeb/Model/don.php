<?php

class Don
{
    private ?int $idDons = null;
    private ?string $destination = null;
    private ?string $nom_donneur = null;
    private ?string $type = null;

    public function __construct($id = null, $destination, $nom_donneur, $type)
    {
        $this->idDons = $id;
        $this->destination = $destination;
        $this->nom_donneur = $nom_donneur;
        $this->type = $type;
    }

    public function getIdDons()
    {
        return $this->idDons;
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

    public function getNomDonneur()
    {
        return $this->nom_donneur;
    }

    public function setNomDonneur($nom_donneur)
    {
        $this->nom_donneur = $nom_donneur;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
