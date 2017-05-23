<?php
include "./lib/usuario.php";
$user=new usuario();
include "./lib/seguridad.php";
$seguridad = new seguridad();
//si no hay usuario que entra, redirige a indeX, o si se entra de golpe....
if ($seguridad->getUsuario() == null ) {
	header('Location: inicio.php');
}
//-- Esto es para que se pueda distribuir la informacion del Usuario
$resultado = $user->buscarUsuario($seguridad->getUsuario());
	if ($resultado != false) {
		$data=[];
		foreach ($resultado as $key => $fila) {
			$data=$fila;
		}
	}

?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>INICIO</title>
    <!-- BOOTSTRAP -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cabecera.css">
    <link rel="stylesheet" href="myPerfil.css">
		<?php
		if (!empty($_GET)) {
			 ?>
			<script type="text/javascript">
				alert("<?=$_GET['UsuarioCorrect'] ?>");
			</script>
			<?php
		}
		 ?>
  </head>

  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-2">
              	<img src="IMAGENES/logo.png" class="centradoVertical">
          </div>
          <div class="col-7">
              <img src="IMAGENES/logo2.png" id="logo2img" width="500px" class="centradoVertical">
          </div>
					<form method="post" action="accion.php">
						<input type="hidden" name="accion" value="logout">
						<input type="submit" class="btn btn-danger"value="LogOut">
					</form>

      <nav>

         <a href="inicio.php">INICIO</a>
         <a href="noticias.php">NOTICIAS</a>
         <a href="dietas.php">DIETAS</a>
         <a href="ejercicios.php">EJERCICIOS</a>
				 <a href="myPerfil.php">My Perfil</a>

      </nav>

    </header>
    <!- Contenido de la PAGINA ->
<div class="container">
    <section id="content">
      <div class="container">
        <br>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#personal">Informacion Personal</a></li>
        <li><a data-toggle="tab" href="#ejercicios">Mis Ejercicios</a></li>
        <li><a data-toggle="tab" href="#dietas">Mis Dietas</a></li>
      </ul>
      <div class="tab-content">
        <!- Aqui Empieza Mi Informacion Personal con el IMC ->
        <div id="personal" class="tab-pane fade in active">
        <form action="accion.php" method="post">
              <div id="formulario">
                <div >
                  <fieldset>
                      <legend>Rellena tu salud</legend>
                      <div>
                        <div class="form2">
                          <label for="Nombre">Imagen de Perfil:</label><br>
                          <img src="./IMAGENES/<?php echo $data['Foto']; ?>" alt="" class="imgPerfil"><br><br>
                          <button type="button" name="button">Cambiar Imagen</button>
                        </div>
                          <label for="Nombre">Nombre:</label><br>
                          <input type="text" class="inputs" name="nombre" value="<?php echo $data['Nombre']; ?>"/>
                      </div>
                      <div>
                          <label for="Apellidos">Apellidos:</label><br>
                          <input type="text" class="inputs" name="apellidos" value="<?php echo $data['Apellidos']; ?>"/>
                      </div>
                      <div>
                          <label for="Apellidos">Correo:</label><br>
                          <input type="text" class="inputs" name="Correo" value="<?php echo $data['Correo']; ?>"/>
                      </div>
                      <div>
                          <label for="Altura">Altura:</label><br>
                          <input type="Number" class="inputsNumber" name="altura" value="<?php echo $data['Altura']; ?>"/>
                      </div>
                      <div>
                          <label for="Peso">Peso:</label><br>
                          <input type="Number" class="inputsNumber" name="peso" value="<?php echo $data['Peso']; ?>"/>
                      </div>
                      <div>
                          <label for="Sexo">Sexo:</label><br>
													<?php if ($data['Sexo']==null) {
													 ?>
													Hombre<input type="radio" name="sexo" value="Hombre" /> Mujer<input type="radio" name="sexo" value="Mujer"/>
													<?php }elseif ($data['Sexo']=="Hombre") {
													?>
													Hombre<input type="radio" name="sexo" value="Hombre" checked/> Mujer<input type="radio" name="sexo" value="Mujer"/>
													<?php
													}elseif ($data['Sexo']=="Mujer"){
													 ?>
													Hombre<input type="radio" name="sexo" value="Hombre" /> Mujer<input type="radio" name="sexo" value="Mujer"checked/>
												<?php
													}
													 ?>
                      </div>
                      <br>
                      <div>
                          <label for="actividadDiaria" >Actividad Diaria:</label><br>
													<?php if ($data['ActividadDiaria']==null) {
													 ?>
													Si<input type="radio" name="actividadDiaria" value="Si" /> No<input type="radio" name="actividadDiaria" value="No"/>
													<?php }elseif ($data['ActividadDiaria']=="Si") {
													?>
													Si<input type="radio" name="actividadDiaria" value="Si" checked/> No<input type="radio" name="actividadDiaria" value="No"/>
													<?php
												}elseif ($data['ActividadDiaria']=="No"){
													 ?>
													Si<input type="radio" name="actividadDiaria" value="Si" /> No<input type="radio" name="actividadDiaria" value="No"checked/>
												<?php
													}
													 ?>
													 <textarea name="actividadDiariaDesc" rows="8" cols="80" placeholder="Cual?"><?php echo $data['ActividadDiariaDesc']; ?></textarea>

                      </div>
                      <div>
                          <label for="ProblemasdeSalud" class="actiDyProblemSal">Problemas de Salud:</label><br>
													<?php if ($data['ProblemasSalud']==null) {
													 ?>
													Si<input type="radio" name="problemasdeSalud" value="Si" /> No<input type="radio" name="problemasdeSalud" value="No"/>
													<?php }elseif ($data['ProblemasSalud']=="Si") {
													?>
													Si<input type="radio" name="problemasdeSalud" value="Si" checked/> No<input type="radio" name="problemasdeSalud" value="No"/>
													<?php
												}elseif ($data['ProblemasSalud']=="No"){
													 ?>
													Si<input type="radio" name="problemasdeSalud" value="Si" /> No<input type="radio" name="problemasdeSalud" value="No"checked/>
												<?php
													}
													 ?>
													 <textarea name="problemasdeSaludDesc" rows="8" cols="80" placeholder="Cual?"><?php echo $data['ProblemasSaludDesc']; ?></textarea>
                      </div>
											<div class="salud">
												<input type="hidden" name="id" value="<?php echo $data['idUsuarios']; ?>">
												<input type="hidden" name="accion" value="ActualizarPerfil">
												<input type="submit"  class="btn btn-info "name="submit" value="Actualizar perfil"/>
											</div>

                      </fieldset>
                    </div>
                </form>
            </div>
            <!- IMC ->
              <div id="formulario2">
								<form action="accion.php" method="post">
                <div >
                  <fieldset>
                      <legend>Indice de Masa Corporal</legend>
                      <div>
                          <label for="Altura">Altura:</label><br>
													<input name="altura" type="text" id="altura" size="8" maxlength="4" value="<?php echo $data['Altura']; ?>" readonly>
                      </div>
                      <div>
                          <label for="Peso">Peso:</label><br>
													<input name="peso" type="text" id="peso" size="8" maxlength="3" value="<?php echo $data['Peso']; ?>" readonly>
                      </div>
                      <div>
													<input type="hidden" name="accion" value="imc">
													<input type="submit"  class="salud btn  btn-info "name="submit" value="Comprueba tu indice"/><br><br>
													<?php
													if (isset($_GET['IMC'])) {
														echo '<label for="Peso">Tu indice es :</label><br>';
														echo $_GET['IMC'];
														echo "/ Nº Indice: ".$_GET['indice'];
													}elseif (isset($_GET['ERRORIMC'])) {
														?>
													 <script type="text/javascript">
														 alert("<?=$_GET['ERRORIMC'] ?>");
													 </script>
													 <?php
													}
													 ?>
                  </fieldset>
                </div>
            </div>
          </form>
          </div>
          <!- Aqui Empieza Mis Ejercicios ->
        <div id="ejercicios" class="tab-pane fade">
          <br>
					<div class="container-fluid">
						<ul class="nav nav-pills nav-stacked col-md-2">
							<li class="active"><a href="#pecho" data-toggle="pill">Pecho</a></li>
							<li><a href="#hombro" data-toggle="pill">Hombro</a></li>
							<li><a href="#brazo" data-toggle="pill">Brazo</a></li>
							<li><a href="#espalda" data-toggle="pill">Espalda</a></li>
							<li><a href="#piernas" data-toggle="pill">Piernas</a></li>
							<li><a href="#abdomen" data-toggle="pill">Abdomen</a></li>
						</ul>
						<div class="tab-content col-md-10">
							<div class="tab-pane active" id="pecho">
								<h4>pecho</h4>
								<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
									ac turpis egestas.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
								</div>
								<div class="tab-pane" id="hombro">
                           <h4>hombro</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.lore</p>
                      </div>
                      <div class="tab-pane" id="brazo">
                           <h4>brazo</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
                      <div class="tab-pane" id="espalda">
                           <h4>espalda</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
                      <div class="tab-pane" id="piernas">
                           <h4>piernas</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
                      <div class="tab-pane" id="abdomen">
                           <h4>abdomen</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
              </div>
            </div>
        </div>
        <!- Aqui Empieza Mys dietas->
        <div id="dietas" class="tab-pane fade">
          <br>
          <div class="container-fluid">
              <ul class="nav nav-pills nav-stacked col-md-2">
                <li class="active"><a href="#vegetarianas" data-toggle="pill">Vegetarianas</a></li>
                <li><a href="#hipocaloricas" data-toggle="pill">Hipocaloricas</a></li>
                <li><a href="#hipercaloricas" data-toggle="pill">Hipercaloricas</a></li>
                <li><a href="#carnivoras" data-toggle="pill">Carnivoras</a></li>
                <li><a href="#proteinacas" data-toggle="pill">Proteinacas</a></li>
              </ul>
              <div class="tab-content col-md-10">
                      <div class="tab-pane active" id="vegetarianas">
                           <h4>Vegetarianas:</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                      </div>
                      <div class="tab-pane" id="hipocaloricas">
                           <h4>Hipocaloricas</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.lore</p>
                      </div>
                      <div class="tab-pane" id="hipercaloricas">
                           <h4>Hipercaloricas</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
                      <div class="tab-pane" id="carnivoras">
                           <h4>Carnivoras</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
                      <div class="tab-pane" id="proteinacas">
                           <h4>Proteinacas</h4>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                              ac turpis egestas.</p>
                      </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    </section>
</div>
    <footer>
          <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="footer">
                <br />
                  <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social"></i></a>
          	      <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social"></i></a>
          	      <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social"></i></a>
          	      <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
          </div>
    </footer>

  </body>
</html>
