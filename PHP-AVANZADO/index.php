<!doctype html>
<html lang="en">
  <head>
    <title>Pagina con PHP</title>
    <meta lang="es" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </head>
  <body>
      <?php $nombreImagen = 2; ?>
      <img src="./imagenes/<?php echo $nombreImagen.'.png';?>" height="42">
      <?php
        include_once('./../index.php');
        echo date('l jS \of F Y h:i:s A')."<br/>";
        echo factorial(31);
      ?>
      <?php
        echo "<table>";
        echo "<tr><td>Identificador</td><td>Nombre Mes</td></tr>";
        for( $i = 0 ; $i<12; $i++ ) {
            $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            echo "<tr><td>".($i+1)."</td><td>$meses[$i]</td><tr>";
        }
        echo "</table>";
      ?>
      <script>
          <?php 
            echo "alert('".date('l jS \of F Y h:i:s A')."');";
          ?>
      </script>
  </body>
</html>

