<?php
 include 'database.php';
session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include '..\home_header.php';
  }
  else {
      include '..\home_header_dark.php';
  }
  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Maths Quiz </title>
<link rel="stylesheet" href="css/style_quiz.css" type="text/css" />

</head>
<body>

<header>

<div class="container">
  <h1> Maths Quiz</h1>
</div>
</header>
<main>
<div class="container">
<h2> You're Done!</h2>
<p> Congrats! You have completed the test </p>
<p> Final Score:  <?php echo $_SESSION['score']; ?></p>

<?php
$uid =  $_SESSION['userid'];
echo "user id is $uid";
echo "<pre>";
$math_lesson =  $_SESSION['math_lesson'];
echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];
echo "<pre>";
echo "The final score was $score";

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



	$db = mysqli_connect("localhost", "root", "" , "logintest");

$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, sc_time) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$time')";
mysqli_query($db, $sql);



#  $ok = $_SESSION["lesson2"];

//for ($x = 1; $x <= 2; $x++) {
//echo $_SESSION['lesson'.$x]," is the answer you picked";
//echo "<br>";
//}

echo "<br>";
echo "<br>";
for ($x = 1; $x <= 2; $x++) {
echo  "<strong>";
echo $_SESSION['your'.$x], "</strong> is the answer you picked";

echo "<br>";
}

echo "<br>";

for ($x = 1; $x <= 2; $x++) {
echo  "<strong>";
echo $_SESSION['correct'.$x],"</strong> is the correct answer";
echo "<br>";
}


#  echo "$ok";

?>


  <div class="panel-body"><a href="back_to_exercises.php">back to exercises </a></div>

<?php
///$query = "SELECT * from dynamic_settings
///WHERE uid ='{$_SESSION['userid']}' order by RAND()";
//ob_start();
$query = "SELECT * from dynamic_settings
WHERE uid ='{$_SESSION['userid']}' ";
$result = mysqli_query($db, $query);
?>

<h2>  Feedback  </h2>

  <?php    while($row = mysqli_fetch_array($result)) {?>
  <form action="final.php" method="post">
  <input type="checkbox" name="check_list[]" value="<?php echo $row[1]?>" <?php if ($row[1] == 'text_hint_Y') echo "checked='checked'";?> > Text Hints
  <input type="checkbox" name="check_list[]" value="<?php echo $row[2]?>" <?php if ($row[2] == 'timer_Y') echo "checked='checked'";?>> Timer
  <input type="checkbox" name="check_list[]" value="<?php echo $row[3]?>" <?php if ($row[3] == 'add_questions_Y') echo "checked='checked'";?>> More Questions
  <input type="checkbox" name="check_list[]" value="<?php echo $row[4]?>" <?php if ($row[4] == 'add_answers_Y') echo "checked='checked'";?>> More Possible Answer choices
  <input type="submit"  name="feedback_button" />
  </form>
     <?php }  ?>

  <?php
//  if(!empty($_POST['check_list'])) {
  //    foreach($_POST['check_list'] as $check) {
    //          echo $check; //echoes the value set in the HTML form for each checked checkbox.
                           //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                           //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    //  }
  //}
//	if (isset($_POST['feedback_button'])){

    include 'feedback.php';

    //ob_end_flush();
  ?>



</div>
</main>
<footer>
  <div class="container">
   Copyrght & copy whatever
 </div>
  </footer>

</body>
</html>
