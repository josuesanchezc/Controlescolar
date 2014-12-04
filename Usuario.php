<?php
/**
 * Created by PhpStorm.
 * User: MAQ11-LAB2-TIC
 * Date: 12/09/14
 * Time: 06:00 PM
 */

class User {
    private $IdPersona;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $Nivel;
    private $Estatus;
public function InsertarDatos($Nombre,$ApellidoPaterno,$ApellidoMaterno,$Nivel,$Estatus)
        {
        $insert01 = "INSERT INTO personascontrol(nombre,Apat,Amat,Nivel,Estatus) VALUES ('$Nombre','$ApellidoPaterno','$ApellidoMaterno','$Nivel','$Estatus')";
        $execute = mysql_query($insert01) or die ("Error al insertar");
        }
public function ConsultarDatos()
        {
        $sql01="SELECT * FROM personascontrol WHERE estatus = 1 ORDER BY IdPersona ASC";
        $consulta = mysql_query($sql01) or die ("error 1");
        echo "<div class=table-resposive align=center>";
        echo "<table class=\*table table-striped\ border=1>";
        echo "<tr><td colspan=5 align=center>Resultados</td></tr>";
        echo"<tr><td>Numero</td><td>Nombre(s)</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Nivel</td>";
            while($field = mysql_fetch_array($consulta)){
                $this->IdPersona = $field['IdPersona'];
                $this->Nombre = $field['nombre'];
                $this->ApellidoPaterno = $field['Apat'];
                $this->ApellidoMaterno = $field['Amat'];
                $this->Nivel = $field['nivel'];
                    switch($this->Nivel){
                    case 1:
                            $type = "Administrador";
                        break;
                    case 2:
                            $type = "Maestro";
                        break;
                    case 3:
                            $type = "Alumno";
                        break;
                    }
            echo "<tr><td>$this->IdPersona</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$type</td></tr>";
            }
        echo "</table>";
    echo "</div>";
    }
public function ConsultaEspecific($id)
    {
    echo "<br><br><br>";
    $sql01="SELECT * FROM personascontrol WHERE estatus = 1 AND IdPersona=$id ORDER BY Apat ASC";
    $consulta = mysql_query($sql01) or die ("error 1");
    echo "<div class=table-resposive align=center>";
        echo "<table class=\*table table-striped\ border=1>";
            echo "<tr><td colspan=5 align=center>Resultados</td></tr>";
            echo"<tr><td>Numero</td><td>Nonbre de persona</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Nivel</td>";
                while($field = mysql_fetch_array($consulta)){
                    $this->IdPersona = $field['IdPersona'];
                    $this->Nombre = $field['nombre'];
                    $this->ApellidoPaterno = $field['Apat'];
                    $this->ApellidoMaterno = $field['Amat'];
                    $this->Nivel = $field['nivel'];
                        switch($this->Nivel){
                            case 1:
                                    $type = "Administrador";
                                break;
                            case 2:
                                    $type = "Maestro";
                                break;
                            case 3:
                                    $type = "Alumno";
                                break;
                        }
                echo "<tr><td>$this->IdPersona</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->ApellidoMaterno</td><td>$type</td></tr>";
                }
        echo "</table>";
    echo "</div>";
    }
public function UpdateDatos($nombre,$apellidoPaterno,$apellidoMaterno,$nivel,$estatus,$idd)
    {
    $update01 = "UPDATE personascontrol SET nombre = '$nombre', Apat = '$apellidoPaterno' , Amat='$apellidoMaterno' , Nivel = $nivel , Estatus = $estatus WHERE IdPersona = $idd";
    $execute = mysql_query($update01) or die ("Error al eliminar");
    echo "Modifico el registro $idd";
    }
public function DeleteReg($id)
    {
    $delete01 = "DELETE FROM personascontrol WHERE IdPersona = $id";
    $execute = mysql_query($delete01) or die ("Error al eliminar");
    echo "Elimino el registro $id";
    }
}
?>