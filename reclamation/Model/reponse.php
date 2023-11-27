<?php
class reponse
{
    private ?int $idRep = null;
    private ?string $response = null;

    public function __construct($idRep = null,$r)
    {
        $this->idRep = $idRep;
        $this->response = $r;
    }


    public function getIdReponse()
    {
        return $this->idRep;
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
}