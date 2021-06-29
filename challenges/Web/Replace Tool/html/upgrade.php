<?php 
 require("secret.php");
  session_start();
  if (!$_SESSION['username']){
      header("Location: login.php");
      header("Connection: close");
      exit;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="nhthongDfVn">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Replace Tool | ANHTOICTF 2021</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

            .coupon {
        border: 5px dotted #bbb;
        width: 80%;
        border-radius: 15px;
        margin: 0 auto;
        max-width: 600px;
      }

      .container {
        padding: 2px 16px;
        background-color: #f1f1f1;
      }

      .promo {
        background: #ccc;
        padding: 3px;
      }

      .expire {
        color: red;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="#">ANHTOICTF2021</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>

     
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main" class="container">
  <div class="jumbotron">
    <h3>Upgrade to Pack2</h3>
      <div class="coupon">
        <div class="container">
          <p>Use Promo Code: <span class="promo">ANHTOICTF</span></p>
          <p class="expire">Expires: Jan 03, 2025</p>
        </div>
      </div>



    <form method="POST" action="upgrade.php">
     <h5>Enter Code</h5>
     <input class="form-control mr-sm-2" type="text" name="code" placeholder="Enter your code"> <br>
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upgrade</button>
      </form>
     <?php 

      function WAF($code){
        if (preg_match("/[\` \& \| \; \% \'\$ \/\\ ]/i",$code))
          return 1;
        else 
          return 0;
      }


     $code_array=['ANHTOICTF','ANHTOICTF{CAR3FU11Y_UUH3N_USING_R3GE><}phansaudephuhoathoinhe'];
      if (isset($_POST['code'])&&!empty($_POST['code'])){
          $code=$_POST['code'];
          if (!WAF($code)){
                $out=shell_exec("ulimit -t 5 &&nodejs checkPass.js '".$code."'");
                #var_dump($out);
                if (strcmp("1 ",$out)&&in_array($code,$code_array)){
                    if ($code==='ANHTOICTF'){
                      echo '
                          1/2 code. Try hard to find the rest of code. 
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar"
        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:50%">50%
                              </div>
                          </div>';
                    }
                    else{
                        $_SESSION['mode']=2;
                   echo "<div class='alert alert-success' role='alert'>
                                  <strong>Success</strong></div>";
                    }
                }
                else{
                  echo "<div class='alert alert-danger' role='alert'>
                                  <strong>Your code is incorrect</strong></div>";
                }

          }
          else{
                echo "<div class='alert alert-danger' role='alert'>
                                  <strong>Bad, wrong char. Hint: We using something like preg_match to check your code</strong></div>";
          }
      }

     ?>

  </div>
</main>
</html>
