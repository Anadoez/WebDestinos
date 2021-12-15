<?php
//Developed for Diana Fajardo 30-01-2020
//Charge model and controllers

require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';
//Empezar sesiones en index no el controlador
include_once('../app/libs/ClassSessions.php');

$sesion= new Sessions();
if(isset($_SESSION["time"])){
 $sesion->comp_time();   
}

//enrroutement
$map=array(
    'login'=>array('controller'=>'Controller', 'action'=>'login', 'nivel'=>0),
    'signup'=>array('controller'=>'Controller', 'action'=>'signup', 'nivel'=>0),
    'error' => array('controller' =>'Controller', 'action' =>'error','nivel'=>0),
    'errorLevel' => array('controller' =>'Controller', 'action' =>'errorLevel','nivel'=>0),
    'home' => array('controller' =>'Controller', 'action' =>'home','nivel'=>1),
    'privacyP' => array('controller' =>'Controller', 'action' =>'privacyP','nivel'=>0),
    'cookie' => array('controller' =>'Controller', 'action' =>'cookie','nivel'=>0),
    'adminP' => array('controller' =>'Controller', 'action' =>'adminP','nivel'=>3),
    'profile' => array('controller' =>'Controller', 'action' =>'profile','nivel'=>1),
    'grupos' => array('controller' =>'Controller', 'action' =>'grupos','nivel'=>1),
    'destinos' => array('controller' =>'Controller', 'action' =>'destinos','nivel'=>1),
    'destinos2' => array('controller' =>'Controller', 'action' =>'destinos','nivel'=>1),
    'destinos3' => array('controller' =>'Controller', 'action' =>'destinos','nivel'=>1)
);

//prsed route
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .'</p></body></html>';
            exit;                          
    }
} else {
    $ruta = 'login';
}
$controlador = $map[$ruta];
//Execute conttroler of route
if (method_exists($controlador['controller'],$controlador['action'])) {
    //Comprueba el nivel aqui; 
      call_user_func(array(new $controlador['controller'],
        $controlador['action']));  
    
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}
?>