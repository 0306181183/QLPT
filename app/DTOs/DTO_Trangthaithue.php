<?php


namespace App\DTOs;


class DTO_Trangthaithue
{

    private $id;
    private $chisodien;
    private $idhopdong;
    private $soxe;
    private $songuoi;
    private $giaphong;
    private $wifi;
    private $ngaylap;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getChisodien()
    {
        return $this->chisodien;
    }

    /**
     * @param mixed $chisodien
     */
    public function setChisodien($chisodien): void
    {
        $this->chisodien = $chisodien;
    }

    /**
     * @return mixed
     */
    public function getIdhopdong()
    {
        return $this->idhopdong;
    }

    /**
     * @param mixed $idhopdong
     */
    public function setIdhopdong($idhopdong): void
    {
        $this->idhopdong = $idhopdong;
    }

    /**
     * @return mixed
     */
    public function getSoxe()
    {
        return $this->soxe;
    }

    /**
     * @param mixed $soxe
     */
    public function setSoxe($soxe): void
    {
        $this->soxe = $soxe;
    }

    /**
     * @return mixed
     */
    public function getSonguoi()
    {
        return $this->songuoi;
    }

    /**
     * @param mixed $songuoi
     */
    public function setSonguoi($songuoi): void
    {
        $this->songuoi = $songuoi;
    }

    /**
     * @return mixed
     */
    public function getGiaphong()
    {
        return $this->giaphong;
    }

    /**
     * @param mixed $giaphong
     */
    public function setGiaphong($giaphong): void
    {
        $this->giaphong = $giaphong;
    }

    /**
     * @return mixed
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * @param mixed $wifi
     */
    public function setWifi($wifi): void
    {
        $this->wifi = $wifi;
    }

    /**
     * @return mixed
     */
    public function getNgaylap()
    {
        return $this->ngaylap;
    }

    /**
     * @param mixed $ngaylap
     */
    public function setNgaylap($ngaylap): void
    {
        $this->ngaylap = $ngaylap;
    }
}
