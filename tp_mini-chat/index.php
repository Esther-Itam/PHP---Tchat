<?php
include './PDO/connexion.php';
use \Colors\RandomColor;

$allMessagesStatement = $bdd->query('SELECT messages.*, users.nickname FROM messages INNER JOIN users WHERE users.id = messages.user_id');
$allMessages = $allMessagesStatement->fetchAll(PDO::FETCH_ASSOC);

$allUsersStatement = $bdd->query('SELECT * FROM users WHERE id');
$allUsers = $allUsersStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="./css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Modak&display=swap" rel="stylesheet"> 
</head>
<body>



<header class="container-fluid" >
    <div class="row">

        <div class="col-12">
            <nav id="navhome" class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(0, 0, 0, 0);">
                <img src="./images/cat4.png" alt="...">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
                <h1>MINI CHAT</h1>
        </div>
        </div>
            </nav>               
</div>       
</div>
</header>

<div id="home" class="container-fluid">
    <div class="row">

        <div class="msgarea">
            <h1 class="display-4">Liste des messages</h1>
             <div class="chat">

                   
             <p class="msg">  <?php   
                    foreach($allMessages as $message){?>
                    
                    <span class="p1">Pseudo: </span><?= $message["nickname"].'<br>';?>
                    <span class="p2">Message: </span><?= $message["message"].'<br>';?>
                    <span class="p3">date <?=$message["created_at"].'<br>'.'<br>';?></span>

                        <?php } ?></p>


                    </div>

                      
        </div>

        <div class="usersarea">

            <h1 class="display-4">Users</h1>
                <p>
                    <?php
                    foreach($allUsers as $user){
                        echo($user["nickname"]).'<br>';
                    }?>


                </p>

        </div>

    </div>
</div>

<footer class="container-fluid">
<div class="row" >

<div class="col-2"> 

<form action="registration_form_correc.php" method="post">
<input type="text" placeholder="pseudo" name="nickname" value="<?= $_COOKIE['nickname']??"" ?>" required>
<textarea name="message"  rows="2" cols="220"  required> </textarea>

<button type="submit"> Envoyer </button>
</form> 

</div>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>  

<script>
    function refreshMessages() {
        $.get('get_messages.php', function(messagesHTML){
                document.querySelector('.chat').innerHTML = messagesHTML;
                setTimeout(refreshMessages, 3000);
                console.log("ok");
        })
    };

    $(function(){
        refreshMessages()
    });
    </script>

</body>
</html>