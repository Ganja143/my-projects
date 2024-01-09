<?php
include 'connection.php';
session_start();
$userData=$db->users->findOne(array('_id'=>$_SESSION['user']));


function get_recent_tweets($db){

 // $id=$_GET['id'];
  $result=$db->following->find( array('follower' => $_SESSION['user']));
  $result= iterator_to_array($result);
  $users_following=array();

  foreach($result as $entry){
    $users_following[]=$entry['user'];
  }
$result=$db->tweets->find( array('authorId' => array('$in' =>$users_following)));
$recent_tweets= iterator_to_array($result);
return $recent_tweets;

}

?>
<html>
  <head>
  
</head>
<body>
 

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/font-awesome.min.css">
<title>Home page</title>
</head>
<body>
<?php   include('header.php');   ?>

<form action="create_tweet.php" method="post">
  <div class="form-group">
    <label for="tweet" class="col-sm-2 control-label">What's happening? </label>
    <div class="col-sm-10">
      <textarea name="txt_body" id="textarea" class="form-control" rows="4" cols="50"   required="required"></textarea>
    </div>
  </div>
  <input type="submit" value="Tweet" name="submit" class="btn btn-primary" />
</form>

<div>
    <p><b>Tweets from people you're following</b></p>
    <?php

      $recent_tweets=get_recent_tweets($db);

      foreach($recent_tweets as $tweet)
      {
        
        echo '<p><a href="profile.php?id='.$tweet['authorId'].'">'.$tweet['authorName'].'</a></p>';
        echo '<p>'. $tweet['body'].'</p>';
        echo '<p>'.$tweet['Created'].'</p>';
        echo '<hr>';

      }
    ?>

  </div>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>











   

