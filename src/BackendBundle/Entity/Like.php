<?php

namespace BackendBundle\Entity;

/**
 * Like
 */
class Like
{
    /**
     * @var integer
     */
    private $idLike;

    /**
     * @var \BackendBundle\Entity\Publicacion
     */
    private $idPublicacion;

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $idUsuario;


    /**
     * Get idLike
     *
     * @return integer
     */
    public function getIdLike()
    {
        return $this->idLike;
    }

    /**
     * Set idPublicacion
     *
     * @param \BackendBundle\Entity\Publicacion $idPublicacion
     *
     * @return Like
     */
    public function setIdPublicacion(\BackendBundle\Entity\Publicacion $idPublicacion = null)
    {
        $this->idPublicacion = $idPublicacion;

        return $this;
    }

    /**
     * Get idPublicacion
     *
     * @return \BackendBundle\Entity\Publicacion
     */
    public function getIdPublicacion()
    {
        return $this->idPublicacion;
    }

    /**
     * Set idUsuario
     *
     * @param \BackendBundle\Entity\Usuario $idUsuario
     *
     * @return Like
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

