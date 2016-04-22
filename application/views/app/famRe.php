
        <div class="row light-blue">
          <div class="col s12 m12">
                <div class="row">
                  <h3 class="center-align "> INSERTA TUS DATOS </h3>
                </div> 
          </div>
        </div>x 


        <!-- empieza wrapper -->
        <div class="container">

          <div class="row">
            <form class="col s12" id="registro" method="post" action="<?php echo base_url() ?>index.php/Home/famInsert" >
              <div class="row">
                  <div class="input-field col s12">
                    <input name="number" id="number" type="tel" class="validate">
                    <label for="number">No Teléfono</label>
                  </div>

                  <div class="input-field col s12">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>

                  <div class="input-field col s12">
                    <input name ="name" id="name" type="text" class="validate">
                    <label for="name">Nombre del Titular</label>
                  </div>

                  <div class="input-field col s12">
                    <input  name="last_name" id="last_name" type="text" class="validate">
                    <label for="last_name">Apellido del Titular</label>
                  </div>
                  <div class="input-field col s12">
                    <input name="address" id="address" type="text" class="validate">
                    <label for="address">Direccion</label>
                  </div>
                  <div class="input-field col s6">
                    <input name="edad" id="edad" type="number" class="validate">
                    <label for="edad">Edad</label>
                  </div>

                  <div class="input-field col s6">
                    <input name="cant_fam" id="cant_fam" type="number" class="validate">
                    <label for="cant_fam">Familia de:</label>
                  </div>

              </div>

              <div class="col s12">
                            <p>
                              <input class="red" type="checkbox" id="terminos" />
                              <label for="terminos"><a href="#">Términos y Condiciones</a></label>
                            </p>    
                    </div>
                    <div class="col s12">
                        <button class="btn right  redwaves-effect waves-light z-depth-4" type="submit" >Registrarme
                        </button>  
                    </div>
            </form>
            <br>
          </div>
               <div class="progress" id="loading">
                <div class="indeterminate"></div>
            </div>
          </div>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
           <script type="text/javascript">
          $(document).ready(function(){
              $("#loading").hide();
              $(".button-collapse").sideNav();
              $('.slider').slider({full_width: false});
              $('.parallax').parallax();
              $('.modal-trigger').leanModal();
              // <--efecto flat botones --->
              $('.fixed-action-btn').closeFAB();
              $('.fixed-action-btn').openFAB();
              $('select').material_select();
                 
              });       

            function guardar(){
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>index.php/Home/famInsert",
                    cache: false,               
                    data: $('#formRegister').serialize(),
                    beforeSend: function () {
                        $("#loading").show();
                        },
                        success:  function (response) {
                          setTimeout ("redireccion();", 3000); 
                        },
                        error: function(){                      
                            alert('Error al conectarse..');
                        }

                     });
               }

            function redireccion(){
                window.location.href="<?php echo base_url() ?>";
              }
              </script>