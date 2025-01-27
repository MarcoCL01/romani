<!DOCTYPE html>
<html>
    
    <head>

        <title> FORM DI CONTATTO </title>
        <link href="assets/css/style.css?version=1" rel="stylesheet" type="text/css">

    </head>
    
    <body class="backgroundfc">
    <hr class="rigaconto">
    <hr class="rigacontt">
    <hr class="rigaconttt">
    <hr class="rigacontf">
    <hr class="rigacontff">
    <hr class="rigaconts">
    <div class="rigabsx">ROMANI&CO</div>
    <div class="rigabdx">ROMANI&CO</div>
    <div class="imgfcs"><img src="img\romcom.jpg" class="imagefc"></div>
    <div class="imgfcd"><img src="img\romcom.jpg" class="imagefc"></div>
    <div class="divtfc"><span class="fcs">ROMANI&CO</span></div>
    <div class="divtfcu"><span class="fcs">ROMANI&CO</span></div>
    

    <br><br>
        <form id="formfc" method="POST">
            <label for="pname" class="lu"> Nome </label><br>
            <input class="testofcou" type='text' name='pname' required maxlength="50">
            <label for="surname" class="ld"> Cognome </label><br>
            <input class="testofcod" type="text" name='surname' required maxlength="50">
            <label for="emailfc" class="lt"> Email </label>
            <input class="testofcot" type="email" name='emailfc' required maxlength="50">
            <label for="telfc" class="lq"> Numero telefonico </label>
            <input class="testofcoq" type="tel" pattern="[0-9]{10}" placeholder="1234567890" name='telfc' required>
            <input class="pulsfc" type='submit' name='inviafc' value='Invia'>
            
        </form>
    </body>

</html>

<script src="assets/js/script.js"></script>