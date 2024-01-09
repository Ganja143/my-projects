<?php

session_start();
require_once('connection.php');

if(!isset($_SESSION['user'])){
    header("Location:login.php");
}
$userData=$db->users->findOne(array('_id'=>$_SESSION['user']));// fetching current user's data by their id

//Fetching all users within the system using a function

function get_user_list($db){
    $result=$db->users->find();
    $users=iterator_to_array($result);// storing the fetched data into an array
    return $users;
}
?>

    <div class="check">
        <p><b>List of users</b></p>
         <?php
            
            $userList=get_user_list($db);// calling the method that contains the values of all the users
            foreach($userList as $user){// storing every user to a certain value from the array to access them

                // displaying the users using their values within the collection document via the array value call
                echo'<span>'.$user['Name'].'</span>  ';
                echo' [<a href="profile.php?id=' .$user['_id']. '">Visit Profile</a>] ';
                echo'[<a href="follow.php?id='.$user['_id']. '">Follow</a>] <br> ';
            }

         ?>
    </div>


