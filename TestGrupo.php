<?php
require ('Grupo.php');
require('header.php');
require ('bd.php');
$Grupo = new Grupo();
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Eliminar":
            $Grupo->DeleteReg($_POST['id']);
            break;
        }
    }
$Grupo->AsignarAlumnoaGrupo();
require('footer.php');



?>