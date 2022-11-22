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
    <form class="row g-3 form p-7 rounded border shadow needs-validation" novalidate method="POST" action="../../../proyecto_sena/crud-celador/registro_objetos.php">
        <h3 class="text-center">Registro De Objetos</h3>
                
                <div class="col-md-4 form">
                    <label for="validationCustom01" class="form-label mb-1">Documento</label>
                    <input type="text" class="form-control label input  mb-1" id="validationCustom01" placeholder="Ingrese # documento" name="document" value="<?php echo $doc?>" required>
                    <div class="valid-feedback">
                        correcto
                    </div>
                    <div class="invalid-feedback">
                      el campo correo es requerido
                    </div>
                </div>
                <div class="col-md-4 form">
                    <label for="validationCustom02" class="form-label mb-1">Nombre</label>
                    <input type="text" class="form-control label input  mb-1" id="validationCustom02" placeholder="Ingrese Nombre" name="nombre" value="<?php echo $nombre?>" required>
                    <div class="valid-feedback">
                        correcto
                    </div>
                    <div class="invalid-feedback">
                      el campo correo es requerido
                    </div>
                </div>

                <div class="col-md-4 form">
                    <label for="validationCustom03" class="form-label mb-1">Apellido</label>
                    <input type="text" class="form-control label input  mb-1" id="validationCustom03" placeholder="Ingrese apellido" name="apellido" value="<?php echo $apellido?>" required>
                    <div class="valid-feedback">
                        correcto
                    </div>
                    <div class="invalid-feedback">
                      el campo correo es requerido
                    </div>
                </div>
        <div class="col-md-4 form">
            <label for="validationCustom05" class="form-label mb-1">Cargo</label>
            <input type="text" class="form-control label input  mb-1" id="validationCustom05" placeholder="Ingrese Su Cargo" name="cargo" value="<?php echo $cargo?>">
            <div class="valid-feedback">
                        correcto
                    </div>
                    <div class="invalid-feedback">
                      el campo correo es requerido
                    </div>
        </div>
        <div class=" col-md-4 form">
            <label for="validationCustom06" class="form-label mb-1">Dispositivo</label>
            <input type="text" class="form-control label input  mb-1" id="validationCustom06" placeholder="Serial Del Dispositivo" name="dispositivo" required>
            <div class="valid-feedback">
                        correcto
                    </div>
                    <div class="invalid-feedback">
                      el campo correo es requerido
                    </div>
        </div>
        <div class="col-md-4 form">
            <label class="form-label mb-1">Observaciones</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Ingrese una observación" name="observacion">
        </div>
        <div class="col-auto">
            <button type="submit" id="th" class="btn text-white btn-light" value="ok" name="btnIngresar">Ingresar Objeto</button>
        </div>
    </form>
<?php  }else{ ?>
    <form class="row g-3 form g-3 p-7 rounded border" method="POST" action="../../../proyecto_sena/crud-celador/registro_objetos.php">
        <h3 class="text-center">Registro De Objetos</h3>
                <div class="col-md-4 form form-group">
                    <label class="form-label mb-1">Documento</label>
                    <input type="text" class="form-control  label input  mb-1" placeholder="Ingrese # documento" name="document">
                </div>
                <div class="col-md-4 form form-group">
                    <label class="form-label mb-1">Nombre</label>
                    <input type="text" class="form-control  label input  mb-1" placeholder="Ingrese Nombre" name="nombre">
                </div>

                <div class="col-md-4 form form-group">
                    <label class="form-label mb-1">Apellido</label>
                    <input type="text" class="form-control  label input  mb-1" placeholder="Ingrese apellido" name="apellido">
                </div>
        <div class="col-md-4 form form-group">
            <label class="form-label mb-1">Cargo</label>
            <input type="text" class="form-control  label input  mb-1" placeholder="Ingrese Su Cargo" name="cargo">
        </div>
        <div class="col-md-4 form form-group">
            <label class="form-label mb-1">Dispositivo</label>
            <input type="text" class="form-control  label input  mb-1" placeholder="Serial Del Dispositivo" name="dispositivo">
        </div>
        <div class="col-md-4 form form-group">
            <label class="form-label mb-1">Observaciones</label>
            <input type="text" class="form-control label input  mb-1" placeholder="Ingrese una observación" name="observacion">
        </div>
        <div class="col-auto">
            <button type="submit" id="th" class="btn text-white btn-light" value="ok" name="btnIngresar">Ingresar Objeto</button>
        </div>
    </form>
<?php } ?>
