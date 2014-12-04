<?php
require ('Usuario.php');
require('header.php');
require ('bd.php');
$User = new User();
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            /*echo "<br>Bot&oacute;n:".$_POST['submit'];*/
            $User->InsertarDatos("$_POST[nombre]","$_POST[ApellidoPaterno]","$_POST[ApellidoMaterno]",$_POST['Nivel'],$_POST['Estatus']);
            break;
        case "Eliminar":
            /*echo "<br>Bot&oacute;n:".$_POST['submit'];*/
            $User->DeleteReg($_POST['id']);
            break;
        case "Modificar":
        /*echo "<br>Bot&oacute;n:".$_POST['submit'];*/
        $User->UpdateDatos("$_POST[nombre]","$_POST[ApellidoPaterno]","$_POST[ApellidoMaterno]",$_POST['Nivel'],$_POST['Estatus'],$_POST['id']);
        break;
        case "Buscar":
            /*echo "<br>Bot&oacute;n:".$_POST['submit'];*/
            $User->ConsultaEspecific($_POST['iddbuscar']);
            break;
     }
}
/*$User->ConsultaEspecific(2);*/
/*$User->InsertarDatos("Josue","Moreno","Castoño",1,1);*/
/*$User->DeleteReg(8);*/
/*$User->UpdateDatos("Guadalupe","Carbajal","Soler",1,1,7);*/
echo "<br><br><br>
    <div>
        <form name=alumno action=TestUsuario.php method=Post>
            <table align=center border=1>
            <tr><td colspan=2 ><p><center>Control Escolar</center></p></td></tr>
                <tr><td><p>Nombre (s): </p></td><td><p><input type=text name=nombre /></p></td></tr>
                <tr><td><p>Apellido Paterno: </p></td><td><p><input type=text name=ApellidoPaterno /></p></td></tr>
                <tr><td><p>Apellido Materno: </p></td><td><p><input type=text name=ApellidoMaterno /></p></td></tr>
                <tr><td><p>Nivel: </p></td><td><select name=Nivel>
                <option value=1>Administrador</option>
                <option value=2>Maestro</option>
                <option value=3>Alumno</option>
                </select></td></tr>
                <tr><td><p>Estatus: </p></td><td><select name=Estatus>
                <option value=1>Activo</option>
                <option value=0>Inactivo</option>
                </select></td></tr>
                <tr><td colspan=2><input type=submit name=submit value=Alta /></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td><p><input type=text name=id /></p></td><td><p><input type=submit name=submit value=Eliminar /></p></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td colspan=2 align=center><p><input type=submit name=submit value=Modificar /></p></td></tr>
                <tr><td><input type=text name=iddbuscar /></td><td><input type=submit name=submit value=Buscar /></td></tr>
            </table>
    </form>
</div><br><br><br>";
$User->ConsultarDatos();
require('footer.php');
?>