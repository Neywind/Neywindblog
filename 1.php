<?php
$con=mysqli_connect('119.23.209.144','root','jh950925');
mysqli_select_db($con,"coms");
if(mysqli_query($con,"create table commits(
username VARCHAR (15) NOT NULL,
email VARCHAR (20),
subject VARCHAR (20),
message TEXT,
PRIMARY KEY (username)
)")){
    echo "列表创建成功!";
}