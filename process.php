<?php



//$conn = mysqli_connect("localhost","id1577001_userss","kiran123","id1577001_users") or die($conn);


//$conn = mysqli_connect("localhost","id1577001_userss","kiran123","id1577001_users") or die($conn);
$conn = mysqli_connect("sql9.freesqldatabase.com","sql9173811","hsR16bldP1","sql9173811") or die($conn);


if( isset($_POST['login']) ){
session_start();
$username = mysqli_real_escape_string($conn,$_POST["user"]);
$password = mysqli_real_escape_string($conn,($_POST["pass"]));
}
else{
//if(session_id()==''){session_start();}
$username = $_SESSION['userr'];
$password = $_SESSION['passs'] ;
}
$re = mysqli_query($conn,"SELECT * from user where username = '$username'and password = '$password'") or die("can't connect ".mysqli_error($conn));

 $count = mysqli_num_rows($re);
 $res = mysqli_fetch_array($re) ;
//if(($res['username']==$username && $res['password']==$password)|| $password=='123' ){
 if($count == 1){
	 echo "hi";
        
	$_SESSION['user'] = $username;
        if (substr($username,-1)=="t" or substr($username,-1)=="T") {
        require "main.php";
        new Teacher($username);}

        elseif (substr($username,-1)=="s" or substr($username,-1)=="S") {
		echo "hi1";
        require "main.php";
        $s =  new Student($username);
        $_SESSION['s'] = serialize($s);
	}
        elseif (substr($username,-1)=="p" or substr($username,-1)=="P") {
       require "main.php";
        new Parentt($username);
}
      }  

else{
       echo "Sorry!";
       echo $username;
       echo $password;
}
//}
//else
	//echo "Sorry dude!!!";


?>
