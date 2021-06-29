<?php
require("flag.php");

function Random1($a,$b)
{
  return rand($a, $b);
}
function Random2($a,$b)
{
    if ($a>$b){
        return mt_rand($b,$a);
    }
    else{
        return mt_rand($a,$b);
    }
   
}
function getFlag($a,$b)
{
    global $flag;
    return(ord($flag[$a]));
}

#function checkNum($num){
# 	 if ($num===$secretnumber) return 1 ;
#         echo 'Your number: '.$num.' -> Wrong number';
#        if (ob_get_length()>4094)
#                return 1;
#         else return 0;
#}


$a= range(10, 99);
$ran_arr1=array_rand($a,10);
$ran_arr2=array_rand($a,10);

if (isset($_GET['function'])&&!empty($_GET['function'])){
    $result=array_map($_GET['function'],$ran_arr1,$ran_arr2);
}
else{
    $result=array_map('Random2',$ran_arr1,$ran_arr2);
}



?>

<html lang="vi">
   <head>
      <title>Vietlott | anht0iCTF 2021</title>
      <link rel="stylesheet" href="bootstrap.min.css">
      <link rel="stylesheet" href="EX.css">
      <link rel="shortcut icon" href="https://vietlott.vn/images/home/favicon.ico">
   </head>
   <body>
      <div class="page home theme1">
      <div class="chitietketqua mega645">
      <div class="container">
      <div class="row">
         <div class="zone col-sm-6" id="divLeftContent">
            <div class="porlet border">
               <div class="header">
                  <div class="header-title text-center border-bottom padding_top_30 padding_bottom_20">
                     <div class="chitietketqua_title">
                        <img src="keno.png" alt=""> 
                        <h4>Mega KENO Draw result</h4>
                        <h5>Draw ID <b>#00752</b> Date <b><?php echo getdate()['mday'].'/'.getdate()['mon'].'/'.getdate()['year']; ?></b></h5>
                        <h5>Get <a href="flag.php">Flag</a></h5>
                     </div>
                  </div>
               </div>
               <div class="content">
                  <div class="day_so_ket_qua border-bottom">
                     <div class="day_so_ket_qua_v2">
                        <?php
                            for ($i=0;$i<10;$i++){
                                if ($result[$i]<10)
                                    echo '<span class="bong_tron">0'.$result[$i].'</span>';
                                else
                                    echo '<span class="bong_tron">'.$result[$i].'</span>';
                            }

                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
      <div class="zone col-sm-12">
      <hr>
      <div class="porlet">
      <div class="content">
        <!-- DEBUG: ?source -->
      <div class="chitietketqua_note">
   </body>
</html>

<?php
if(isset($_GET['num']) && strlen($_GET['num']) < 50) {
    $re=implode("",$result);
    if (checkNum($_GET['num'])){
        echo $flag;
        header("Location: flag.php");
    }
    else{
        header("Location: index.php");
        if (checkNum($_GET['num'])){
            echo $flag;
        }
    }
}
if (isset($_GET['source'])){
    highlight_file(__FILE__);
}

