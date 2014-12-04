<?php
require ('Materia.php');
require('header.php');
require ('bd.php');
$Mate = new Materia();
$mat=$_POST[materia];
$prof =$_POST[idprof];
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Eliminar":
            $Mate->DeleteReg($_POST['id']);
            break;
        case "Agregar":
            $Mate->Agregarme($prof,$mat);
            break;
    }
}
$Mate->Consultamaestro();
require('footer.php');
?>