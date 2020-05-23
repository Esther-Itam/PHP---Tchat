<?php
include '../connexion.php';

$allMessagesStatement = $bdd->query('SELECT messages.*, users.nickname FROM messages INNER JOIN users WHERE users.id = messages.user_id');
$allMessages = $allMessagesStatement->fetchAll(PDO::FETCH_ASSOC);

?>




<?php   
                    foreach($allMessages as $message){?>
                    <p class="msg">
                    <span class="p1">Pseudo: </span><?= $message["nickname"].'<br>';?>
                    <span class="p2">Message: </span><?= $message["message"].'<br>';?>
                    <span class="p3">date <?=$message["created_at"].'<br>'.'<br>';?></span>

                        <?php } ?></p>

