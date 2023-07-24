<?php
include("../../conexion.php");
$stm=$conexion->prepare("SELECT * FROM tab_libros");
$stm->execute();
$libros=$stm->fetchAll(PDO::FETCH_ASSOC); 


if(isset($_GET['id_libro'])){

    $txtid=(isset($_GET['id_libro'])?$_GET['id_libro']:"");
    $stm=$conexion->prepare("DELETE FROM tab_libros WHERE id_libro=$txtid");
    $stm->bindParam(":id_libro",$txtid);
    $stm->execute();
    header("location:index.php"); 
}




?>

<?php include("../../template/header.php") ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Crear
</button>
<div class="table-responsive">
    <table class="table">
        <thead class= "table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Autor</th>
                <th scope="col">Editorial</th>
                <th scope="col">Fecha</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($libros as $libro) {  ?>
            <tr class="">
                <td scope="row"> <?php echo $libro['id_libro']; ?></td>
                <td><?php echo $libro['nombre_libro']; ?></td>
                <td><?php echo $libro['descripcion_libro']; ?></td>
                <td><?php echo $libro['autor_libro']; ?></td>
                <td><?php echo $libro['edi_libro']; ?></td>
                <td><?php echo $libro['fecha_libro']; ?></td>
                <td><?php echo $libro['foto_libro']; ?></td>
                <td> 
                <a href="edit.php?id_libro=<?php echo $libro['id_libro']; ?>" class="btn btn-succes">Editar</a> 
                  <a href="index.php?id_libro=<?php echo $libro['id_libro']; ?>" class="btn btn-warning">Eliminar</a> 
                </td>
                
                
            </tr>
            <?php  } ?>
           
        </tbody>
    </table>
</div>


<?php include("create.php") ?>
<?php include("../../template/footer.php") ?>