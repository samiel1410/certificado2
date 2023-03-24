<?php

session_start();
if(isset($_SESSION['id_alumno'])){
    header('location:../inicio/index.php');
}


require_once  ("../../../php/clases/login/login.php");
$correo = isset($_POST['usuario']) ? $_POST['usuario'] : $_GET['usuario'];
$clave =isset($_POST['pass']) ? $_POST['pass'] : $_GET['pass'];

$ver= new metodoLogin();
$ver->ingresarLogin($correo,$clave);





?>