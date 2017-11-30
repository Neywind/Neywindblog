<meta charset="UTF-8">
<?php
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
if($name==null){
    echo "Name cannot be empty!<br/>";
    echo "<a href='gbook.html'>点此返回</a><br/>";
    return;
}
$con=mysqli_connect('119.23.209.144','root','jh950925');
if(!$con){
    die('Fail to connect the database');
}
if(mysqli_query($con,"create database coms")){
    mysqli_select_db($con,"coms");
    mysqli_query($con,"create table commits(
username VARCHAR (15) NOT NULL,
email VARCHAR (20),
subject VARCHAR (20),
message TEXT,
PRIMARY KEY (username)
)");
   mysqli_select_db($con,"coms");
   $x=mysqli_query($con,"select * from commits where username='".$name."'");
   if(!$x){
       echo "Name has exsited!<br/>";
       echo "<a href='gbook.html'>点此返回</a><br/>";
   }
   else{
       mysqli_select_db($con,'coms');
       mysqli_query($con,"insert into commits(username,email,subject,message)values('$name','$email','$subject','$message')");
       echo "thans for watching!<br/>";
       echo "<a href='gbook.html'>点此返回</a>";
   }
}
else{
    mysqli_select_db($con,'coms');
    mysqli_query($con,"insert into commits(username,email,subject,message)
values('$name','$email','$subject','$message')");
    echo "thans for watching!<br/>";
    echo "<a href='gbook.html'>点此返回</a><br/>";

}

mysqli_close($con);