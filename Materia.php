<?php
require('bd.php');
class Materia {
    private $id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;

    //funciones principales del CRud para clase de materias

    public function InsertVal(){
    echo "<br>entro a metodo insertar";
}

    public function BuscarEspecif(){
        echo "<br>entro a metodo busqueda especifica";
    }

    public function BuscarGenerl(){
        echo "<br>entro a metodo busqueda general";
    }
    public function Modificar(){
        echo "<br>entro a metodo modificar";
    }
    public function Eliminar(){

    }
    //terminan funciones principales del CRud para clase de materias



    public function DeleteReg($id){
        echo "<br>entro a metodo eliminar registro";
        $delete01 = "DELETE FROM asignadas WHERE idasigna = $id";
        $execute = mysql_query($delete01) or die ("Error al eliminar");
        echo "Elimino el registro $id";
    }

    public function AsignarMateriaMaestro($user){
        $sql01="SELECT materias.`nombre`, personascontrol.`nombre` AS namess ,asignadas.`idasigna`
        FROM asignadas,materias,personascontrol
        WHERE asignadas.`idmaestro` = personascontrol.`IdPersona`
        AND asignadas.`idmateria`=materias.`idmateria`
        AND personascontrol.`IdPersona` = $user ";
        $consulta = mysql_query($sql01) or die ("error 1 de consulta a materia");
        echo "<div class=table-resposive align=center>";
        echo "<table class=\*table table-striped\ border=1>";
        echo "<tr><td colspan=2 align=center>Materias Asignadas</td></tr>";
        echo"<tr><td>Materias</td><td>Eliminar Materia</td></tr>";
        while($field = mysql_fetch_array($consulta)){
            $this->id = $field['idasigna'];
            $this->Nombre = $field['nombre'];
            $this->asignado = $field['namess'];
        echo "<tr><td>$this->Nombre</td><td><form name=eliminar action=TestMateria.php method=Post><input type=hidden name=id value=$this->id /><input type=submit name=submit value=Eliminar /></form></td></tr>";
        }
        echo "<tr><td colspan=2 align=center>Materias del profesor: $this->asignado </td></tr>";
        echo "</table>";
        echo "</div>";
        }
    public function Agregarme($prof,$id){
        $insert01 = "INSERT INTO asignadas(idmaestro,idmateria) VALUES ($prof,$id)";
        $execute = mysql_query($insert01) or die ("Error al insertar");
    }

    public function Consultamaestro(){
        echo "<div><p>";
        $sql3="SELECT * FROM personascontrol WHERE nivel=2 ORDER BY nombre ASC ";
        $consulta3=mysql_query($sql3) or die ('Error de Consult3');
        $cuantos3=mysql_num_rows($consulta3);
        echo "<form name=materias action=asignar-materias.php method=Post>";
        echo "<select name=user>";
        echo"<option value=t>--Seleccionar--</option>";
        for ($y=0; $y<$cuantos3; $y++)
        {
            $id=mysql_result($consulta3, $y, 'IdPersona');
            $nom=mysql_result($consulta3, $y, 'nombre');
            echo"<option value=$id>$nom </option>";
        }
        echo "</select>";
        echo "<br><br><input type=submit name=submit value=Seleccionar />";
        echo "</form>";
        echo "</p></div>";
    }
    public function materiasdisponibles($prof){

        echo "<div><center><p>";
        echo "<form action=TestMateria.php method=POST id=materias>";
        echo "<table><tr><td colspan=2 align=center><strong>Asignar Materias</strong></td></tr>";
        echo "<tr><td>Materia: </td><td><select id=materia name=materia>";
        $sql1 = "SELECT * FROM materias WHERE estatus = 1 ORDER BY nombre ASC";
        $re1 = mysql_query($sql1)or die("Error $sql1");
        while($field = mysql_fetch_array($re1)){
            $id = $field['idmateria'];
            $opcion = $field['nombre'];
            $sql2="SELECT * FROM asignadas WHERE idmaestro = $prof AND idmateria = $id";
            $res03 = mysql_query($sql2)or die("No se ejecuta consulta de materias");
            $existe = mysql_num_rows($res03);
            if($existe > 0){
                //echo "<option value=0>Asignada</option>";
            }else{
                echo "<option value=$id>$opcion</option>";
            }
        }
        echo "</select></td></tr>";
        echo "<tr><td><input type=hidden name=idprof value=$prof /></td></tr>";
        echo "<tr><td><input type=submit name=submit value=Agregar /></td></tr>";
        echo "</table></form></p></center></div>";
    }
}