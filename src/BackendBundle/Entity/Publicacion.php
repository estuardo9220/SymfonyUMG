<?php

namespace BackendBundle\Entity;

/**
 * Publicacion
 */
class Publicacion
{
    /**
     * @var integer
     */
    private $idPublicacion;

    /**
     * @var string
     */
    private $texto;

    /**
     * @var string
     */
    private $documento;

    /**
     * @var string
     */
    private $imagen;

    /**
     * @var string
     */
    private $estado = 'NULL';

    /**
     * @var \DateTime
     */
    private $fechaCreacion = 'NULL';

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $idUsuario;


    /**
     * Get idPublicacion
     *
     * @return integer
     */
    public function getIdPublicacion()
    {
        return $this->idPublicacion;
    }

    /**
     * Set texto
     *
     * @param string $texto
     *
     * @return Publicacion
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Publicacion
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Publicacion
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Publicacion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Publicacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set idUsuario
     *
     * @param \BackendBundle\Entity\Usuario $idUsuario
     *
     * @return Publicacion
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

