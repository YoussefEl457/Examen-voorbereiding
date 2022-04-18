<?php
include 'database.php';
$DB = new database();
$klant = $DB->selectKlant($_GET['ID']);

if(isset($_POST["submit"])){
    //fieldnames - input fields
    $fieldnames = ['naam', 'tussenvoegsel', 'achternaam'];

    //Var boolean
    $err = false;

    //Looping
    foreach ($fieldnames as $fieldname) {
        //if fieldname is empty -> $err = true
        if (empty($_POST[$fieldname])) {
            $err = true;
        }
    }


    if ($err) {
        echo "All fields are required!";
    } else {
        $naam = $_POST['naam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];

        
        $DB->updateKlant($_GET['ID'], $naam, $tussenvoegsel, $achternaam);
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

            
            </li>
            <li class="nav-item">
            <a class="nav-link" href="aanmelden.php">Aanmelden</a>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>
    
    <form method="post">
        <div class="mb-3" style="width: 15%;">
            <input type="text" name="naam" placeholder="Naam" class="form-control" required>
        </div>
        <div class="mb-3" style="width: 15%;">
            <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel" class="form-control" required>
        </div>
        <div class="mb-3" style="width: 15%;">
            <input type="text" name="achternaam" placeholder="Achternaam" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>