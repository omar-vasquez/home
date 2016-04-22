<!doctype html>
<html class="" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Titulo de página</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
        <!-- terminan los css -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
            <div id="login" class="signin-card">
              <div class="logo-image">
                        <img class="logo" src="<?php echo base_url() ?>assets/img/logo.png" alt="Logo" title="Logo" >
                </div>
              </div>
                    <form action="<?php echo base_url() ?>index.php/home/auth" method="post" class="" role="form">
                        <div class="row">
                            <div class="input-field col s12">
                              <input placeholder="Teléfono" type="tel" name="userName" id="userName" value="" class="validate" required>
                            </div>
                            <div class="input-field col s12">
                              <input placeholder="Password" type="password" name="userPassword" id="userPassword" value="" class="validate">
                            </div>
                            <div class="col s6">
                             <a class="modal-trigger" href="#modal1"><p>Crear una nueva cuenta</p></a>                   
                            </div>
                            <div class="col s12">
                            <button class="btn pink accent-4 waves-effect waves-light right" type="submit" name="action">Ingresar
                             </button>    
                            </div>              
                          </div>
                    </form>
            </div>
       <!-- Modal Structure -->
              <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content">
                    <div class="row" align="center">
                      <div class="col s6 hoverable">
                          <a href="<?php echo base_url() ?>index.php/home/userRe"><img src="<?php echo base_url() ?>assets/img/user.png" class="img-responsive" alt=""></a>
                          <a href="<?php echo base_url() ?>index.php/home/userRe"><p>Usuario</p></a>
                      </div>
                      <div class="col s6 hoverable">
                         <a href="<?php echo base_url() ?>index.php/home/famRe"><img src="<?php echo base_url() ?>assets/img/casa.png" class="img-responsive" alt=""></a>
                          <a href="<?php echo base_url() ?>index.php/home/famRe"><p>Voluntario</p></a>
                      </div>
                    </div>
                </div>

              </div>
        </div>
        <script src="<?php echo base_url() ?>assets/js/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>       
        <script src="<?php echo base_url() ?>assets/js/materialize.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
    $('.modal-trigger').leanModal();
    $('#modal1').closeModal();
 });
 </script>
