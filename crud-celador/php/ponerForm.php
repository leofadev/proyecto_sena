<?php 
include_once("../../crud/model/connection.php");
$documento = $_POST['documento'];
$nombre= "";$apellido= "";$doc = "";$cargo= "";

$sql = "SELECT *, sub_item.descripcion AS ROLES FROM personas inner JOIN sub_item ON personas.rol = sub_item.id WHERE personas.documento='$documento';";
$query= mysqli_query($con,$sql);
if($row = mysqli_fetch_array($query)){
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $cargo = $row['ROLES'];
    $doc = $row['documento'];
}
if($nombre != "" && $apellido != "" && $cargo != "" && $doc != ""){
?>

<div class="row mb-5">
    <div class="col-10 col-sm-10 col-md-6 col-xl-4 p-5 ml-auto mr-auto">
    <form class="form p-5 rounded border shadow" method="POST" action="../../../proyecto_sena/crud-celador/registro_objetos.php">
        <h3 class="text-center text-dark">Registro De Objetos</h3>
                
                <div class=" form-group">
                    <label class="form-label mb-1">Documento</label>
                    <input type="text" class="form-control label input  mb-1" placeholder="Ingrese # documento" name="document" value="<?php echo $doc?>">
                </div>
                <div class=" form-group">
                    <label class="form-label mb-1">Nombre</label>
                    <input type="text" class="form-control label input  mb-1" placeholder="Ingrese Nombre" name="nombre" value="<?php echo $nombre?>">
                </div>

                <div class=" form-group">
                    <label class="form-label mb-1">Apellido</label>
                    <input type="text" class="form-control label input  mb-1" placeholder="Ingrese apellido" name="apellido" value="<?php echo $apellido?>">
                </div>
        <div class=" form-group">
            <label class="form-label mb-1">Cargo</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Ingrese Su Cargo" name="cargo" value="<?php echo $cargo?>">
        </div>
        <div class="form-group">
            <label class="form-label mb-1">Dispositivo</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Serial Del Dispositivo" name="dispositivo">
        </div>
        <div class="form-group">
            <label class="form-label mb-1">Observaciones</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Ingrese una observaci??n" name="observacion">
        </div>
        <div class="row">
        <div class="col-auto ml-auto mr-auto">
            <button type="submit" class="btn text-white btn-success mt-1 p-2" value="ok" name="btnIngresar">Ingresar Objeto</button>
        </div>
        </div>
    </div>


    </form>
<?php  }else{ ?>
<div class="row mb-5">
    <div class="col-10 col-sm-10 col-md-6 col-xl-4 p-5 ml-auto mr-auto">
    <form class="form p-5 rounded border shadow" method="POST" action="../../../proyecto_sena/crud-celador/registro_objetos.php">
        <h3 class="text-center">Registro De Objetos</h3>
                <div class="form form-group">
                    <label class="form-label mb-1">Documento</label>
                    <input type="text" class="form-control label input  mb-1" placeholder="Ingrese # documento" name="document">
                </div>
                <div class="form form-group">
                    <label class="form-label mb-1">Nombre</label>
                    <input type="text" class="form-control label input  mb-1" placeholder="Ingrese Nombre" name="nombre">
                </div>

                <div class="form form-group">
                    <label class="form-label mb-1">Apellido</label>
                    <input type="text" class="form-control label input  mb-1" placeholder="Ingrese apellido" name="apellido">
                </div>
        <div class="form form-group">
            <label class="form-label mb-1">Cargo</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Ingrese Su Cargo" name="cargo">
        </div>
        <div class="form form-group">
            <label class="form-label mb-1">Dispositivo</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Serial Del Dispositivo" name="dispositivo">
        </div>
        <div class="form form-group">
            <label class="form-label mb-1">Observaciones</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Ingrese una observaci??n" name="observacion">
        </div>
        <div class="row">
        <div class="col-auto ml-auto mr-auto">
            <button type="submit" class="btn text-white btn-success mt-1 p-2" value="ok" name="btnIngresar">Ingresar Objeto</button>
        </div>
        </div>
    </form>
    </div>
</div>
<?php } ?>
