<?php
include_once '../app/views/inc/head.php';
include_once '../app/views/inc/nav.php';
?>
<div class="container">
      <div class="jumbotron rounded-0 text-dark">
            <h1>600</h1>
            <?php 
            if(isset($message) && !empty($message)) echo $message;
            else echo "<p class='lead'>no info! </p>";
            ?>
      </div>
      <p>
            
      </p>
</div>