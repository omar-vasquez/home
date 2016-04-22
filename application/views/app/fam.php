    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar-fixed  pink darken-4">
          <nav>
            <div class="nav-wrapper  pink darken-4 z-depth-0">
              <a href="#" data-activates="mobile-demo" class="button-collapse"><img class="usericon" src="<?php echo base_url() ?>assets/img/logo.png" alt="Usuario"></a>
              <span><?php echo $nombre ?></span>
              <ul class="left hide-on-med-and-down">
                <li><a href="#">Perfil</a></li>
                <li><a href="<?php echo base_url() ?>index.php/home/logout">Cerrar Sesión</a></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="#">Perfil</a></li>
                <li><a href="<?php echo base_url() ?>index.php/home/logout">Cerrar Sesión</a></li>
              </ul>
              <div class="progress" id="loading">
                <div class="indeterminate"></div>
              </div>
            </div>
          </nav>  
        </div>


<div class="contenedor" id="contenedor1">
        <div class="buttoninvitar">
          <div class="row">   
                <div class="col s12" align="center" >         
                  <button class="buscar z-depth-4 pink accent-4" id="invitar" onclick="Materialize.toast('Gracias por formar parte.!', 3000, 'rounded')">
                    <span>Invitar a</span><br>
                    <span>alguien</span>
                  </button> 
                </div>   
          </div>      
        </div>
</div>
 


<!-- aqui empieza el otro contenedor donde se da la hora y num de personas -->
<div class="container" id="contenedor2">
<div class="row align center">
    <p>Introduce la hora y revise media hora antes para ver 
      si hay alguna notificación</p>
    <form class="col s12" method="post" action="<?php echo base_url() ?>index.php/home/invitacion">
      <div class="row">
          <div class="input-field col s12">
            <input name="hora" id="hora" type="text" class="validate">
            <label for="hora">Hora</label>
          </div>
        </div>
        <div class="row">
                  <button class="btn pink accent-4 right waves-effect waves-light z-depth-4" type="submit" name="action">Invitar
              </button> 
        </div>
    </form> 
  </div>
</div>





  
        <script type="text/javascript">
          $(document).ready(function(){
            $("#loading").hide();
            $("#error").hide();
            $("#contenedor2").hide();
                    $(".button-collapse").sideNav();
                       $('.slider').slider({full_width: false});
                     $('.parallax').parallax();
                      $('.modal-trigger').leanModal();
                        // <--efecto flat botones --->
                         $('.fixed-action-btn').closeFAB();
                         $('.fixed-action-btn').openFAB();
                          $('select').material_select();

              $("#invitar").click(function () {
                $("#contenedor1").hide();
                $("#contenedor2").show();
              });

                 
              }); 

              function botonbuscar(){
                 $("#contenedor1").hide();
              }  

            function confirmar(){
                  $('#loading').show();
                  setTimeout ("redireccion();", 2000); 
            }

            function redireccion(){
              window.location.href="<?php echo base_url() ?>index.php/Home/confirm/"+$("#btnconf").val();
            }    
            </script>
    </body>
</html>
