<header>
      <div class="container">
            <div class="jumbotron rounded-0 text-dark">
                  <?php
                  $class = strtolower($class);
                  echo "<h1>{$params[$class]['title']}</h1>";
                  if(isset($_SESSION['user_email']) && $class == 'home'){
                        $email = explode('@', $_SESSION['user_email']);
                        $email = $email[0];
                        echo "<p >Witaj <b class='orange'>$email</b></p>";
                  }
                  else{
                        echo "<p class='lead mb-0'>{$params[$class]['subtitle']}</p>";
                  }

                  ?>
            </div>
      </div>
</header>

<?php echo "\n"; ?>