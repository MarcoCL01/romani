<!DOCTYPE html>
<html>
    <head>
        <title>FORM DI REGISTRAZIONE</title>
        <link href="assets/css/style.css?version=1" rel="stylesheet" type="text/css">
    </head>
    <body class="background">
        <img class="imgpr" src="img\romani5.png " width="500" height="800">
        <img class="imgsec" src="img\romani7.jpg" width="500" height="800">
        <h1 class="capo"> COMPILARE I SEGUENTI CAMPI</h1>
        <form id='reg' action='complete.php' method='POST'>

            <div class="inline"></div>
            <label class="primarg" for='nome'> Nome </label>
            <label class="secondarg" for='cognome'> Cognome </label>
            </div>

            <div class="inline">
            <input class="primacl" type='text' id='nome' name='nome' required maxlength="255">
            <input class="secondacl" type='text' id='cognome' name='cognome' required maxlength="255">
            </div>

            <div class="inline">
            <label class="terzarg" for='comune'> Comune </label>
            <label class="quartarg" for='provincia'> Provincia (2 lettere) </label>
            </div>

            <div class="inline">
            <input class="primacl" type='text' id='comune' name='comune' required maxlength="255">
            <input class="secondacl" type='text' id='provincia' name='provincia' required maxlength="2">
            </div>

            <div class="inline">
            <label class="quintarg" for='data'> Data di Nascita </label>
            <label class="sestarg" for='tagname'> Username </label>
            </div>

            <div class="inline">
            <input class="primacl" type="date" id='data' name='data' required>
            <input class="cldiv" type='text' id='tagname' name='tagname' required maxlength="15">
            </div>
            
            <div class="inline">
            <label class="settimarg" for='email'> Email </label>
            <label class="ottavarg" for='passw'> Password </label>
            </div>

            <div class="inline">
            <input class="primacl" type='email' id='email' name='email' required maxlength="255">
            <input class="secondacl" type='password' id='passw' name='passw' required maxlength="50">
            </div>

            <br><br>
            <input class="puls" type='submit' name='invia' value='Invia'>

        </form>
        
    </body>
</html>

<script src="assets/js/script.js"></script>
