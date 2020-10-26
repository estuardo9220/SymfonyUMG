<?php

namespace BackendBundle\Entity;

/**
 * Mensaje
 */
class Mensaje
{
    /**
     * @var integer
     */
    private $idMensaje;

    /**
     * @var string
     */
    private $mensaje = 'NULL';

    /**
     * @var string
     */
    private $archivo = 'NULL';

    /**
     * @var string
     */
    private $imagen = 'NULL';

    /**
     * @var string
     */
    private $estadoLeido = 'NULL';

    /**
     * @var \DateTime
     */
    private $fechaEnvio = 'NULL';

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $emisor;

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $receptor;


    /**
     * Get idMensaje
     *
     * @return integer
     */
    public function getIdMensaje()
    {
        return $this->idMensaje;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set archivo
     *
     * @param string $archivo
     *
     * @return Mensaje
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Get archivo
     *
     * @return string
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Mensaje
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
     * Set estadoLeido
     *
     * @param string $estadoLeido
     *
     * @return Mensaje
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
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     *
     * @return Mensaje
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set emisor
     *
     * @param \BackendBundle\Entity\Usuario $emisor
     *
     * @return Mensaje
     */
    public function setEmisor(\BackendBundle\Entity\Usuario $emisor = null)
    {
        $this->emisor = $emisor;

        return $this;
    }

    /**
     * Get emisor
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getEmisor()
    {
        return $this->emisor;
    }

    /**
     * Set receptor
     *
     * @param \BackendBundle\Entity\Usuario $receptor
     *
     * @return Mensaje
     */
    public function setReceptor(\BackendBundle\Entity\Usuario $receptor = null)
    {
        $this->receptor = $receptor;

        return $this;
    }

    /**
     * Get receptor
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getReceptor()
    {
        return $this->receptor;
    }
}

