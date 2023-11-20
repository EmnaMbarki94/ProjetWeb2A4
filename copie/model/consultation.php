<?php
class consultation
{
    private ?int $id_consultation = null;
    private ?string $nom_patient = null;
    private ?string $nom_medecin = null;
    private ?string $email_patient = null;
    private ?string $date_consultation = null;
    private ?string $heure_consultation = null;
    private ?string $symtomes = null;

    public function __construct($id = null, $np, $nm, $a, $d,$h,$s)
    {
        $this->id_consultation = $id;
        $this->nom_patient = $np;
        $this->nom_medecin = $nm;
        $this->email_patient = $a;
        $this->date_consultation = $d;
        $this->heure_consultation = $h;
        $this->symtomes = $s;
    }


    public function getIdconsultation()
    {
        return $this->id_consultation;
    }


    public function getNomPatient()
    {
        return $this->nom_patient;
    }


    public function setNomPatient($nom_patient)
    {
        $this->nom_patient = $nom_patient;

        return $this;
    }


    public function getNomMedecin()
    {
        return $this->nom_patient;
    }


    public function setNomMedecin($nom_medecin)
    {
        $this->nom_medecin = $nom_medecin;

        return $this;
    }


    public function getEmail()
    {
        return $this->email_patient;
    }


    public function setEmail($email_patient)
    {
        $this->email_patient = $email_patient;

        return $this;
    }


    public function getDateConsultation()
    {
        return $this->date_consultation;
    }


    public function setDateConsultation($date_consultation)
    {
        $this->date_consultation = $date_consultation;

        return $this;
    }
    public function getHeureConsultation()
    {
        return $this->heure_consultaion;
    }


    public function setHeureConsultation($heure_consultation)
    {
        $this->heure_consultation = $heure_consultation;

        return $this;
    }
    public function getSymtomes()
    {
        return $this->symtomes;
    }


    public function setSymtomes($symtomes)
    {
        $this->symtomes = $symtomes;

        return $this;
    }
}
