<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>McFly server</title>

</head>
<body>

<div id="container">
    <h1>McFly server</h1>

    <div id="body">

        <h2><a href="<?php echo site_url(); ?>">Home</a></h2>

        <p>
            Prueba de código para <a href="http://kubide.es/">Kubide</a>
        </p>


        <ol>
            <li><a href="<?php echo site_url('api/notes/notes.xml'); ?>">Notas</a> - Todas las notas en XML</li>
            <li><a href="<?php echo site_url('api/notes/notes'); ?>">Notas</a> - Todas las notas en JSON</li>
            <li><a href="<?php echo site_url('api/notes/notes/1'); ?>">Notas</a> - Notas con id = 1 en JSON</li>
            <li><a id="ajax" href="<?php echo site_url('/api/notes/fav/id/1/user/1'); ?>">Notas favoritas</a> - Crear un favorito de la nota id = 1 para el usuario id = 1</li>
            <!-- <li><a id="ajax_test2" href="<?php echo site_url('api/notes/notes/'); ?>">Users</a> - Añadir una nota</li> -->
            <form method="post" name="forma" action="<?php echo site_url('/api/notes/notes'); ?>">
            <input type="text" name="note" hidden value="BLRBLRBLR">
            <input type="text" name="user" hidden value="1">
            <li><a id="ajax_test2" href="<?php echo site_url('api/notes/notes/'); ?>">Users</a> - Añadir una nota</li>
            </form>
        </ol>

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '' ?></p>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.js"></script>

<script>
$(document).ready(function() {
  $('#ajax_test2').click(function(event) {
    event.preventDefault();
    document.forma.submit();
    /*
    site_url = $(this).attr('href');
     $.ajax({
      method: "post", 
      url: site_url, 
      data: {user : 1, note : "BLRBLRBLR"}
      }).done(function(response){
        alert(window.JSON.stringify(response, null, 2));
      })
      .fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });
*/
  });
});

</script>

</body>
</html>

