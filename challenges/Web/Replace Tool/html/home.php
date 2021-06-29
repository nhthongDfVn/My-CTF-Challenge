<?php 
error_reporting(0);
ini_set('display_errors', 0);

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
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
    <h3>Regex Replace Online Tool <?php echo '(Pack '.$_SESSION['mode'].')'; if ($_SESSION['mode']===1) echo  '<a href="upgrade.php" title=" - Special tag" >Upgrade to Pack 2</a> <span class="badge badge-primary">Limited</span>'; ?> </h3>
    <form method="POST" action="home.php">
     <h5>Regular Expression</h5>
     <input class="form-control mr-sm-2" type="text" name="regexEx" placeholder="Regular Expression" aria-label="Regular Expression"> <br>
      <h5>Flags</h5>
     <select  class="form-control mr-sm-2" name="flags">
        <option value="/i">/i/</option>
        <option value="/g">/g/</option>
        <option value="/m">/m/</option>
        <?php if ($_SESSION['mode']===2) echo '<option value="/e">/e/</option>' ?>;
     </select>

      <br>
     <h5>Replace by</h5>
     <input class="form-control mr-sm-2" type="text" name="regexPl" placeholder="Replace by" aria-label="Regular Expression"> <br>
      <h5>Your message</h5>
     <input class="form-control mr-sm-2" type="text" name="message" placeholder="Your message" aria-label="Regular Expression"> <br>
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
     <?php 
      if (isset($_POST['regexEx'])&&!empty($_POST['regexEx'])&&isset($_POST['flags'])&&!empty($_POST['flags'])&&isset($_POST['regexPl'])&&!empty($_POST['regexPl'])&&isset($_POST['message'])&&!empty($_POST['message'])){

        $regexEx= $_POST['regexEx'];
        $regexPl=$_POST['regexPl'];
        $flag=$_POST['flags'];
        $message=$_POST['message'];
        $flags = array("/i", "/g", "/m");
        if ($_SESSION['mode']===2){
          array_push($flags,'/e');
        }

        if (strpos($regexEx,'/')||strpos($regexPl,'/')||strpos($message,'/')){
          echo 'Fail';
        }
        else if (!in_array($flag,$flags)) {
            echo 'Flag are not allow';
        }
        else{
            $regex1='/'.$regexEx.$flag;
            $regex2=$regexPl;
            echo '<h4>Result</h4>';
            echo preg_replace_callback($regex1,$regex2,$message);
        }
      }

     ?>

  </div>
</main>
</html>
