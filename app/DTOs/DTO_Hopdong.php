<?php


namespace App\DTOs;


class DTO_Hopdong
{

    private $id;
    private $ngaylap;
    private $thoihan;
    private $tiencoc;
    private $trangthai;
    private $idphong;

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

    /**
     * @return mixed
     */
    public function getThoihan()
    {
        return $this->thoihan;
    }

    /**
     * @param mixed $thoihan
     */
    public function setThoihan($thoihan): void
    {
        $this->thoihan = $thoihan;
    }

    /**
     * @return mixed
     */
    public function getTiencoc()
    {
        return $this->tiencoc;
    }

    /**
     * @param mixed $tiencoc
     */
    public function setTiencoc($tiencoc): void
    {
        $this->tiencoc = $tiencoc;
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
    public function getIdphong()
    {
        return $this->idphong;
    }

    /**
     * @param mixed $idphong
     */
    public function setIdphong($idphong): void
    {
        $this->idphong = $idphong;
    }

}
