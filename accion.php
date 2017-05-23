<?php
include "./lib/usuario.php";
include "./lib/seguridad.php";

$user=new usuario();
$seguridad = new Seguridad();

if(isset($_POST["accion"])){
     //Registro de usuario
     if($_POST["accion"]=="registro"){
       if($_POST["contr1"]==$_POST["contr2"]){
         $usurioReg=$user->insertarUsuario($_POST['usuario'],$_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['contr1']);
         if($usurioReg!=null){
            header("Location: inicio.php?UsuarioCorrect=El usuario ha sido registrado correctamente");
         }else{
           header("Location: inicio.php?UsuarioCorrect=Existe un  usuario o un Correo con ese nombre");
         }
       }else{
        header("Location: inicio.php?UsuarioCorrect=Las contraseñas no son Iguales. Intente registrarse de nuevo con las contraseñas iguales.");
       }
     }
     //-- Login de usuario --\\
     elseif ($_POST["accion"]=="login") {
			$resultado=$user->buscarLogin($_POST["usuario"]);
      var_dump($resultado);
			if($resultado!=null){
				//-- Comparamos los passwords     CON sha1 esta encriptado... --\\
				if($resultado["Pass"]==sha1($_POST["contr1"])){
					//-- con esta funcion hace sesion start en miperfil.php --\\
					$seguridad->addUsuario($_POST["usuario"]);
          //-- Cuando este logueado te renvia a myperfil.php --\\
					header("Location: myPerfil.php?UsuarioCorrect=Bienvienido ".$_POST['usuario'].", te estabamos esperando");
				}else{
          //-- Cuando las contraseña es incorrecta --\\
         header('Location: inicio.php?UsuarioCorrect=Las contraseñas no coinciden con su Usuario');
				}
			}else{
        //-- Cuando el usuario no existe --\\
        header('Location: inicio.php?UsuarioCorrect=Su Usuario no Existe, por favor registrese.');
			}
		}
     //-- LogOut --\\
     elseif ($_POST["accion"]=="logout") {
       $seguridad->logOut();
       header('Location: inicio.php?UsuarioCorrect=Gracias por disfrutar de nuestros servicios.');
     }
     elseif ($_POST["accion"]=="imc") {
       $altura = $_POST["altura"];
       $peso = $_POST["peso"];
       echo "Su indice de Masa Corporal es: ";
       $indice = $peso / ($altura * $altura);
       echo $indice;
       echo "<br>";

       if($indice<0.0016){
         header("Location: myPerfil.php?IMC=Infrapeso: Delgadez Severa. &indice=".$indice."");
       }
       elseif(($indice>0.0016)and($indice<=0.001699)){
         header("Location: myPerfil.php?IMC=Infrapeso: Delgadez moderada. &indice=".$indice."");
       }
       elseif(($indice>0.001850)and($indice<=0.002499)){
         header("Location: myPerfil.php?IMC=Peso Normal. &indice=".$indice."");
       }
       elseif(($indice>0.0025)and($indice<=0.002999)){
         header("Location: myPerfil.php?IMC=Sobrepeso. &indice=".$indice."");
       }
       elseif(($indice>0.0030)and($indice<=0.003499)){
         header("Location: myPerfil.php?IMC=Infrapeso: Obeso-Tipo I.  &indice=".$indice."");
       }
       elseif(($indice>0.0035)and($indice<=0.0040)){
         header("Location: myPerfil.php?IMC=Infrapeso: Obeso-Tipo II. &indice=".$indice."");
       }
       elseif($indice>0.0040){
         header("Location: myPerfil.php?IMC=Obeso-Tipo III &indice=".$indice."");
       }
       else {
         header("Location: myPerfil.php?ERRORIMC=ERROR-repita la operacion");
       }
     }
    //-- Actualizar Perfil de Usuario --\\
    elseif ($_POST["accion"]=="ActualizarPerfil") {
      $user->actualizarPerfil($_POST['nombre'],
                                  $_POST['apellidos'],
                                  $_POST['Correo'],
                                  $_POST['altura'],
                                  $_POST['peso'],
                                  $_POST['sexo'],
                                  $_POST['actividadDiaria'],
                                  $_POST['problemasdeSalud'],
                                  $_POST['actividadDiariaDesc'],
                                  $_POST['problemasdeSaludDesc'],
                                  $_POST['id']);
      header("Location: myPerfil.php?UsuarioCorrect=Tu Perfil ha sido actualizado");
    }
 }
?>
