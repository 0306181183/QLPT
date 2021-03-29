<?php


namespace App\DTOs;


class DTO_Phieuthu
{


    private $id;
    private $giaphong;
    private $tiendien;
    private $tiennuoc;
    private $tienwifi;
    private $tienxe;
    private $tienrac;
    private $tienquanly;
    private $trangthai;
    private $idtrangthaithue;

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
    public function getTiendien()
    {
        return $this->tiendien;
    }

    /**
     * @param mixed $tiendien
     */
    public function setTiendien($tiendien): void
    {
        $this->tiendien = $tiendien;
    }

    /**
     * @return mixed
     */
    public function getTiennuoc()
    {
        return $this->tiennuoc;
    }

    /**
     * @param mixed $tiennuoc
     */
    public function setTiennuoc($tiennuoc): void
    {
        $this->tiennuoc = $tiennuoc;
    }

    /**
     * @return mixed
     */
    public function getTienwifi()
    {
        return $this->tienwifi;
    }

    /**
     * @param mixed $tienwifi
     */
    public function setTienwifi($tienwifi): void
    {
        $this->tienwifi = $tienwifi;
    }

    /**
     * @return mixed
     */
    public function getTienxe()
    {
        return $this->tienxe;
    }

    /**
     * @param mixed $tienxe
     */
    public function setTienxe($tienxe): void
    {
        $this->tienxe = $tienxe;
    }

    /**
     * @return mixed
     */
    public function getTienrac()
    {
        return $this->tienrac;
    }

    /**
     * @param mixed $tienrac
     */
    public function setTienrac($tienrac): void
    {
        $this->tienrac = $tienrac;
    }

    /**
     * @return mixed
     */
    public function getTienquanly()
    {
        return $this->tienquanly;
    }

    /**
     * @param mixed $tienquanly
     */
    public function setTienquanly($tienquanly): void
    {
        $this->tienquanly = $tienquanly;
    }

    /**
     * @return mixed
     */
    public function getTrangthai()
    {
        return $this->trangthai;
    }

    /**
     * @param mixed $trangthai
     */
    public function setTrangthai($trangthai): void
    {
        $this->trangthai = $trangthai;
    }

    /**
     * @return mixed
     */
    public function getIdtrangthaithue()
    {
        return $this->idtrangthaithue;
    }

    /**
     * @param mixed $idtrangthaithue
     */
    public function setIdtrangthaithue($idtrangthaithue): void
    {
        $this->idtrangthaithue = $idtrangthaithue;
    }

}
