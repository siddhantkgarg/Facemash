<?php
$con=mysql_connect("localhost:3306","root","mysql");
mysql_select_db('facemash',$con);
$x=mysql_query("select id from users order by id limit 1");
$y=mysql_query("select id from users order by id desc limit 1");
$a1=mysql_fetch_array($x);
$a2=mysql_fetch_array($y);
//echo $a1['id'];
//echo $a2['id'];
$r1=mt_rand($a1['id'],$a2['id']-1);
$r2=mt_rand($a1['id'],$a2['id']-1);
//echo "</br>$r1</br>$r2";
//$r1=27;
//$r2=28;
if($r1==$r2)
$r2=$r2+1;
//echo $r2;
//echo $r1;
//echo $r2;
$q1=mysql_query("select * from users where id=$r1");
$q2=mysql_query("select * from users where id=$r2");
$row1=mysql_fetch_array($q1);
$t1="uploaded/".$row1['pic'];

//echo "$t1<br/>";
$row2=mysql_fetch_array($q2);
$t2="uploaded/".$row2['pic'];
//echo "$t2<br/>";
mysql_query("update users set selected=selected+1 where id=$r1 or id=$r2");
//echo $t1;
//echo $t2;
//echo $row1['name'].' <img src="'.$t1.'"/>';
//echo $row2['name'].' <img src="'.$t2.'"/>';
//echo '<a href="logic.php?passkey='.$r1.'">left</a>';
//echo '<a href="logic.php?passkey='.$r2.'">right</a>';



?>
<html>
<head>
<link href="facestyle.css" media="screen" rel="stylesheet" type="text/css">
</style>
</head>
<body>
<h1 style="left:200px;"> WHOz HOTTer??? </h1>
<!--<p id=t1><?php //echo "$row1[name]".'</br>'.$rating1;?></p>
<p id=t2><?php //echo "$row2[name]"."<br/>".$rating2;?></p>-->

<?php
if($row1['selected']!=0)
$rating1=$row1['votes']/($row1['selected']) * 100;
else
$rating2=0;
if($row2['selected']!=0)
$rating2=$row2['votes']/($row2['selected'] ) * 100;
else
$rating2=0;
//echo $rating1;
//echo $rating2;>
echo '<im1><a href="logic.php?passkey='.$r1.'"><img src="'.$t1.'" name="'.$row1['name'].'" title="'.$row1['name'].'" style="width:250px; height:300px;"/></im1></a>';
echo '<im2><a href="logic.php?passkey='.$r2.'"><img src="'.$t2.'" name="'.$row2['name'].'" title="'.$row2['name'].'"style="width:250px; height:300px;"/></im2>';
//echo '<a href="logic.php?passkey='.$r1.'">left</a><br>';
//echo '<a href="logic.php?passkey='.$r2.'">right</a><br>';
?>
<p id=t1><?php echo "$row1[name]".'</br>'.$rating1;?></p>
<p id=t2><?php echo "$row2[name]"."<br/>".$rating2;?></p>
<footer>
<a href="index.php">Upload a photo for rating</a>
</footer>



</body>
</html>
