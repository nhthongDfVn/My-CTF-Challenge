<!DOCTYPE html>
<html>
<head>
	<title>Challenge by K0m4ng</title>
</head>
<body>
<form action="#" method="POST" >
<center>
	<h2>MD5 Checksum for everyone</h2>
	<br>
	<input type="text" name="input" >
	<br>
	<input type="submit" name="submit" value="submit">
</center>
</form>
</body>
<!--
function detect_h4x0r($ip,$start,$end)
{
	$allow_character = 'lscatfg ';
	for ( $i = $start ; $i < $end ; $i++ )
	{
		if ( strpos($allow_character,$ip[$i]) > -1 )
		{
			continue;
		}
		else
		{
			die("<center>H4x0r huh? Go away!</center>");
		}
	}
	for ( $i = $end + 1 ; $i < strlen($ip) ; $i++ )
	{
		if ( strpos($allow_character, $ip[$i]) > -1)
		{
			continue;
		}
		else
		{
			die("<center>H4x0r huh? Go away!</center>");
		}
	}
	return 1;
}


function check($ip)
{
	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";
	$start = 0;
	$end = 0;
    
	for ( $i = 0 ; $i < strlen($ip); $i++)
	{
		if (strpos($charset,$ip[$i]) > -1 )
		{
			continue;
		}
		else
		{
			$start = $i;
			break;
		}
	}
	for($i = $start + 1 ; $i < strlen($ip) ; $i++ )
	{
		if ( strpos($charset,$ip[$i]) > -1 )
		{
			continue;
		}
		else
		{
			$end = $i;
			break;
		}
	}
	if ($start == 0)
	{
		if ($end == 0)
		{
			return 1;
		}
	}
	else
	{
		if ( $end == 0)
		{
			return 1;
		}
		else
		{
			if ( detect_h4x0r($ip,$start+1,$end) == 1)
			{
				return 1;
			}
		}
	}
}

if ( isset($_POST['submit']))
{
	$ip = $_POST['input'];
	if(strpos($ip,'&&') > -1 )
	{
		die("<center>Hacker go away!</center>");
	}
	else
	{
		if ( substr_count($ip, "|" ) > 1 || substr_count($ip,";") > 1)
		{
			die("<center>Hacker go away!</center>");
		}
		else
		{
			if ( check($ip) == 1 )
			{
				$res = shell_exec("echo ".$ip." | md5sum");
				echo "<center>$res</center>";
			}
			else
			{
				echo "<center>Hacker detected :(</center>";
			}
		
		}
	}
}
?>
-->
<?php

function detect_h4x0r($ip,$start,$end)
{
	$allow_character = 'lscatfg ';
	for ( $i = $start ; $i < $end ; $i++ )
	{
		if ( strpos($allow_character,$ip[$i]) > -1 )
		{
			continue;
		}
		else
		{
			die("<center>H4x0r huh? Go away!</center>");
		}
	}
	for ( $i = $end + 1 ; $i < strlen($ip) ; $i++ )
	{
		if ( strpos($allow_character, $ip[$i]) > -1)
		{
			continue;
		}
		else
		{
			die("<center>H4x0r huh? Go away!</center>");
		}
	}
	return 1;
}


function check($ip)
{
	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";
	$start = 0;
	$end = 0;
    
	for ( $i = 0 ; $i < strlen($ip); $i++)
	{
		if (strpos($charset,$ip[$i]) > -1 )
		{
			continue;
		}
		else
		{
			$start = $i;
			break;
		}
	}
	for($i = $start + 1 ; $i < strlen($ip) ; $i++ )
	{
		if ( strpos($charset,$ip[$i]) > -1 )
		{
			continue;
		}
		else
		{
			$end = $i;
			break;
		}
	}
	if ($start == 0)
	{
		if ($end == 0)
		{
			return 1;
		}
	}
	else
	{
		if ( $end == 0)
		{
			return 1;
		}
		else
		{
			if ( detect_h4x0r($ip,$start+1,$end) == 1)
			{
				return 1;
			}
		}
	}
}

if ( isset($_POST['submit']))
{
	$ip = $_POST['input'];
	if(strpos($ip,'&&') > -1 )
	{
		die("<center>Hacker go away!</center>");
	}
	else
	{
		if ( substr_count($ip, "|" ) > 1 || substr_count($ip,";") > 1)
		{
			die("<center>Hacker go away!</center>");
		}
		else
		{
			if ( check($ip) == 1 )
			{
				$res = shell_exec("echo ".$ip." | md5sum");
				echo "<center>$res</center>";
			}
			else
			{
				echo "<center>Hacker detected :(</center>";
			}
		
		}
	}
}
?>
</html>