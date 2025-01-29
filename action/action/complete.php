<?php

        include 'config/connection.php';

        if(isset($_POST["tagname"])&&isset($_POST["passw"])&&isset($_POST["provincia"])&&isset($_POST["cognome"])&&isset($_POST["nome"])&&isset($_POST["passw"])
        &&isset($_POST["comune"])&&isset($_POST["data"])&&isset($_POST["email"]))
        {
            $username = addslashes($_POST["tagname"]);
            $password = sha1($_POST["passw"]);
            $provincia = ($_POST["provincia"]);
            $cognome = ($_POST["cognome"]);
            $nome = ($_POST["nome"]);
            $comune = ($_POST["comune"]);
            $data = ($_POST["data"]);
            $email = ($_POST["email"]);
        }

        try {
            // Verifica se l'username esiste già
            $stmt = $pdo->prepare("SELECT username FROM utenti WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) 
            {
                echo "<script>alert('Nome utente già esistente. Scegline un altro!');</script>";
            }
            else 
            {
                // Inserimento dei dati nel database
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("
                    INSERT INTO utenti (nome, cognome, comune, provincia, data_nascita, username, email, password)
                    VALUES (:nome, :cognome, :comune, :provincia, :data_nascita, :username, :email, :password)
                ");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':cognome', $cognome);
                $stmt->bindParam(':comune', $comune);
                $stmt->bindParam(':provincia', $provincia);
                $stmt->bindParam(':data_nascita', $data);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);

                if ($stmt->execute()) 
                {
                    echo "<script>alert('Registrazione completata con successo!');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                    exit;
                } 
                else 
                {
                    echo "<script>alert('Errore durante la registrazione. Riprova!');</script>";
                }
            }
        } 
        catch (PDOException $e) 
        {
            echo "Errore: " . $e->getMessage();
        }
?>

<script src="assets/js/script.js"></script>