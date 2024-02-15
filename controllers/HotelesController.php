<?php

class HotelesController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelesModel();
        $this->view = new HotelesView();
    }

    /**
     * MUESTRA LA VISTA DE MOSTRAR HOTELES.
     */
    public function listarHoteles() {
        $hoteles = $this->model->getHoteles();
        $newHoteles = array();
        foreach ($hoteles as $hotel) {
            $newHotel = new Hotel($hotel['id'], $hotel['nombre'], $hotel['direccion'], $hotel['ciudad'], $hotel['pais'], $hotel['num_habitaciones'], $hotel['descripcion'], $hotel['foto']);
            array_push($newHoteles, $newHotel);
        }

        $this->view->mostrarHoteles($newHoteles);
    }

}
