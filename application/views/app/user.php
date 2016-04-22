<html>
<head> 
  <title> Ajax Exmaples! </title>
  <!--Load JQUERY from Google's network -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript"> 
    $( document ).ready(function () {
      $('#spconfirmar').hide(); 
      $("#button").click(function () {

        $.getJSON("<?php echo base_url() ?>index.php/Home/getEvent", function (time) {
          $('#button').hide(1000); 
          $.each(time, function(i, field){
            $("#lista").append("<p>"+field.img_selfie+"</p>");
            $("#lista").append("<p>"+field.name+" "+field.last_name+"</p>");
            $("#lista").append("<p>"+field.number+"</p>");
            $("#lista").append("<p>"+field.hour+"</p>");
            $("#lista").append("<p>"+field.address+"</p>");
            $("#lista").append("<button id='btnconf' onclick='confirmar()' value='"+field.id_principal+"'><p>Confirmar</p>");
          });
        });
      });

    });

  function confirmar(){
        $('#lista').hide(1000); 
        $('#spconfirmar').show(1000);
        setTimeout ("redireccion();", 2000); 
  }

  function redireccion(){
    window.location.href="<?php echo base_url() ?>index.php/Home/confirm/"+$("#btnconf").val();
  }
  </script>
</head>
<body>

  <br/>
  <button id="button">
    Get Time from Server
  </button>
  <div id="spconfirmar">
    <p>Confirmando convivencia...</p>
  </div>
  <div id="info">
     <ul id="lista">
       
     </ul>
  </div>
</body>
</html>