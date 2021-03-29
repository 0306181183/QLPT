<?php


namespace App\DTOs;


class DTO_Giadichvu
{

    private $id;
    private $idloai;
    private $giathaydoi;
    private $ngaythaydoi;

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
    public function getGiathaydoi()
    {
        return $this->giathaydoi;
    }

    /**
     * @param mixed $giathaydoi
     */
    public function setGiathaydoi($giathaydoi): void
    {
        $this->giathaydoi = $giathaydoi;
    }

    /**
     * @return mixed
     */
    public function getNgaythaydoi()
    {
        return $this->ngaythaydoi;
    }

    /**
     * @param mixed $ngaythaydoi
     */
    public function setNgaythaydoi($ngaythaydoi): void
    {
        $this->ngaythaydoi = $ngaythaydoi;
    }
}
