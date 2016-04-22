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

     <div class="container" id="error">
            <div id="opciones" class="opciones-card">
              <div class="card opciones">
                <div class="card-content">
                  <div class="align center">
                    <h5>Rayos!</h5>
                  <p>Al parecer no hay nada por aquí hoy, pero <b>NO TE DESANIMES</b>
                    por aqui puedes encontrar algunas actividades para pasar el rato</p>
                  </div>
                  <br>
                  <div class="align center">
                      <a href=""><img src="<?php echo base_url() ?>assets/img/eventos.png" alt="eventos"></a>
                  </div>
                </div>
              </div>

            </div>
        </div>

<div class="contenedor " id="contenedor1">
        <div class="buttonbuscar">
          <div class="row">   
                <div class="col s12" align="center" >         
                  <button  onclick="botonbuscar()" class="buscar z-depth-4 amber hoverable" id="buscar" onclick="Materialize.toast('Estamos buscando!', 3000, 'rounded')">
                    <span>Buscar</span>
                  </button> 
                </div>   
          </div>      
        </div>
    </div>
  <div class="container" id="contenedor2">
            <div id="notificacion" class="confirm-card">
              <div class="card alumno">
                <div class="card-image">
                  <img src="<?php echo base_url() ?>assets/img/images2.jpeg">
                  <span id="nombre" class="card-title z-depth-1  amber "></span>
                </div>
                <div class="card-content">
                  <p id="telefono"><i class="material-icons">phone</i>  </p>
                  <p id="hora"><i class="material-icons">query_builder</i> </p>
                  <p id="lugar"><i class="material-icons">location_on</i> </p>
                </div>
                  <!-- Modal Trigger -->
                  <div id="contenedorboton"></div>
              </div>

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

              $("#buscar").click(function () {
                 var error=true;
                $.getJSON("<?php echo base_url() ?>index.php/Home/getEvent", function (time) {
                  $('#button').hide(1000); 
                      // code to be executed if condition is true
                    $.each(time, function(i, field){
                    $("#telefono").append(field.number);
                    $("#nombre").append(field.name+" "+field.last_name);
                    $("#lista").append("<p>"+field.number+"</p>");
                    $("#hora").append(field.hour+" PM");
                    $("#lugar").append(field.address+"<a href='' > - mapa</a>");
                    $("#contenedorboton").append("<button class='pink accent-4 waves-effect waves-light btn' id='btnconf' onclick='confirmar()' value='"+field.id_principal+"'>Confirmar</button>");
                    $("#contenedor2").show();
                    error=false;
                    });
                    if (error) {
                       $("#error").show();
                    };
                  });
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