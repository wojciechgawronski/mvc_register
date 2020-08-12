<?php
include_once('../app/views/inc/head.php');
include_once('../app/views/inc/nav.php');

?>
<div class="container">
      <div class="jumbotron text-dark rounded-0">

            <h1>404</h1>
            <?php 
            if(isset($message) && !empty($message)) echo $message;
            else echo "<p class='lead'>Przepraszamy, 404!</p>";
            ?>
            
      </div>
</div>

<?php
include_once '../app/views/inc/footer.php';
include_once '../app/views/inc/foot.php';