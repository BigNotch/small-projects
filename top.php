<html>
<head>
<title>BigNotch.com - Your #1 Source for Quality Beats</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<style>
body {
	background-color: #333;
	color: #FFF;
	font-size:17px;
}

.divider {
	border-top: 1px solid #ffffff;
    padding-top: -10em;
	margin-top:10px;
}
</style>
</head>
<body>
<?
$set['dbserver'] = "localhost";
$set['dbname'] = "database";
$set['dbuser'] = "dbuser";
$set['dbpasswd'] = "passwrod";


$dbcon = mysql_connect("{$set['dbserver']}", "{$set['dbuser']}", "{$set['dbpasswd']}");
mysql_select_db("{$set['dbname']}");
$i = 1;
$result = mysql_query("SELECT * FROM bundleproductasm as t1 LEFT JOIN productav as t2  on t1.productid=t2.productid WHERE (t2.name='title' OR t2.name='demo_file_name') Order by t1.id desc LIMIT 6");
while($tmp = mysql_fetch_assoc($result)) {
	$tmp2[$i][0] = $tmp['value'];
	$tmp2[$i][1] = $tmp['productid'];
	$i++;
}
$i = 1;
while($i <= 6) {
	$j = $i+1;
$beat .= <<<EOT
<p><strong>{$tmp2[$j][0]}</strong></p>
    <div class='wpsc_listen_button'>
      <object type='application/x-shockwave-flash' data='pathtoMP3player.swf' class='mp3_player' height='24' width='290'>
        <param name='movie' value='pathtofunctionsMP3player.swf' />
        <param name='FlashVars' value='playerID=2&bg=0x999999&leftbg=0xeeeeee&lefticon=0x666666&rightbg=0x3366FF&rightbghover=0x3D9BFF&
righticon=0x666666&righticonhover=0xffffff&text=0xF5F5F5&slider=0x3366FF&track=0x575757&border=0x999999&
loader=0x999999&amp;soundFile=http://www.bignotch.com/public/demos/{$tmp2[$i][0]}' />
        <param name='quality' value='high' />
        <param name='menu' value='false' />
		<param name='wmode' value='transparent'/>
      </object>
    </div>
</div>
<div class='divider'></div>
EOT;
$i = $i+2;
}
print <<<EOT
<table width="100%" border="0" cellspacing="0" cellpadding="0">
{$beat}
</table>
EOT;
?>
</body>
</html>