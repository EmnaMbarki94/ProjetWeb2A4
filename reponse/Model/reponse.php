<?php
class reponse
{
    private ?int $id = null;
    private ?string $response = null;

    public function __construct($id = null,$r)
    {
        $this->id = $id;
        $this->response = $r;
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
}