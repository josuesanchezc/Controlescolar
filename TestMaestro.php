<?php
require ('Maestro.php');
require('header.php');
require ('bd.php');
$prof = new Maestro();
$idnl=$_SESSION['idu'];
echo "<br><br>";
$prof->Consultamaterias($idnl);

require('footer.php');



?>