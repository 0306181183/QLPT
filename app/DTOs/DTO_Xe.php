<?php


namespace App\DTOs;


class DTO_Xe
{
    private $id;
    private $loaixe;
    private $bienso;
    private $idkhach;

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
    public function getLoaixe()
    {
        return $this->loaixe;
    }

    /**
     * @param mixed $loaixe
     */
    public function setLoaixe($loaixe): void
    {
        $this->loaixe = $loaixe;
    }

    /**
     * @return mixed
     */
    public function getBienso()
    {
        return $this->bienso;
    }

    /**
     * @param mixed $bienso
     */
    public function setBienso($bienso): void
    {
        $this->bienso = $bienso;
    }

    /**
     * @return mixed
     */
    public function getIdkhach()
    {
        return $this->idkhach;
    }

    /**
     * @param mixed $idkhach
     */
    public function setIdkhach($idkhach): void
    {
        $this->idkhach = $idkhach;
    }


}
