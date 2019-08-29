<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 13/06/2016
 * Time: 16:43
 */

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class PerfilFisioterapeuta{
    private $id;
    private $tipoCirurgia;
    private $dataCirurgia;
    private $hospitalRealizado;
    private $hemitoraxCirurgiado;
    private $transOperatorio;
    private $posOperatorioImediato;
    private $posOperatorioTardio;
    private $outrasCirurgias;
    private $realizouFisioterapia;
    private $casosCancer;
    private $parentescoCasosCancer;
    private $outrosCasos;
    private $local;
    private $parentescoOutrosCasos;

    /**
     * PerfilFisioterapeuta constructor.
     * @param $tipoCirurgia
     * @param $dataCirurgia
     * @param $hospitalRealizado
     * @param $hemitoraxCirurgiado
     * @param $transOperatorio
     * @param $posOperatorioImediato
     * @param $posOperatorioTardio
     * @param $outrasCirurgias
     * @param $realizouFisioterapia
     * @param $casosCancer
     * @param $parentescoCasosCancer
     * @param $outrosCasos
     * @param $local
     * @param $parentescoOutrosCasos
     */
    public function __construct($id, $tipoCirurgia, $dataCirurgia, $hospitalRealizado, $hemitoraxCirurgiado, $transOperatorio, $posOperatorioImediato, $posOperatorioTardio, $outrasCirurgias, $realizouFisioterapia, $casosCancer, $parentescoCasosCancer, $outrosCasos, $local, $parentescoOutrosCasos)
    {
        $this->id = $id;
        $this->tipoCirurgia = $tipoCirurgia;
        $this->dataCirurgia = $dataCirurgia;
        $this->hospitalRealizado = $hospitalRealizado;
        $this->hemitoraxCirurgiado = $hemitoraxCirurgiado;
        $this->transOperatorio = $transOperatorio;
        $this->posOperatorioImediato = $posOperatorioImediato;
        $this->posOperatorioTardio = $posOperatorioTardio;
        $this->outrasCirurgias = $outrasCirurgias;
        $this->realizouFisioterapia = $realizouFisioterapia;
        $this->casosCancer = $casosCancer;
        $this->parentescoCasosCancer = $parentescoCasosCancer;
        $this->outrosCasos = $outrosCasos;
        $this->local = $local;
        $this->parentescoOutrosCasos = $parentescoOutrosCasos;
    }

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTipoCirurgia()
    {
        return $this->tipoCirurgia;
    }

    /**
     * @param mixed $tipoCirurgia
     */
    public function setTipoCirurgia($tipoCirurgia)
    {
        $this->tipoCirurgia = $tipoCirurgia;
    }

    /**
     * @return mixed
     */
    public function getDataCirurgia()
    {
        return $this->dataCirurgia;
    }

    /**
     * @param mixed $dataCirurgia
     */
    public function setDataCirurgia($dataCirurgia)
    {
        $this->dataCirurgia = $dataCirurgia;
    }

    /**
     * @return mixed
     */
    public function getHospitalRealizado()
    {
        return $this->hospitalRealizado;
    }

    /**
     * @param mixed $hospitalRealizado
     */
    public function setHospitalRealizado($hospitalRealizado)
    {
        $this->hospitalRealizado = $hospitalRealizado;
    }

    /**
     * @return mixed
     */
    public function getHemitoraxCirurgiado()
    {
        return $this->hemitoraxCirurgiado;
    }

    /**
     * @param mixed $hemitoraxCirurgiado
     */
    public function setHemitoraxCirurgiado($hemitoraxCirurgiado)
    {
        $this->hemitoraxCirurgiado = $hemitoraxCirurgiado;
    }

    /**
     * @return mixed
     */
    public function getTransOperatorio()
    {
        return $this->transOperatorio;
    }

    /**
     * @param mixed $transOperatorio
     */
    public function setTransOperatorio($transOperatorio)
    {
        $this->transOperatorio = $transOperatorio;
    }

    /**
     * @return mixed
     */
    public function getPosOperatorioImediato()
    {
        return $this->posOperatorioImediato;
    }

    /**
     * @param mixed $posOperatorioImediato
     */
    public function setPosOperatorioImediato($posOperatorioImediato)
    {
        $this->posOperatorioImediato = $posOperatorioImediato;
    }

    /**
     * @return mixed
     */
    public function getPosOperatorioTardio()
    {
        return $this->posOperatorioTardio;
    }

    /**
     * @param mixed $posOperatorioTardio
     */
    public function setPosOperatorioTardio($posOperatorioTardio)
    {
        $this->posOperatorioTardio = $posOperatorioTardio;
    }

    /**
     * @return mixed
     */
    public function getOutrasCirurgias()
    {
        return $this->outrasCirurgias;
    }

    /**
     * @param mixed $outrasCirurgias
     */
    public function setOutrasCirurgias($outrasCirurgias)
    {
        $this->outrasCirurgias = $outrasCirurgias;
    }

    /**
     * @return mixed
     */
    public function getRealizouFisioterapia()
    {
        return $this->realizouFisioterapia;
    }

    /**
     * @param mixed $realizouFisioterapia
     */
    public function setRealizouFisioterapia($realizouFisioterapia)
    {
        $this->realizouFisioterapia = $realizouFisioterapia;
    }

    /**
     * @return mixed
     */
    public function getCasosCancer()
    {
        return $this->casosCancer;
    }

    /**
     * @param mixed $casosCancer
     */
    public function setCasosCancer($casosCancer)
    {
        $this->casosCancer = $casosCancer;
    }

    /**
     * @return mixed
     */
    public function getParentescoCasosCancer()
    {
        return $this->parentescoCasosCancer;
    }

    /**
     * @param mixed $parentescoCasosCancer
     */
    public function setParentescoCasosCancer($parentescoCasosCancer)
    {
        $this->parentescoCasosCancer = $parentescoCasosCancer;
    }

    /**
     * @return mixed
     */
    public function getOutrosCasos()
    {
        return $this->outrosCasos;
    }

    /**
     * @param mixed $outrosCasos
     */
    public function setOutrosCasos($outrosCasos)
    {
        $this->outrosCasos = $outrosCasos;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return mixed
     */
    public function getParentescoOutrosCasos()
    {
        return $this->parentescoOutrosCasos;
    }

    /**
     * @param mixed $parentescoOutrosCasos
     */
    public function setParentescoOutrosCasos($parentescoOutrosCasos)
    {
        $this->parentescoOutrosCasos = $parentescoOutrosCasos;
    }
}