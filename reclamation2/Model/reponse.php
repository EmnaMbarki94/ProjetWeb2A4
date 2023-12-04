<?php
class reponse
{
    private ?int $id = null;
    private ?string $response = null;
    private ?int $idreclamation = null;

    public function __construct($id = null,$r,$idreclamation)
    {
        $this->id = $id;
        $this->response = $r;
        $this->idreclamation = $idreclamation;
    }


    public function getIdReponse()
    {
        return $this->id;
    }

    public function getResponse()
    {
        return $this->response;
    }


    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }
    public function getIDreclamation()
    {
        return $this->idreclamation;
    }


    public function setIDreclamation($idreclamation)
    {
        $this->idreclamation = $idreclamation;

        return $this;
    }
}