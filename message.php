<?php

// Connecting to Database
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Failed to connect to Database");
$getmsg = mysqli_real_escape_string($conn, $_POST['text']);
$checkData = "SELECT replies from chat WHERE queries LIKE '%$getmsg%'";
$runQuery = mysqli_query($conn, $checkData) or die("Error in gettind the return message");

if(mysqli_num_rows($runQuery) > 0){
    $fetch_Data = mysqli_fetch_assoc($runQuery);
    $replay = $fetch_Data['replies'];
    echo $replay;
}else{
    echo "Sorry, I am unable to understand your question";
}

?>