<?php

require 'vendor/autoload.php';

$client=new MongoDB\Client("mongodb://localhost:27017/");
$db=$client->twitter;

//Database db creates the tables users,followers and tweets
//We store the tables in the values tbl_users,tbl_followers and tbl_tweets
//$tbl_users=$db->users;
//$tbl_tweets=$db->dropCollection('tweets');// deleting a table or collection
//$tbl_followers=$db->followers;

?>