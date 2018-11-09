<?php
include_once RAIZ_APLICACION . '/../php/Controlador/ArticuloControler.php';
include_once RAIZ_APLICACION . '/../php/Controlador/ComentarioControler.php';
include_once RAIZ_APLICACION . '/../php/Controlador/comentariosDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/articuloDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/usuarioDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/UsuarioControler.php';

class Vista
{
    private $salida;
    public function __construct()
    {
        $this->salida = "";
    }
    public function mostrarContenido($listadoArticulos)
    {
        $comentario = "";
        $articuloDto=new articuloDTO();
        /*Si recibimos la lista de articulos en un de seleccionar por fecha 
         * array asociativo la convertimos en un array de objetos DTO y luego la
         * mostramos
        */
        if($listadoArticulos!="")
        {
          $listaArticulos=$listadoArticulos;
        }
        else {
             $articuloControlador = new ArticuloControler();
             $listaArticulos = $articuloControlador->buscarTodosArticulos();
        }
        
        $articuloDto = new articuloDTO();
        foreach ($listaArticulos as $articuloDto) {
            if($articuloDto->getPublicado()==true)
            {
                $this->salida = $this->salida . "<article><h3>" . $articuloDto->getTitulo() . "</h3>";
                $this->salida = $this->salida . "<p>" . $articuloDto->getFecha() . "</p>";
                $this->salida = $this->salida . "<p>" . $articuloDto->getTexto() . "</p>";
                $comentario = $this->mostrarComentarios($articuloDto->getIdArticulo());
                if ($comentario != "<h4>Comentarios</h4>") {
                    $this->salida = $this->salida . $comentario;
                }
                $this->salida = $this->salida . "</article>";
            }
            $articuloDto = new articuloDTO();
        }

        return $this->salida;
    }

    public function mostrarComentarios($idArticulo)
    {
        $salida1 = "<h4>Comentarios</h4>";
        $comentarioCont = new ComentarioControler();
        $listaComentarios = $comentarioCont->buscarComentarioPorID(0, $idArticulo);
        foreach ($listaComentarios as $comentarioDto) {
            $salida1 = $salida1 . "<p>" . $comentarioDto->getComentario() . "</p>";
            $salida1 = $salida1 . "<p>Id Autor: " . $comentarioDto->getIdAutor() . "</p>";
            $salida1 = $salida1 . "<p>" . $comentarioDto->getFecha() . "</p>";
            $salida1 = $salida1 . "<br>";
            $comentarioDto = new comentariosDTO();
        }
        return $salida1;
    }

}