<?php

   session_start();

$db = mysqli_connect("localhost", "root","", "logintest");


if (!$db) {
	die("Connection failed: ". mysqli_connect_error());

}




  $sql = "SELECT SUM(score) as TEST, COUNT(math_lesson) as MATH FROM quiz_scores WHERE uid='{$_SESSION['userid']}'";
	$result = mysqli_query($db, $sql);



  		if (!$row = mysqli_fetch_assoc($result)){

  		  echo "Your username or password is incorrect!";
            header("Location: ../index.php?error=real test");


  		}


  $sum = $row['TEST'];
  $count = $row['MATH'];

  echo "the user has scored in total $sum";
  echo "<br>";
    echo "<br>";
  //so this will bring the current users complete score
  //NEXT WE HAVE TO GET THE NUMBER OF QUIZES

  echo "in over $count tests";

  $average = $sum/$count;

  echo "<br>";
    echo "<br>";
  echo "The user's average score is $average" ;
  //this retrieves the users average score with this knowledge, the difficulty_levels will either go down or up
  //depending on this average.

//will need to get the current dynamic_level in order to uodate it

  $sql_user = "SELECT * FROM users WHERE uid='{$_SESSION['userid']}'";
	$result_users = mysqli_query($db, $sql_user);



  		if (!$row = mysqli_fetch_assoc($result_users)){

  		  echo "Your username or password is incorrect!";
            header("Location: ../index.php?error=real test");


  		}

  $dynamic_level = $row['difficulty_level'];

echo "<br>";
echo "<br>";
echo $dynamic_level;



if($average >= 0.7){
  $dynamic_level +=1;
  //  $sql = "Update  WHERE uid='{$_SESSION['userid']}'";
    $update_sql_user = "UPDATE  users  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
    	$result_update_users = mysqli_query($db, $update_sql_user);
}
if ($average >= 0.5 && $average <= 0.7){
  echo "Nothing changes";
}
if($average <= 0.4){
  $dynamic_level -=1;
    $update_sql_user = "UPDATE  users  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
        	$result_update_users = mysqli_query($db, $update_sql_user);
    //$sql = "SELECT SUM(score) as TEST, COUNT(math_lesson) as MATH FROM quiz_scores WHERE uid='{$_SESSION['userid']}'";
}

?>
