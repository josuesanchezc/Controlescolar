<?php
class Grupo {
    private $id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;

    public function guardarGrupo(){

    }
    public function BuscarEspecif(){
        echo "<br>entro a metodo busqueda especifica de grupo";
    }

    public function BuscarGenerl(){
        echo "<br>entro a metodo busqueda general de grupo";
    }

    public function Modificar(){
        echo "<br>entro a metodo modificar de grupo";
    }
    public function EliminarGrupo(){

    }
    //Terminan las funciones del crud



    //Funciones Adicionales para Agregar Alumnos a grupos
    public function AsignarAlumnoaGrupo(){
        $sql01="SELECT * FROM personascontrol WHERE nivel=3 AND estatus = 1  ORDER BY IdPersona ASC";
        $consulta = mysql_query($sql01) or die ("error 1");
        $cuantos3=mysql_num_rows($consulta);
        echo "<div class=table-resposive>";
        echo "<form name=materias action=asignar-alumnos.php method=Post>";
        for ($y=0; $y<$cuantos3; $y++)
        {
            $id=mysql_result($consulta, $y, 'IdPersona');
            $nom=mysql_result($consulta, $y, 'nombre');
            $apat =mysql_result($consulta, $y, 'Apat');
            $amat=mysql_result($consulta,$y,'Amat');
            $sql2="SELECT * FROM asignagrupos WHERE idalumno = $id";
            $res03 = mysql_query($sql2)or die("No se ejecuta consulta de alumnos");
            $existe = mysql_num_rows($res03);
            if($existe > 0){
                //echo"<input type=checkbox name=user1[] value=$id>Asignada</input><br>";
            }else{
                echo"<input type=checkbox name=user1[] value=$id>$nom $apat $amat<br>";
            }
        }
        echo '<br>';
        $sql3="SELECT * FROM grupos WHERE estatus = 1 ORDER BY nombre ASC ";
        $consulta3=mysql_query($sql3) or die ('Error de Consult3');
        $cuantos3=mysql_num_rows($consulta3);
        echo "<select name=user2>";
        echo"<option value=t>--Seleccionar--</option>";
        for ($y=0; $y<$cuantos3; $y++)
        {
            $id=mysql_result($consulta3, $y, 'idgrupo');
            $nom=mysql_result($consulta3, $y, 'nombre');
            echo"<option value=$id>$nom </option>";
        }
        echo "</select>";
        echo "<br><br><input type=submit name=submit value=Agregar />";
        echo "</form>";
        echo "</table>";
        echo "</div>";
    }
    public function InsertVal($idalu,$idgrup){
        $insert01 = "INSERT INTO asignagrupos(idalumno,idgrupo) VALUES ($idalu,$idgrup)";
        $execute = mysql_query($insert01) or die ("Error al insertar");
    }
    public function DeleteReg($id){
        echo "<br>entro a metodo eliminar registro de grupo";
        $delete01 = "DELETE FROM asignagrupos WHERE idgrupos = $id";
        $execute = mysql_query($delete01) or die ("Error al eliminar");
        echo "Elimino el registro $id";
    }
public function AlumnosAsignadosGrupo($idgrup){

    $sql01="SELECT asignagrupos.`idgrupos`, personascontrol.`nombre`,personascontrol.`Apat`,personascontrol.`Amat`,grupos.`nombre` AS grupo
FROM asignagrupos,personascontrol,grupos
WHERE asignagrupos.`idalumno` = personascontrol.`IdPersona`
AND asignagrupos.`idgrupo` = grupos.`idgrupo`
AND asignagrupos.`idgrupo` = $idgrup";
    $consulta = mysql_query($sql01) or die ("error 1 de consulta a materia");
    $cuantos3=mysql_num_rows($consulta);
    echo "<div class=table-resposive align=center>";
    echo "<table class=\*table table-striped\ border=1>";
    echo "<tr><td colspan=2 align=center>Alumnos Asignados</td></tr>";
    echo"<tr><td>Alumnos</td><td>Eliminar Alumno</td></tr>";
    for ($y=0; $y<$cuantos3; $y++)
    {
        $id = mysql_result($consulta, $y, 'idgrupos');
        $nom =mysql_result($consulta, $y, 'nombre');
        $pat =mysql_result($consulta, $y, 'Apat');
        $mat =mysql_result($consulta, $y, 'Amat');
        $grup =mysql_result($consulta, $y, 'grupo');
        echo "<tr><td>$nom $pat $mat</td><td><form name=eliminar action=TestGrupo.php method=Post><input type=hidden name=id value=$id /><input type=submit name=submit value=Eliminar /></form></td></tr>";
    }
    echo "<tr><td colspan=2 align=center>Alumnos agregados al grupo: $grup </td></tr>";
    echo "</table>";
    echo "</div>";


}


} 