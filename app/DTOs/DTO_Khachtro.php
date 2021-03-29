<?php


namespace App\DTOs;


class DTO_Khachtro
{
    private $id;
    private $tenkhach;
    private $cmnd;
    private $gioitinh;
    private $ngaysinh;
    private $quequan;
    private $idhopdong;
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
    public function getTenkhach()
    {
        return $this->tenkhach;
    }

    /**
     * @param mixed $tenkhach
     */
    public function setTenkhach($tenkhach): void
    {
        $this->tenkhach = $tenkhach;
    }

    /**
     * @return mixed
     */
    public function getCmnd()
    {
        return $this->cmnd;
    }

    /**
     * @param mixed $cmnd
     */
    public function setCmnd($cmnd): void
    {
        $this->cmnd = $cmnd;
    }

    /**
     * @return mixed
     */
    public function getGioitinh()
    {
        return $this->gioitinh;
    }

    /**
     * @param mixed $gioitinh
     */
    public function setGioitinh($gioitinh): void
    {
        $this->gioitinh = $gioitinh;
    }

    /**
     * @return mixed
     */
    public function getNgaysinh()
    {
        return $this->ngaysinh;
    }

    /**
     * @param mixed $ngaysinh
     */
    public function setNgaysinh($ngaysinh): void
    {
        $this->ngaysinh = $ngaysinh;
    }

    /**
     * @return mixed
     */
    public function getQuequan()
    {
        return $this->quequan;
    }

    /**
     * @param mixed $quequan
     */
    public function setQuequan($quequan): void
    {
        $this->quequan = $quequan;
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
