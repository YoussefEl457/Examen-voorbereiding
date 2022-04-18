<?php
include 'database.php';


if(isset($_POST['submit'])){
    
    $fieldnames = ['naam', 'tussenvoegsel', 'achternaam', 'gebruikersnaam', 'wachtwoord'];
    $error = false;
    
    foreach($fieldnames as $fieldname){
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $error = true; 
        }

    }

    

    if(!$error){
        $obj = new database();
        $obj->aanmeldenKlant($_POST['naam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['gebruikersnaam'], $_POST['wachtwoord']);
        //yurr
    }else{
        //do something
    }
}    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Examen voorbereiding</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        
    <img src="Images/books.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
        <a class="navbar-brand" href="index.php">Examen voorbereiding</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


            <li class="nav-item">
            <a class="nav-link" href="inloggen.php">Inloggen</a>
            </li>
            
            
            
        </ul>
        </div>
    </div>
    </nav>
    
    <form method="post">
        <div class="mb-3" style="width: 15%;">
            <input type="text" name="naam" class="form-control-sm" placeholder="Naam" required>
        </div>

        <div class="mb-3" style="width: 15%;">
            <input type="text" name="tussenvoegsel" class="form-control-sm" placeholder="Tussenvoegsel">
        </div>

        <div class="mb-3" style="width: 15%;">
            <input type="text" name="achternaam" class="form-control-sm" placeholder="Achternaam" required>
        </div>

        <div class="mb-3" style="width: 15%;">
            <input type="text" name="gebruikersnaam" class="form-control-sm" placeholder="Gebruikersnaam"required>
        </div>

        <div class="mb-3" style="width: 15%;">
            <input type="password" name="wachtwoord" class="form-control-sm" placeholder="Wachtwoord" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Aanmelden</button>
    </form>

</body>
</html>