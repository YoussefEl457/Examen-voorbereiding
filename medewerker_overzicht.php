<?php
session_start();
include 'database.php';

if(!isset($_SESSION['user'])) {

    header('Location: inloggen.php');

}




$DB = new database();

$klanten = $DB->getAllKlanten();



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
            <a class="nav-link" href="logout.php">uitloggen</a>
            </li>

        </ul>
        </div>
    </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
                <th scope="col">Tussenvoegsel</th>
                <th scope="col">Achternaam</th>
                <th scope="col">Gebruikersnaam</th>
                <th scope="col">Wachtwoord</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($klanten as $klant):?>
            <tr>
                <th scope="row"><?php echo $klant["ID"];?></th>
                <td><?php echo $klant["naam"];?></td>
                <td><?php echo $klant["tussenvoegsel"];?></td>
                <td><?php echo $klant["achternaam"];?></td>
                <td><?php echo $klant["gebruikersnaam"];?></td>
                <td><?php echo $klant["wachtwoord"];?></td>
                <td><a class="btn btn-primary" href="editklant.php?ID=<?php echo $klant["ID"]; ?>">Edit</button></td>
                <td><a class="btn btn-danger" href="deleteklant.php?ID=<?php echo $klant["ID"]; ?>">Delete</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>