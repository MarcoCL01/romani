<!DOCTYPE html>
<html>
    
    <head>

        <title> PAGINA DI ACCESSO </title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>
    
    <body class="backgroundprin">
    <img class="imgpr" src="img\romani3.png" width="500" height="850">
    <img class="imgsec" src="img\romani4.jpg" width="500" height="850">
    <h1 class="tit">PAGINA DI ACCESSO</h1>
    

    <br><br>
        <form id="index" method="POST" >

            <p><input class="compilazione" type='text' name='username' required maxlength="255"></p>
            <p><input class="compilazione" type="password" name='pwd' required maxlength="50"></p>
            <p><input class="compilazionepul" type='submit' name='login' value='Login'></p>
            
        </form>
        <form action="register.php" method="POST">
            <input class="compilazionepul" type='submit' name='register' value='Registrazione'>
        </form>
        <div id="esito"></div>
    </body>

</html>
<?php

    if(isset($_POST["login"]))
    {
        include 'config/connection.php';

        if(isset($_POST["username"])&&isset($_POST["pwd"]))
        {
            $password = sha1($_POST["pwd"]);
            $stmt = $pdo->prepare("SELECT username FROM utenti");
            $stmt->bindParam(':password', $password);

            $username = addslashes($_POST["username"]);
            $stmt = $pdo->prepare("SELECT username FROM utenti WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) 
            {
                echo "Hai effettuato il login ! " . "<br>";
                echo "Username : " . $username . "<br>";
                echo "Password : " . $password;
                echo "<script>window.location.href = 'action.php';</script>";
            }
            else 
            {
                ?>

                <script>

                    var esito=document.getElementById("esito");
                    esito.style.color="orange";
                    alert("Utente non registrato! Premere il pulsante registrazione per accedere");
                    
                </script>

                <?php
            }
        }
        else
        {
            echo "FORBIDDEN";
        }
    }

?>
<script src="assets/js/script.js"></script>