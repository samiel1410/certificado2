<?php
require_once  ("../../../php/clases/alumno/alumno.php");
$id_inscripcion =$_POST['id_inscripcion'];

$ver= new metodoAlumno();
$ver->recuperar($id_inscripcion);





?>