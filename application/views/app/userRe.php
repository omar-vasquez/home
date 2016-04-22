    
    <div class="row amber">
          <div class="col s12 m12">
                <div class="row">
                  <h3 class="center-align "> INSERTA TUS DATOS </h3>
                </div> 
          </div>
        </div>
           <!-- empieza wrapper -->
        <div class="container">
          <div class="row">
           <form class="col s12" id="userFormRegist">
              <div class="row">
                <div class="input-field col s12">
                  <input name="number" id="number" type="number"  class="validate">
                  <label for="number">No Teléfono</label>
                </div>

                <div class="input-field col s12">
                  <input name="password" id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>

                <div class="input-field col s12">
                  <input name="name" id="name" type="text" class="validate">
                  <label for="name">Nombre</label>
                </div>
                
                <div class="input-field col s6">
                  <input name="matricula" id="matricula" type="text"  class="validate">
                  <label for="matricula">Matricula</label>
                </div>

                <div class="input-field col s6">
                  <input name="age" id="age" type="number" class="validate">
                  <label for="age">Edad</label>
                </div>              

              <div class="col s12">
                    <select class="browser-default col s12" name="place">
                        <option value="" disabled selected>¿De dónde eres?</option>
                        <option value="1">Istmo</option>
                        <option value="2">Costa</option>
                        <option value="3">Lugar</option>
                    </select>  
                </div>
                    <div class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea name="res" id="textarea1" class="materialize-textarea" maxlenght="140"></textarea>
                          <label for="textarea1">Sobre ti en 140 caracteres</label>
                        </div>
                      </div>
                    </div>
                <div class="input-field col s12">
                  <input name="ingreso" id="ingreso" type="number" pattern='' class="validate">
                  <label for="ingreso">Ingreso Mensual</label>
                </div> 

                <div class="input-field col s12">
                  <input name="lengua" id="lengua" type="text" class="validate">
                  <label for="lengua">Lengua Materna</label>
                </div> 

                <div class="col s12">
                    <div class="file-field input-field">
                      <div class="btn light-blue darken-3">
                        <span>Foto</span>
                        <input name="img" type="hidden" value="img" >
                        <input accept="image/*"  type="file" capture/>
                      </div>
                    </div>
                </div>


                <div class="col s12">
                    <div class="col s12">
                        <p>
                          <input type="checkbox" id="terminos" />
                          <label for="terminos"><a href="#">Términos y Condiciones</a></label>
                        </p>
                      </div>      
                </div> 

               Resultado: <span id="resultado">0</span> 
                <button type="button" href="javascript:;" onclick="guardar()" class="btn red right waves-effect waves-light z-depth-4" >Registrarme
                </button>  
            </form>
            </div>
          </div>
                <div class="progress" id="loading">
                <div class="indeterminate"></div>
            </div>
 
        </div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
                $("#loading").hide();
                $('#textarea1').val('New Text');
                $('#textarea1').trigger('autoresize');
                            
                  // Show sideNav
                  // Hide sideNav
        
              });    

            </script>

            <script>
            function guardar(){
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>index.php/home/userInsert",
                    cache: false,               
                    data: $('#userFormRegist').serialize(),
                    beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
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