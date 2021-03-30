<?php


namespace App\DTOs;


class DTO_Log
{
    private $id;
    private $idloai;
    private $noidung;
    private $idhopdong;
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
    public function getIdloai()
    {
        return $this->idloai;
    }

    /**
     * @param mixed $idloai
     */
    public function setIdloai($idloai): void
    {
        $this->idloai = $idloai;
    }

    /**
     * @return mixed
     */
    public function getNoidung()
    {
        return $this->noidung;
    }

    /**
     * @param mixed $noidung
     */
    public function setNoidung($noidung): void
    {
        $this->noidung = $noidung;
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
