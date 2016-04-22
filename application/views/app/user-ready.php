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
  <div class="container" id="contenedor2">
    <?php foreach ($perfil as $key): ?>
          <div id="notificacion" class="confirm-card">
              <div class="card alumno">
                <div class="card-image">
                  <img src="<?php echo base_url() ?>assets/img/images2.jpeg">
                  <span id="nombre" class="card-title z-depth-1  amber "><?php echo $key->name ?></span>
                </div>
                <div class="card-content">
                  <p id="telefono"><i class="material-icons">phone</i> <?php echo $key->number ?> </p>
                  <p id="hora"><i class="material-icons">query_builder</i> <?php echo $key->hour ?> </p>
                  <p id="lugar"><i class="material-icons">location_on</i> <?php echo $key->address ?></p>
                  <p id="lugar"><i class="material-icons">perm_contact_calendar</i> <?php echo $key->dia ?></p>
                </div>
                  <!-- Modal Trigger -->
                  <div id="contenedorboton"></div>
              </div>
            </div>
    <?php endforeach ?>
         
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
