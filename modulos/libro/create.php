<?php 

if($_POST){
$nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
$descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
$autor=(isset($_POST['autor'])?$_POST['autor']:"");
$editorial=(isset($_POST['editorial'])?$_POST['editorial']:"");
$fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");

$stm=$conexion->prepare("INSERT TO tab_libros(id_libro,nombre_libro,descripcion_libro,autor_libro,
edi_libro,fecha_libro)VALUES(null,:nombre,:descripcion,:autor,:editorial,:fecha,)");

$stm->bindParam(":nombre",$nombre);
$stm->bindParam(":descrpcion",$descripcion);
$stm->bindParam(":autor",$autor);
$stm->bindParam(":editorial",$editorial);
$stm->bindParam(":fecha",$fecha);

$stm->execute();
header("location:index.php");


}



?>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Nombre:</label>
        <input type="text" class= "form-control" name="nombre">
        <label for="">Descripcion:</label>
        <input type="text" class= "form-control" name="descripcion">
        <label for="">Autor:</label>
        <input type="text" class= "form-control" name="autor">
        <label for="">Editorial:</label>
        <input type="text" class= "form-control" name="editorial">
        <label for="">Fecha:</label>
        <input type="date" class= "form-control" name="fecha">
        <!----
        <label for="">Foto:</label>
        <input type="text" class= "form-control" name="foto">
        --->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>