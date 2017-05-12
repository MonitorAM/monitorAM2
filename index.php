<?php
include("conex.php");
$buscaPerfil="SELECT idPerfil, perfil FROM perfil where idPerfil!=4 and idPerfil!= 6 order by perfil";
$result=mysql_query($buscaPerfil,$enlace);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Monitor Asistencia</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/validarut.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">
      $(document).ready(function(){
         $("#perfil").hide();
         $("input[name=perfil2]").click(function () {
          if($('input:radio[name=perfil2]:checked').val()=='6') {//estudiante
            $("#password").hide();
            $("#perfil").hide();             
          }
          else if($('input:radio[name=perfil2]:checked').val()== '4') {//profesor
              $("#password").show();
              $("#perfil").hide(); 
          }
          else if($('input:radio[name=perfil2]:checked').val()=='100') {//otro
              $("#password").show();
              $("#perfil").show();
          }
        });
      });//document
      function recuperarPassword(){
        window.open('recuperarPassword.php'," ","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300,left = 300,top = 50");
      }
    </script>
</head>
<body>
   <div class="container">
    <div class="row">
          <img src="img/facultad.jpg" align='left' alt="" height="110" width="180">
          <img  src="img/logo_uach.jpg" align='right' height="100" width="180">      
    </div>
  </div>
</div>
 <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <section class="main row">
            <div class="col-xs-12 col-sm-12 col-lg-12" align="center">
              <!--<h1 class="text-center login-title">Ingreso al sistema</h1>-->
                <img class="profile-img" src="img/logo.png" alt="" width="330px">
                <form name="form1"  id="form1" class="form-signin" action="sesion/script_acceso_usuario.php" method="post" onSubmit="javascript:return Rut(document.form1.rut.value)" >
                    <br>
                    <label><input  type="radio" name="perfil2" id="perfiles" value="4" checked="checked">Profesor</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="perfil2" id="perfiles" value="6">Estudiante</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input  type="radio" name="perfil2" id="perfiles" value="100">Otro</label>
                    
                    <a href="info.html"><img class="profile-img" src="img/ayuda2.jpg" alt="" width="30px"></a>
                      <br>
                    <select style="width:330px" class="form-control"  name="perfil[]" id="perfil" required>
                      <?php  while ($registro=mysql_fetch_assoc($result)) {?>
                      <option value="<?php echo $registro['idPerfil'];?>"><?php echo $registro['perfil']; ?></option>
                      <?php }?>
                    </select>
                    <br>
                    <input name="rut" id="rut" type="text" class="form-control"  placeholder="Ej:17528963-5" onfocus="this.value=''"  onchange="javascript:return Rut(document.form1.rut.value)" required/>  
                    <br> 
                    <input name="password" id="password" type="password" class="form-control"  placeholder="Clave" onfocus="this.value=''" />                    
                    <a href="" onClick="recuperarPassword()">¿Ha olvidado su contraseña?</a>
                    <br>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit"> Ingresar</button>
              </form>
            </div> 
            </section>  
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>