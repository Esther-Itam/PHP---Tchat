<?php
include '../connexion.php';

function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR']; 
    }
    return $ip;
}

setcookie('nickname', $_POST['nickname'], time() + 365*24*3600);

if(!empty($_POST["message"]) && !empty($_POST["nickname"])){
    $userStatement = $bdd->prepare("SELECT * FROM users WHERE nickname = ?");
    $userStatement ->execute([$_POST["nickname"]]);

    $user = $userStatement->fetch(PDO::FETCH_ASSOC);


    if($user){
        $userId = $user["id"];
    }
    else{
        $insertUserStatement = $bdd->prepare("INSERT INTO users (nickname, created_at, ip_address) VALUES (?,?,?)");
        $insertUserStatement ->execute([$_POST["nickname"], date('Y-m-d H:i:s'), getIp()]);
        $userId = $bdd->lastInsertId();

        
    }

    $insertMessageStatement = $bdd->prepare("INSERT INTO messages(user_id, message, ip_address, created_at) VALUES(?,?,?,?)");
    $insertMessageStatement->execute([$userId, $_POST["message"], getIp(), date('Y-m-d H:i:s')]);
}







header( 'location: index.php');


?>

