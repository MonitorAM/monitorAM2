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
</head>
<body>
<div class="container">
    <section class="main row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <h3>¿Recuperar Contraseña? </h3> 
        <h4>Ingrese su Rut y haga Clic sobre el botón Enviar. Su clave será enviado a su correo registrado en el sistema AM.</h4>
        <form name="form1" id="form1" action="enviarPassword.php" method="POST">
            <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-2 col-lg-2 control-label" for="email" style="color:#2F5C89">RUT</label>
                  <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
                    <input type="name" id="rut" class="form-control" name="rut" value="" placeholder="Ej:17528963-5">
                  </div>
            </div>
            <input type="submit" class="btn-info" value="Enviar">
        </form>
    </div>
    </section>
</div>
</body>
</html>