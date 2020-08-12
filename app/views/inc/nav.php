<?php

$url = $_GET['url'] ?? 'home';
$url = explode('/', $url);
if(is_array($url)) $url = $url[0];

?>

<nav>
      <div class="container d-flex justify-content-between">

            <ul class="nav">
                  <li class="nav-item">
                        <a class="nav-link active pl-0
                        <?php echo $url == "home" ? " b " : ""; ?>
                        " href="home">Home</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link
                        <?php echo $url == "posts" ? " b " : ""; ?>
                        " href="posts">Posts</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link
                        <?php echo $url == "info" ? " b " : ""; ?>
                        " href="info">Info</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="abcd">404</a>
                  </li>

                  <li class="nav-item">
                        <a class="nav-link
                        <?php echo $url == "contact" ? " b " : ""; ?>
                        " href="contact">Contact</a>
                  </li>
            </ul>

            <ul class="nav">

                  <li class="nav-item">
                        <span class="nav-link px-0 orange" href="">| </span>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link
                        <?php echo $url == "log_in" ? " b " : ""; ?>
                        " href="login/log_in" title="Zaloguj się">Log In</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link pr-0
                        <?php echo $url == "sign_in" ? " b " : ""; ?>
                        " href="login/sign_in" title="Zarejestruj się">Sign In</a>
                  </li>
            </ul>
      </div>
</nav>
<?php echo "\n"; ?>