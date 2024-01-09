<?php  
session_start();
include 'connection.php';
;
$showTweets=$db->tweets->find();

if(!isset($_POST['txt_body']))
{
    exit;
}




$user_id=$_SESSION['user'];
$userData=$db->users->findOne(array('_id' =>$user_id));
echo $userData['Name'];
$body=isset($_POST['txt_body'])? $_POST['txt_body']: "";
$date=date('Y-m-d H:i:s');

// another way of inserting data to a table
//Here we insert to the tweeter table already declared at connection.php using tbl_tweets
//method insertion 1.
 $res=$db->tweets->insertOne(array(
  'authorId'=> $user_id,
  'authorName'=> $userData['Name'],
  'body'=> $body,
   'Created'=> $date
 ));
//method insertion2.

// $tweetsData=array();
// $tweetsData['authorId']=$user_id;
// $tweetsData['authorName']=$userData['Name'];
// $tweetsData['Body']=$body;
// $tweetsData['Created']=$date;

// $res=$db->tweets->insertOne($tweetsData);
// $tweetsData=array();
// $_POST=array();


foreach($showTweets as $data){
    echo $data['authorId'];
    echo $data['authorName'];
    echo $data['body'];
    echo $data['Created'];
}






?>