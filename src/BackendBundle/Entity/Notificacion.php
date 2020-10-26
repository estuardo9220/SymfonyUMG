<?php

namespace BackendBundle\Entity;

/**
 * Notificacion
 */
class Notificacion
{
    /**
     * @var integer
     */
    private $idNotificacion;

    /**
     * @var string
     */
    private $tipo = 'NULL';

    /**
     * @var integer
     */
    private $idTipo = 'NULL';

    /**
     * @var string
     */
    private $estadoLeido = 'NULL';

    /**
     * @var \DateTime
     */
    private $fecha = 'NULL';

    /**
     * @var string
     */
    private $comentarios = 'NULL';

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $idUsuario;


    /**
     * Get idNotificacion
     *
     * @return integer
     */
    public function getIdNotificacion()
    {
        return $this->idNotificacion;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Notificacion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set idTipo
     *
     * @param integer $idTipo
     *
     * @return Notificacion
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return integer
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set estadoLeido
     *
     * @param string $estadoLeido
     *
     * @return Notificacion
     */
    public function setEstadoLeido($estadoLeido)
    {
        $this->estadoLeido = $estadoLeido;

        return $this;
    }

    /**
     * Get estadoLeido
     *
     * @return string
     */
    public function getEstadoLeido()
    {
        return $this->estadoLeido;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Notificacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     *
     * @return Notificacion
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set idUsuario
     *
     * @param \BackendBundle\Entity\Usuario $idUsuario
     *
     * @return Notificacion
     */
    public function setIdUsuario(\BackendBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}

