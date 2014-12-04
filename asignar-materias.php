<?php
require ('Materia.php');
require('header.php');
require ('bd.php');
$Mate = new Materia();
$prof=$_POST[user];
$Mate->AsignarMateriaMaestro($prof);
$Mate->materiasdisponibles($prof);
require('footer.php');


?>