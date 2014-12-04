<?php
class Maestro  {
private $Materia;
private $Nombre;
public function Consultamaterias($idln){
        $sql01="SELECT asignadas.`idasigna`,materias.`nombre`, personascontrol.`nombre` AS namess
        FROM asignadas,materias,personascontrol
        WHERE asignadas.`idmaestro` = personascontrol.`IdPersona`
        AND asignadas.`idmateria`=materias.`idmateria`
        AND personascontrol.`IdPersona` = $idln ";
        $consulta = mysql_query($sql01) or die ("error 1 de consulta a materia");
        echo "<div class=table-resposive align=center>";
        echo "<table class=\*table table-striped\ border=1>";
        echo "<tr><td colspan=2 align=center>Materias Asignadas</td></tr>";
        while($field = mysql_fetch_array($consulta)){
            $this->id = $field['idasigna'];
            $this->Nombre = $field['nombre'];
            $this->asignado = $field['namess'];
            echo "<tr><td>$this->Nombre</td></tr>";
        }
        echo "</table>";
        echo "</div>";
        }
    }
?>
