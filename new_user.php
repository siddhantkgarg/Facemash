<?php

$con=mysql_connect("localhost:3306","root","mysql") or die("Unable to connect to Server Database!");
mysql_select_db('facemash',$con) or die('no database');
//echo $x;
//echo "$_POST[name],$_POST[email],$_POST[mobile],SHA($_POST[password])" .$_FILES["pic"]["name"];
//echo $_POST['name'];
$dp=$_FILES["pic"]["name"];
//echo "1".$dp;
$tmp=$_FILES["pic"]["tmp_name"];
//echo $tmp;
///$error=$_FILES["pic"]["error"];
//echo $error;
$target="uploaded/".$dp;
$name=$_POST['name'];
//$name=str_replace(' ','_',$name);
//$password=trim($_POST['password']);
$sql_reg="insert into users (pic) values ('$dp')" or die('regis');
//$sql_table="create table USER_".$name."(msg_no int(3) primary key not null auto_increment,msg varchar(100))";
//mysql_query($sql_table,$con) or die(mysql_error());
if(!mysql_query($sql_reg,$con))
{
$message="Error Creating Profile" .mysql_error();
}
else
{
$message="Congratulations!Profile Successfully Created!";
}
echo $message;
echo "$tmp";
$move=move_uploaded_file( $_FILES['pic']['tmp_name'],$target);
//if($move) echo "moved";
//else echo "error";//$_FILES["pic"]["error"];
//echo "$tmp";
?>
<html>
<head>
<title><?//php echo "Welcome $_POST[name]" ?></title>
<style>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css"/>
</style>
</head>
<body class="banner">
<header>
<h1>
<p> Profile Successfully Created.<a href="index.php">Click Here to login</a> </p>
</h1>
<header>
</body>
</html>

