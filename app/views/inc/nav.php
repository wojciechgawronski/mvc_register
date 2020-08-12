<?php

$url = $_GET['url'] ?? 'home';
$url = explode('/', $url);
// _print($url);
// last part of URL
$url = $url[1] ?? $url[0];
// if (is_array($url)) {
//       $url = $url[1];
// }
// echo $a;
// _print($params);
// _print($class);
// _print($_POST);
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

                  <?php 
                  if(isset($_SESSION['user_id'])){
                        echo "<li class='nav-item '>
                              <span class='nav-link gray i'>
                              {$_SESSION['user_email']}
                              </span>
                        </li>";
                        echo "<li class='nav-item'>
                                    <a class='nav-link b text-warning' href='login/logout'>Log Out</a>
                              </li>";
                  }
                  else{
                        echo "
                        <li class='nav-item'>
                              <a class='nav-link";
                              echo $url == 'log_in' ? ' b ' : '';
                              echo $url == 'login' ? ' b ' : '';
                              echo "' href='login/log_in' title='Zaloguj się'>Log In</a>
                        </li>
                        <li class='nav-item'>
                              <a class='nav-link pr-0";
                              echo $url == 'signup' ? ' b ' : '';
                              echo $url == 'signupUser' ? ' b ' : ''; 
                              echo "' href='login/signup' title='Zarejestruj się'>Sign Up</a>
                        </li>";
                  }
                  ?>

            </ul>
      </div>
</nav>
<?php echo "\n"; ?>