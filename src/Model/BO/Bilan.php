<?php

namespace Model\BO;
class Bilan
{
    protected int $idBil;
    protected string $notorBil;
    protected string $moyBil;
    protected string $remarqueBil;
    protected string $sujMenBil;
    protected DateTime $datBil;
    protected DateTime $datLimBil;

    public function __construct(
        int      $idBil,
        string   $notorBil,
        string   $moyBil,
        string   $remarqueBil,
        string   $sujMenBil,
        DateTime $datBil,
        DateTime $datLimBil
    )
    {
        $this->idBil = $idBil;
        $this->notorBil = $notorBil;
        $this->moyBil = $moyBil;
        $this->remarqueBil = $remarqueBil;
        $this->sujMenBil = $sujMenBil;
        $this->datBil = $datBil;
        $this->datLimBil = $datLimBil;
    }

    public function getIdBil(): int
    {
        return $this->idBil;
    }

    public function getNotorBil(): string
    {
        return $this->notorBil;
    }

    public function getMoyBil(): string
    {
        return $this->moyBil;
    }

    public function getRemarqueBil(): string
    {
        return $this->remarqueBil;
    }

    public function getSujMenBil(): string
    {
        return $this->sujMenBil;
    }

    public function getDatBil(): DateTime
    {
        return $this->datBil;
    }

    public function getDatLimBil(): DateTime
    {
        return $this->datLimBil;
    }
}
