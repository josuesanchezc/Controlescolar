<?php
require ('bd.php');
class Valida{
    private $User;
    private $Password;

public function ValidaUser($User,$Password){
    $user=  $User;
    $psw=   $Password;
    if ($user==""or $psw=="")
    {
        $msg="Los campos deben ir llenos";
        print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        exit;
    }
    $sql="SELECT * FROM personascontrol WHERE usuario='$user' AND password='$psw' AND estatus=1";
    $consulta=mysql_query($sql)or die ("error de consulta");
    $cuantos=mysql_num_rows($consulta);
    if($cuantos==0)
    {
        $msg='El usuario o contraseña no son correctos';
        print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        exit;
    }
    else
    {
        $idp=mysql_result($consulta,0,'IdPersona');
        $nivel=mysql_result($consulta,0,'nivel');
        $activo=mysql_result($consulta,0,'estatus');
        if($activo== 0 )
        {
            $msg='El usuario no esta activo, consulte al administrador';
            print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
            exit;
        }

        else
        {
            $ide     =  ("$idp");
            $idniv   =  ("$nivel");
            $acceso = new Valida();
            $acceso->Acceso($ide,$idniv);
        }
    }
}
    public function Acceso($ide,$idniv){
        $idu=$ide;
        $idnl=$idniv;
        session_start();
        $_SESSION['idu']=$idu;
        $_SESSION['idnl']=$idnl;
        $_SESSION['acceso']=1;
        SetCookie('idu2',$idu);
        SetCookie('acceso2',1);
        $conexion=mysql_connect('localhost', 'root', 'qwerty') or die ('error de conexion a hosting');
        $base=mysql_select_db('controlescolar', $conexion) or die('no existe la base de datos');
        print "<meta http-equiv='refresh' content='0; url=principal.php'>";
        exit;
        }
    }
?>