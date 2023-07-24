<?php
include("../../conexion.php");
if(isset($_GET['id_libro'])){

    $txtid=(isset($_GET['id_libro'])?$_GET['id_libro']:"");
    $stm=$conexion->prepare("SELECT FROM * tab_libros WHERE id_libro=$txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $nombre=$registro['nombre_libro'];
    $descripcion=$registro['descripcion_libro'];
    $autor=$registro['autor_libro'];
    $edi=$registro['edi_libro'];
    $fecha=$registro['fecha_libro'];
    
}

if($_POST){

    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
    $autor=(isset($_POST['autor'])?$_POST['autor']:"");
    $editorial=(isset($_POST['editorial'])?$_POST['editorial']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");
    
    $stm=$conexion->prepare("UPDATE tab_libros SET(nombre_libro=:nombre,descripcion_libro=:descripcion
    ,autor_libro=:autor,
    edi_libro=:editorial,fecha_libro=:fecha WHERE id_libro=txtid");
    
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":descrpcion",$descripcion);
    $stm->bindParam(":autor",$autor);
    $stm->bindParam(":editorial",$editorial);
    $stm->bindParam(":fecha",$fecha);
    $stm->bindParam(":txtid",$txtid);
    
    $stm->execute();
    header("location:index.php");
    
    
    }




?>
<?php include("../../template/header.php") ?>



<form action="" method="post">
     

        <input type="hidden" class= "form-control" name="txtid" value="<?php echo $txtid; ?>">        

<label for="">Nombre:</label>
        <input type="text" class= "form-control" name="nombre" value="<?php echo $nombre; ?>">
        <label for="">Descripcion:</label>
        <input type="text" class= "form-control" name="descripcion" value="<?php echo $descripcion; ?>">
        <label for="">Autor:</label>
        <input type="text" class= "form-control" name="autor" value="<?php echo $autor; ?>">
        <label for="">Editorial:</label>
        <input type="text" class= "form-control" name="editorial" value="<?php echo $edi; ?>">
        <label for="">Fecha:</label>
        <input type="date" class= "form-control" name="fecha" value="<?php echo $fecha; ?>">
        <!----
        <label for="">Foto:</label>
        <input type="text" class= "form-control" name="foto">
        --->
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">cancelar</a>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>



      <?php include("../../template/footer.php") ?>