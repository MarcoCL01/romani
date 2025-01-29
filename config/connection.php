<?php

    try
    {
        $pdo = new PDO("mysql:host=localhost;dbname=prova","root","");
    }
    catch(PDOException $e)
    {
        die("Errore di Connessione");
    }

?>