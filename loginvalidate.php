<?php
$email=$_POST["t1"];
$pass=$_POST["p1"];
$con = mysqli_connect("localhost","root","","student_login");
$result = mysqli_query($con,"SELECT LOGIN_ID,USERNAME,PASSWORD FROM student_login");
while($row=mysqli_fetch_array($result))
{
if($row["LOGIN_ID"]==$email && $row["PASSWORD"]==$pass)
{
$cookie_name=$email;
$cookie_value=$row["USERNAME"];
setcookie("usrid", $cookie_name, time() + (86400 * 30),'/');
setcookie("usrna", $cookie_value, time() + (86400 * 30),'/');
$fp=fopen("onllist.txt","a");
fwrite($fp,(string)$email);
fwrite($fp," ");
fwrite($fp,$row["USERNAME"]);
fwrite($fp,PHP_EOL);
fclose($fp);
if($email=="16ADMIN01")
header("Location:TEMP1\indexad.php");
else
header("Location:TEMP1\index.php");
}
}
echo "UserName/Password Combination Is Incorrect";
?>
