<?php
$con=mysql_connect("localhost:3306","root","mysql");
mysql_select_db('facemash',$con);
mysql_query("update users set votes=votes+1 where id=$_GET[passkey]");
header('Location:match.php' );

?>
