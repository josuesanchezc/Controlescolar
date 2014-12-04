<?php
/**
 * Created by PhpStorm.
 * User: MAQ11-LAB2-TIC
 * Date: 12/09/14
 * Time: 06:22 PM
 */
require ('Alumno.php');

$Alumno = new Alumno();
$Alumno->InsertarDatos();
$Alumno->ConsultaGenral();
$Alumno->ConsultarDatos();
$Alumno->DeleteReg();
$Alumno->UpdateDatos();
?>