<header>
      <div class="container">
            <div class="jumbotron rounded-0 text-dark">
                  <?php
                  $class = strtolower($class);
                  echo "<h1>{$params[$class]['title']}</h1>";
                  echo "<p class='lead mb-0'>{$params[$class]['subtitle']}</p>";
                  ?>
            </div>
      </div>
</header>

<?php echo "\n"; ?>