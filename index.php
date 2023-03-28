<?php 

require_once  ("db.php");


if(!isset($_SESSION)){

  session_start();
}
if(isset($_SESSION['id_alumno'])){
  $id_alumno =$_SESSION['id_alumno'];

?>


<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("MainHead.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="certificado.js"></script>

    <style>
        body {
            padding-top: 70px;
            background-color: #e9ecef;
        }
    </style>
    <title>Grupo la Legion</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
  <a class="navbar-brand" href="#">Alumno</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">


    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
    <li class="nav-item">
      <a class="nav-item nav-link mr-md-2" href="#" id="bd-versions"   onClick="salir()" aria-haspopup="true" aria-expanded="false">
        Salir
      </a>
      
    </li>

    
  </ul>
    
  </div>
</nav>
    <main class="container-fluid">

    
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Mis Cursos</h4>
     
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        

          <div class="lista">
          <div class="table-wrapper ">
            <table id="cursos_data" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Curso</th>
                  <th class="wd-15p">Fecha Inicio</th>
                  <th class="wd-20p">Fecha Fin</th>
                  <th class="wd-20p">Calificación</th>
                  <th class="wd-15p">Instructor</th>
                  <th class="wd-10p"></th>
                </tr>
<?php
            $con=conexion();
          $query = "select id_inscripcion ,nombre_curso , apellido_instructor, nombre_instructor , certificado_inscripcion,calificacion_inscripcion , fecha_inicio_curso , fecha_fin_curso from cursos , instructores , inscripciones where inscripciones.id_fkalumno_inscripcion = $id_alumno AND inscripciones.id_fkcurso_inscripcion = cursos.id_curso AND inscripciones.id_fkinstructor_inscripcion = instructores.id_instructor";
          $sql=mysqli_query($con,$query) or  die(mysqli_error($con));

              while ($vals = mysqli_fetch_array($sql)) {
              
                  $field1name = $vals['nombre_curso'];
                  $field2name = $vals['fecha_inicio_curso'];
                  $field3name = $vals['fecha_fin_curso'];
                  $field4name = $vals['calificacion_inscripcion'];
                  $field5name = $vals['nombre_instructor']." ".$vals['apellido_instructor'];
                  $field6name ='<button type="button" id="calificacion" onClick="certificado('.$vals["id_inscripcion"].');"   class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';

                

                  echo '<tr> 
                            <td>'.$field1name.'</td> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field4name.'</td> 
                            <td>'.$field5name.'</td> 
                            <td>  '.$field6name.' </td> 
                        </tr>';



              }
            

?>
            
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          </div>
        
        </div>
      </div>

    </div>


   
</main>





<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>


<?php  
}

else{
    session_destroy();
    header('location:http://localhost/certificado/login/index.php');
}
?>