<?php
//AÑADIR LOS ARCHIVOS NECESARIOS

include 'controllers/UsuariosController.php';
include 'controllers/HotelesController.php';
include 'controllers/HabitacionesController.php';
include 'controllers/ReservasController.php';

include 'models/UsuariosModel.php';
include 'models/HotelesModel.php';
include 'models/HabitacionesModel.php';
include 'models/ReservasModel.php';

include 'views/UsuariosView.php';
include 'views/HotelesView.php';
include 'views/HabitacionesView.php';
include 'views/ReservasView.php';

include 'models/Hotel.php';
include 'models/Habitacion.php';
include 'models/Reserva.php';

// Define la acción por defecto
    //modificar por la accion que quieres que se ejecute primero
define('ACCION_DEFECTO', 'login');

// Define el controlador por defecto
    //modificar por el controlador necesario
define('CONTROLADOR_DEFECTO', 'Usuarios');

// Comprueba la acción a realizar, que llegará en la petición.
// Si no hay acción a realizar lanzará la acción por defecto, que es listar
// Y se carga la acción, llama a la función cargarAccion
function lanzarAccion($controllerObj){
    
    //method_exists() es una función predefinida de PHP que permite comprobar si un 
    //método existe en un objeto dado.
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    } 
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
        //O añadir una página indicando el error de la acción
        //die("Se ha cargado una acción errónea");
    }
}

// Lo que hace es ejecutar una función que va a existir en el controlador
// y que se llama como la acción. Recibe un objeto controlador.
function cargarAccion($controllerObj, $action){
    $accion=$action;
    $controllerObj->$accion();
}


// Carga el controlador especificado y devuelve una instancia del mismo
function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        // Si el controlador no existe, se lanza una excepción
        //O añadir una página indicando el error del controlador
        die ("controlador no válido");
    }
}

// Carga el controlador y la acción correspondientes
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}

