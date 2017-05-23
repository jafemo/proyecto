<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>INICIO</title>
    <!-- BOOTSTRAP -->
    <!-- BOOTSTRAP -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cabecera.css">
    <link rel="stylesheet" href="inicio.css">
<?php
if (!empty($_GET)) {
   ?>
  <script type="text/javascript">
    alert("<?=$_GET['UsuarioCorrect'] ?>");
  </script>
  <?php
}
?>
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
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Iniciar Sesión</button>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Inicia Sesion</h4>
                </div>
                <div class="modal-body">
                        <section>
                          <form class="" action="accion.php" method="post">
                               <label for="Usuario">Usuario:</label>
                               <input type="text" name="usuario" value="" class="form-control input-sm" placeholder="usuario">
                               <label for="Contraseña">Contraseña:</label>
                               <input type="password" name="contr1" id="password" class="form-control input-sm" placeholder="Password"><br>
                             <input type="hidden" name="accion" value="login">
                             <input type="submit" value="Iniciar Sesion" class="btn btn-info registro">
                           </form>
                         </section>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Registrate</button>
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Registrate</h3>
                </div>
                <div class="modal-body">
                    <section>
                          <form class="" action="accion.php" method="post">
                                  <label for="Usuario">Usuario:</label><br>
                                  <input type="text" name="usuario" required><br>
                                  <label for="Nombre">Nombre:</label><br>
                                  <input type="text" name="nombre" required><br>
                                  <label for="Apellidos">Apellidos:</label><br>
                                  <input type="text" name="apellidos" required><br>
                                  <label for="Email">Email:</label><br>
                                  <input type="text" name="email" required><br>
                                  <label for="Contraseña">Contraseña:</label><br>
                                  <input type="password" name="contr1" required><br>
                                  <label for="Repita_Contraseña">Repita la Contraseña:</label><br>
                                  <input type="password" name="contr2" required><br>
                             <input type="hidden" name="accion" value="registro">
                             <input type="submit" value="Registrate" class="btn btn-info btn-block registro">
                           </form>
                    </section>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <nav>
         <a href="inicio.php">INICIO</a>
         <a href="noticias.php">NOTICIAS</a>
         <a href="dietas.php">DIETAS</a>
         <a href="ejercicios.php">EJERCICIOS</a>
         <a href="myPerfil.php">PERFIL</a>
      </nav>
    </header>

    <!-- Contenido -->
    <div id="content">
      <h2 align="center">La página de tu bienestar</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="IMAGENES/slider1.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="IMAGENES/slider2.jpg" width="100" height="100" alt="Chicago" style="width:100%;">
      </div>

      <div class="item">
        <img src="IMAGENES/slider3.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    <footer>
      <br>
    <p>Hola somos el grupo de proyecto 1<br>
    y esta es nuesta página web donde podrás<br>
    encocntrar todo tipos de cosas para tu salud</p>
          <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="footer" align="center">

                  <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social"></i></a>
          	      <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social"></i></a>
          	      <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social"></i></a>
          	      <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
          </div>
    </footer>

  </body>
</html>
