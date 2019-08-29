<?php



class ConsultaFisioterapeuta{
    private $id;
    private $data_consulta;
    private $motivo_consulta;
    private $queixa_principal;
    private $historia_doenca;
    private $radioterapia_inicio;
    private $radioterapia_final;
    private $radioterapia_sessoes;
    private $quimioterapia_inicio;
    private $quimioterapia_final;
    private $quimioterapia_sessoes;
    private $hormonioterapia_inicio;
    private $hormonioterapia_final;
    private $hormonioterapia_sessoes;
    private $observacao;
    private $cabeca;
    private $ombros;
    private $dorso;
    private $lombar;
    private $perve;
    private $joelhos;
    private $pes;
    private $conclusao;
    private $tipo_marcha;
    private $dor;
    private $local_dor;
    private $aderencias;
    private $local_aderencias;
    private $outros;
    private $sensibilidade;
    private $localizacao;
    private $profunda;
    private $linfedema_quando;
    private $linfedema_caracteristicas;
    private $linfedema_localizacao;
    private $habitos_sentar;
    private $habitos_deitar_levantar;
    private $habitos_dormir;
    private $parecer_fisioterapico;
    private $conduta;
    private $data_orientacao;
    private $orientacao;
    private $evolucao;

    /**
     * ConsultaFisioterapeuta constructor.
     * @param $id
     * @param $data_consulta
     * @param $motivo_consulta
     * @param $queixa_principal
     * @param $historia_doenca
     * @param $radioterapia_inicio
     * @param $radioterapia_final
     * @param $radioterapia_sessoes
     * @param $quimioterapia_inicio
     * @param $quimioterapia_final
     * @param $quimioterapia_sessoes
     * @param $hormonioterapia_inicio
     * @param $hormonioterapia_final
     * @param $hormonioterapia_sessoes
     * @param $observacao
     * @param $cabeca
     * @param $ombros
     * @param $dorso
     * @param $lombar
     * @param $perve
     * @param $joelhos
     * @param $pes
     * @param $conclusao
     * @param $tipo_marcha
     * @param $dor
     * @param $local_dor
     * @param $aderencias
     * @param $local_aderencias
     * @param $outros
     * @param $sensibilidade
     * @param $localizacao
     * @param $profunda
     * @param $linfedema_quando
     * @param $linfedema_caracteristicas
     * @param $linfedema_localizacao
     * @param $habitos_sentar
     * @param $habitos_deitar_levantar
     * @param $habitos_dormir
     * @param $parecer_fisioterapico
     * @param $conduta
     * @param $data_orientacao
     * @param $orientacao
     * @param $evolucao
     */
    public function __construct($id, $data_consulta, $motivo_consulta, $queixa_principal, $historia_doenca, $radioterapia_inicio, $radioterapia_final, $radioterapia_sessoes, $quimioterapia_inicio, $quimioterapia_final, $quimioterapia_sessoes, $hormonioterapia_inicio, $hormonioterapia_final, $hormonioterapia_sessoes, $observacao, $cabeca, $ombros, $dorso, $lombar, $perve, $joelhos, $pes, $conclusao, $tipo_marcha, $dor, $local_dor, $aderencias, $local_aderencias, $outros, $sensibilidade, $localizacao, $profunda, $linfedema_quando, $linfedema_caracteristicas, $linfedema_localizacao, $habitos_sentar, $habitos_deitar_levantar, $habitos_dormir, $parecer_fisioterapico, $conduta, $data_orientacao, $orientacao, $evolucao)
    {
        $this->id = $id;
        $this->data_consulta = $data_consulta;
        $this->motivo_consulta = $motivo_consulta;
        $this->queixa_principal = $queixa_principal;
        $this->historia_doenca = $historia_doenca;
        $this->radioterapia_inicio = $radioterapia_inicio;
        $this->radioterapia_final = $radioterapia_final;
        $this->radioterapia_sessoes = $radioterapia_sessoes;
        $this->quimioterapia_inicio = $quimioterapia_inicio;
        $this->quimioterapia_final = $quimioterapia_final;
        $this->quimioterapia_sessoes = $quimioterapia_sessoes;
        $this->hormonioterapia_inicio = $hormonioterapia_inicio;
        $this->hormonioterapia_final = $hormonioterapia_final;
        $this->hormonioterapia_sessoes = $hormonioterapia_sessoes;
        $this->observacao = $observacao;
        $this->cabeca = $cabeca;
        $this->ombros = $ombros;
        $this->dorso = $dorso;
        $this->lombar = $lombar;
        $this->perve = $perve;
        $this->joelhos = $joelhos;
        $this->pes = $pes;
        $this->conclusao = $conclusao;
        $this->tipo_marcha = $tipo_marcha;
        $this->dor = $dor;
        $this->local_dor = $local_dor;
        $this->aderencias = $aderencias;
        $this->local_aderencias = $local_aderencias;
        $this->outros = $outros;
        $this->sensibilidade = $sensibilidade;
        $this->localizacao = $localizacao;
        $this->profunda = $profunda;
        $this->linfedema_quando = $linfedema_quando;
        $this->linfedema_caracteristicas = $linfedema_caracteristicas;
        $this->linfedema_localizacao = $linfedema_localizacao;
        $this->habitos_sentar = $habitos_sentar;
        $this->habitos_deitar_levantar = $habitos_deitar_levantar;
        $this->habitos_dormir = $habitos_dormir;
        $this->parecer_fisioterapico = $parecer_fisioterapico;
        $this->conduta = $conduta;
        $this->data_orientacao = $data_orientacao;
        $this->orientacao = $orientacao;
        $this->evolucao = $evolucao;
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
    public function getDataConsulta()
    {
        return $this->data_consulta;
    }

    /**
     * @param mixed $data_consulta
     */
    public function setDataConsulta($data_consulta)
    {
        $this->data_consulta = $data_consulta;
    }

    /**
     * @return mixed
     */
    public function getMotivoConsulta()
    {
        return $this->motivo_consulta;
    }

    /**
     * @param mixed $motivo_consulta
     */
    public function setMotivoConsulta($motivo_consulta)
    {
        $this->motivo_consulta = $motivo_consulta;
    }

    /**
     * @return mixed
     */
    public function getQueixaPrincipal()
    {
        return $this->queixa_principal;
    }

    /**
     * @param mixed $queixa_principal
     */
    public function setQueixaPrincipal($queixa_principal)
    {
        $this->queixa_principal = $queixa_principal;
    }

    /**
     * @return mixed
     */
    public function getHistoriaDoenca()
    {
        return $this->historia_doenca;
    }

    /**
     * @param mixed $historia_doenca
     */
    public function setHistoriaDoenca($historia_doenca)
    {
        $this->historia_doenca = $historia_doenca;
    }

    /**
     * @return mixed
     */
    public function getRadioterapiaInicio()
    {
        return $this->radioterapia_inicio;
    }

    /**
     * @param mixed $radioterapia_inicio
     */
    public function setRadioterapiaInicio($radioterapia_inicio)
    {
        $this->radioterapia_inicio = $radioterapia_inicio;
    }

    /**
     * @return mixed
     */
    public function getRadioterapiaFinal()
    {
        return $this->radioterapia_final;
    }

    /**
     * @param mixed $radioterapia_final
     */
    public function setRadioterapiaFinal($radioterapia_final)
    {
        $this->radioterapia_final = $radioterapia_final;
    }

    /**
     * @return mixed
     */
    public function getRadioterapiaSessoes()
    {
        return $this->radioterapia_sessoes;
    }

    /**
     * @param mixed $radioterapia_sessoes
     */
    public function setRadioterapiaSessoes($radioterapia_sessoes)
    {
        $this->radioterapia_sessoes = $radioterapia_sessoes;
    }

    /**
     * @return mixed
     */
    public function getQuimioterapiaInicio()
    {
        return $this->quimioterapia_inicio;
    }

    /**
     * @param mixed $quimioterapia_inicio
     */
    public function setQuimioterapiaInicio($quimioterapia_inicio)
    {
        $this->quimioterapia_inicio = $quimioterapia_inicio;
    }

    /**
     * @return mixed
     */
    public function getQuimioterapiaFinal()
    {
        return $this->quimioterapia_final;
    }

    /**
     * @param mixed $quimioterapia_final
     */
    public function setQuimioterapiaFinal($quimioterapia_final)
    {
        $this->quimioterapia_final = $quimioterapia_final;
    }

    /**
     * @return mixed
     */
    public function getQuimioterapiaSessoes()
    {
        return $this->quimioterapia_sessoes;
    }

    /**
     * @param mixed $quimioterapia_sessoes
     */
    public function setQuimioterapiaSessoes($quimioterapia_sessoes)
    {
        $this->quimioterapia_sessoes = $quimioterapia_sessoes;
    }

    /**
     * @return mixed
     */
    public function getHormonioterapiaInicio()
    {
        return $this->hormonioterapia_inicio;
    }

    /**
     * @param mixed $hormonioterapia_inicio
     */
    public function setHormonioterapiaInicio($hormonioterapia_inicio)
    {
        $this->hormonioterapia_inicio = $hormonioterapia_inicio;
    }

    /**
     * @return mixed
     */
    public function getHormonioterapiaFinal()
    {
        return $this->hormonioterapia_final;
    }

    /**
     * @param mixed $hormonioterapia_final
     */
    public function setHormonioterapiaFinal($hormonioterapia_final)
    {
        $this->hormonioterapia_final = $hormonioterapia_final;
    }

    /**
     * @return mixed
     */
    public function getHormonioterapiaSessoes()
    {
        return $this->hormonioterapia_sessoes;
    }

    /**
     * @param mixed $hormonioterapia_sessoes
     */
    public function setHormonioterapiaSessoes($hormonioterapia_sessoes)
    {
        $this->hormonioterapia_sessoes = $hormonioterapia_sessoes;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param mixed $observacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }

    /**
     * @return mixed
     */
    public function getCabeca()
    {
        return $this->cabeca;
    }

    /**
     * @param mixed $cabeca
     */
    public function setCabeca($cabeca)
    {
        $this->cabeca = $cabeca;
    }

    /**
     * @return mixed
     */
    public function getOmbros()
    {
        return $this->ombros;
    }

    /**
     * @param mixed $ombros
     */
    public function setOmbros($ombros)
    {
        $this->ombros = $ombros;
    }

    /**
     * @return mixed
     */
    public function getDorso()
    {
        return $this->dorso;
    }

    /**
     * @param mixed $dorso
     */
    public function setDorso($dorso)
    {
        $this->dorso = $dorso;
    }

    /**
     * @return mixed
     */
    public function getLombar()
    {
        return $this->lombar;
    }

    /**
     * @param mixed $lombar
     */
    public function setLombar($lombar)
    {
        $this->lombar = $lombar;
    }

    /**
     * @return mixed
     */
    public function getPerve()
    {
        return $this->perve;
    }

    /**
     * @param mixed $perve
     */
    public function setPerve($perve)
    {
        $this->perve = $perve;
    }

    /**
     * @return mixed
     */
    public function getJoelhos()
    {
        return $this->joelhos;
    }

    /**
     * @param mixed $joelhos
     */
    public function setJoelhos($joelhos)
    {
        $this->joelhos = $joelhos;
    }

    /**
     * @return mixed
     */
    public function getPes()
    {
        return $this->pes;
    }

    /**
     * @param mixed $pes
     */
    public function setPes($pes)
    {
        $this->pes = $pes;
    }

    /**
     * @return mixed
     */
    public function getConclusao()
    {
        return $this->conclusao;
    }

    /**
     * @param mixed $conclusao
     */
    public function setConclusao($conclusao)
    {
        $this->conclusao = $conclusao;
    }

    /**
     * @return mixed
     */
    public function getTipoMarcha()
    {
        return $this->tipo_marcha;
    }

    /**
     * @param mixed $tipo_marcha
     */
    public function setTipoMarcha($tipo_marcha)
    {
        $this->tipo_marcha = $tipo_marcha;
    }

    /**
     * @return mixed
     */
    public function getDor()
    {
        return $this->dor;
    }

    /**
     * @param mixed $dor
     */
    public function setDor($dor)
    {
        $this->dor = $dor;
    }

    /**
     * @return mixed
     */
    public function getLocalDor()
    {
        return $this->local_dor;
    }

    /**
     * @param mixed $local_dor
     */
    public function setLocalDor($local_dor)
    {
        $this->local_dor = $local_dor;
    }

    /**
     * @return mixed
     */
    public function getAderencias()
    {
        return $this->aderencias;
    }

    /**
     * @param mixed $aderencias
     */
    public function setAderencias($aderencias)
    {
        $this->aderencias = $aderencias;
    }

    /**
     * @return mixed
     */
    public function getLocalAderencias()
    {
        return $this->local_aderencias;
    }

    /**
     * @param mixed $local_aderencias
     */
    public function setLocalAderencias($local_aderencias)
    {
        $this->local_aderencias = $local_aderencias;
    }

    /**
     * @return mixed
     */
    public function getOutros()
    {
        return $this->outros;
    }

    /**
     * @param mixed $outros
     */
    public function setOutros($outros)
    {
        $this->outros = $outros;
    }

    /**
     * @return mixed
     */
    public function getSensibilidade()
    {
        return $this->sensibilidade;
    }

    /**
     * @param mixed $sensibilidade
     */
    public function setSensibilidade($sensibilidade)
    {
        $this->sensibilidade = $sensibilidade;
    }

    /**
     * @return mixed
     */
    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    /**
     * @param mixed $localizacao
     */
    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }

    /**
     * @return mixed
     */
    public function getProfunda()
    {
        return $this->profunda;
    }

    /**
     * @param mixed $profunda
     */
    public function setProfunda($profunda)
    {
        $this->profunda = $profunda;
    }

    /**
     * @return mixed
     */
    public function getLinfedemaQuando()
    {
        return $this->linfedema_quando;
    }

    /**
     * @param mixed $linfedema_quando
     */
    public function setLinfedemaQuando($linfedema_quando)
    {
        $this->linfedema_quando = $linfedema_quando;
    }

    /**
     * @return mixed
     */
    public function getLinfedemaCaracteristicas()
    {
        return $this->linfedema_caracteristicas;
    }

    /**
     * @param mixed $linfedema_caracteristicas
     */
    public function setLinfedemaCaracteristicas($linfedema_caracteristicas)
    {
        $this->linfedema_caracteristicas = $linfedema_caracteristicas;
    }

    /**
     * @return mixed
     */
    public function getLinfedemaLocalizacao()
    {
        return $this->linfedema_localizacao;
    }

    /**
     * @param mixed $linfedema_localizacao
     */
    public function setLinfedemaLocalizacao($linfedema_localizacao)
    {
        $this->linfedema_localizacao = $linfedema_localizacao;
    }

    /**
     * @return mixed
     */
    public function getHabitosSentar()
    {
        return $this->habitos_sentar;
    }

    /**
     * @param mixed $habitos_sentar
     */
    public function setHabitosSentar($habitos_sentar)
    {
        $this->habitos_sentar = $habitos_sentar;
    }

    /**
     * @return mixed
     */
    public function getHabitosDeitarLevantar()
    {
        return $this->habitos_deitar_levantar;
    }

    /**
     * @param mixed $habitos_deitar_levantar
     */
    public function setHabitosDeitarLevantar($habitos_deitar_levantar)
    {
        $this->habitos_deitar_levantar = $habitos_deitar_levantar;
    }

    /**
     * @return mixed
     */
    public function getHabitosDormir()
    {
        return $this->habitos_dormir;
    }

    /**
     * @param mixed $habitos_dormir
     */
    public function setHabitosDormir($habitos_dormir)
    {
        $this->habitos_dormir = $habitos_dormir;
    }

    /**
     * @return mixed
     */
    public function getParecerFisioterapico()
    {
        return $this->parecer_fisioterapico;
    }

    /**
     * @param mixed $parecer_fisioterapico
     */
    public function setParecerFisioterapico($parecer_fisioterapico)
    {
        $this->parecer_fisioterapico = $parecer_fisioterapico;
    }

    /**
     * @return mixed
     */
    public function getConduta()
    {
        return $this->conduta;
    }

    /**
     * @param mixed $conduta
     */
    public function setConduta($conduta)
    {
        $this->conduta = $conduta;
    }

    /**
     * @return mixed
     */
    public function getDataOrientacao()
    {
        return $this->data_orientacao;
    }

    /**
     * @param mixed $data_orientacao
     */
    public function setDataOrientacao($data_orientacao)
    {
        $this->data_orientacao = $data_orientacao;
    }

    /**
     * @return mixed
     */
    public function getOrientacao()
    {
        return $this->orientacao;
    }

    /**
     * @param mixed $orientacao
     */
    public function setOrientacao($orientacao)
    {
        $this->orientacao = $orientacao;
    }

    /**
     * @return mixed
     */
    public function getEvolucao()
    {
        return $this->evolucao;
    }

    /**
     * @param mixed $evolucao
     */
    public function setEvolucao($evolucao)
    {
        $this->evolucao = $evolucao;
    }

}

