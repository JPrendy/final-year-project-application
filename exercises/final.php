<?php
 include 'database.php';
session_start();



  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Maths Quiz </title>


</head>
<body>

<header>
</header>


<div class="container-fluid text-center">
  <div class="row content">




  <div class="col-sm-9 text-centre">


<h2> Congrats! You have completed the test </h2>
<p> Final Score:  <?php echo $_SESSION['score']; ?></p>

<?php
$uid =  $_SESSION['userid'];
$one = 1;
//echo "user id is $uid";

$math_lesson =  $_SESSION['math_lesson'];
//echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];
$blank  = $_SESSION['blank'];

echo "You scored $score/10 in  $math_lesson";

$difficulty_level = $_SESSION['difficulty_level'];
//echo  "the difficulty_level is $difficulty_level";
date_default_timezone_set('UTC');
//echo "The time is " . date("h:i:sa");
//$time = date("h:i:sa");
//echo "$time";
//echo "Today is " .  date("Y-m-d H:i:s") . "<br>";
$time = date("Y-m-d H:i:s");

//echo "$time";
//echo "<br>";
//if (isset($_POST['submit'])){
echo "<br>";
$math_section_1 =  $_SESSION['math_section_1'];
echo "<br>";
$math_section_2 =   $_SESSION['math_section_2'];
echo "<br>";
$math_section_3 =    $_SESSION['math_section_3'];
echo "<br>";
$math_section_4 =   $_SESSION['math_section_4'];



$start_time = $_SESSION['start_time'];
//}

$time1 = new DateTime($start_time );
//this is the time you started the quiz
$time2 = new DateTime($time);



$interval =  $time1->diff($time2);
//this displays the time as seconds
$ok = $interval->format(" %i ");
$ok2 = $interval->format(" %s ");
$ok3   = ($ok * 60) + $ok2;



	$db = mysqli_connect("localhost", "root", "" , "logintest");

$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, blank, sc_time_start, sc_time, time_completed) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$blank','$start_time' ,'$time', '$ok3')";
$result = mysqli_query($db, $sql);


$sql2 = "insert into math_section(uid, math_lesson,  sc_time, math_section_1, math_section_2, math_section_3, math_section_4 ) VALUES ('$uid', '$math_lesson', '$time', '$math_section_1', '$math_section_2', '$math_section_3', '$math_section_4')";
$result2 = mysqli_query($db, $sql2);










if($one = 1){
 header("Location: finish.php");
  exit();
}






?>


</body>
</html>
