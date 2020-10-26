<?php

namespace BackendBundle\Entity;

/**
 * Seguidor
 */
class Seguidor
{
    /**
     * @var integer
     */
    private $idSeguidor;

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $usuarioSeguido;

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $idUsuario;


    /**
     * Get idSeguidor
     *
     * @return integer
     */
    public function getIdSeguidor()
    {
        return $this->idSeguidor;
    }

    /**
     * Set usuarioSeguido
     *
     * @param \BackendBundle\Entity\Usuario $usuarioSeguido
     *
     * @return Seguidor
     */
    public function setUsuarioSeguido(\BackendBundle\Entity\Usuario $usuarioSeguido = null)
    {
        $this->usuarioSeguido = $usuarioSeguido;

        return $this;
    }

    /**
     * Get usuarioSeguido
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getUsuarioSeguido()
    {
        return $this->usuarioSeguido;
    }

    /**
     * Set idUsuario
     *
     * @param \BackendBundle\Entity\Usuario $idUsuario
     *
     * @return Seguidor
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

