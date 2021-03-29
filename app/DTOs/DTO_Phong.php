<?php


namespace App\DTOs;


class DTO_Phong
{
    private $id;
    private $tenphong;
    private $songuoimax;
    private $giaphong;
    private $trangthai;

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
    public function getTenphong()
    {
        return $this->tenphong;
    }

    /**
     * @param mixed $tenphong
     */
    public function setTenphong($tenphong): void
    {
        $this->tenphong = $tenphong;
    }

    /**
     * @return mixed
     */
    public function getSonguoimax()
    {
        return $this->songuoimax;
    }

    /**
     * @param mixed $songuoimax
     */
    public function setSonguoimax($songuoimax): void
    {
        $this->songuoimax = $songuoimax;
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



}
