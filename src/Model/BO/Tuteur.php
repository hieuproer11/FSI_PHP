<?php

namespace BO;

class Tuteur {
    private int $idTut;
    private string $preTut;
    private string $nomTut;
    private string $telTut;
    private string $mailTut;

    public function __construct($idTut, $preTut, $nomTut, $telTut, $mailTut) {
        $this->idTut = $idTut;
        $this->preTut = $preTut;
        $this->nomTut = $nomTut;
        $this->telTut = $telTut;
        $this->mailTut = $mailTut;
    }

    // Getters et setters

    /**
     * @return mixed
     */
    public function getIdTut()
    {
        return $this->idTut;
    }

    /**
     * @param mixed $idTut
     */
    public function setIdTut($idTut): void
    {
        $this->idTut = $idTut;
    }

    /**
     * @return mixed
     */
    public function getPreTut()
    {
        return $this->preTut;
    }

    /**
     * @param mixed $preTut
     */
    public function setPreTut($preTut): void
    {
        $this->preTut = $preTut;
    }

    /**
     * @return mixed
     */
    public function getNomTut()
    {
        return $this->nomTut;
    }

    /**
     * @param mixed $nomTut
     */
    public function setNomTut($nomTut): void
    {
        $this->nomTut = $nomTut;
    }

    /**
     * @return mixed
     */
    public function getTelTut()
    {
        return $this->telTut;
    }

    /**
     * @param mixed $telTut
     */
    public function setTelTut($telTut): void
    {
        $this->telTut = $telTut;
    }

    /**
     * @return mixed
     */
    public function getMailTut()
    {
        return $this->mailTut;
    }

    /**
     * @param mixed $mailTut
     */
    public function setMailTut($mailTut): void
    {
        $this->mailTut = $mailTut;
    }
}