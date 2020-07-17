<?php
$flag1="miniCTF{";
$flag2="PHP_1S_V3Ry";
$flag3="_uS3FUL";
$flag4="_r19Ht?}";
show_source("source.php");


$a=@$_GET['a'];
$b=@$_GET['b'];
$c=@$_GET['c'];
$d=@$_GET['d'];
if($a==0 and $a){
    echo $flag1;
}
if(is_numeric($b)){
    exit();
}
if($b>1234){
     echo $flag2;
}
if ($c==TRUE)
{
     echo $flag3;
}
if (preg_match("/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/",$d))
{
     echo $flag4;
}
?>