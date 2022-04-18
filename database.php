<?php
    class database {
        private $host;
        private $dbh;
        private $user;
        private $pass;
        private $db;


        function __construct(){
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db = 'examenvoorbereiding';

            try{
                $dsn = "mysql:host=$this->host;dbname=$this->db";
                $this->dbh = new PDO($dsn, $this->user, $this->pass); 
            }catch(PDOException $e){
                die("Unable to connect: " . $e->getMessage());
            }
        }

        function loginMedewerker($gebruikersnaam, $wachtwoord){
            $sql="SELECT * FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";
    
            $stmt = $this->dbh->prepare($sql); 
            $stmt->execute(['gebruikersnaam'=>$gebruikersnaam]); 
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($result){
                if($wachtwoord == $result["wachtwoord"]) {
                    SESSION_START();
                    $_SESSION['user'] = $result;
                    echo "Valid Password!";
                    header("Location:medewerker_overzicht.php");
                } else {
                    echo "Invalid Password!";
                }
            } else {
                echo "Invalid Login";
            }
    
        }

        function aanmeldenKlant($naam, $tussenvoegsel, $achternaam, $gebruikersnaam, $wachtwoord){
            $sql = "INSERT INTO klant(ID, naam, tussenvoegsel, achternaam, gebruikersnaam, wachtwoord) VALUES (:ID, :naam, :tussenvoegsel, :achternaam, :gebruikersnaam, :wachtwoord)";
    
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                'ID'=>NULL,
                'naam'=>$naam,
                'tussenvoegsel'=>$tussenvoegsel,
                'achternaam'=>$achternaam,
                'gebruikersnaam'=>$gebruikersnaam,
                'wachtwoord'=>password_hash($wachtwoord, PASSWORD_DEFAULT)
            ]);
        }

        public function getAllKlanten(){

            $sql = "SELECT * FROM klant";
    
            // prepared statement (send statement to server  + checks syntax)
            $statement = $this->dbh->prepare($sql);
    
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
    
        }

        public function selectKlant($ID){
            $query = "SELECT * FROM klant WHERE ID = :ID;";
    
            $prep = $this->dbh->prepare($query);
    
            $prep->execute([
                'ID' => $ID
            ]);
    
            $row = $prep->fetch(PDO::FETCH_ASSOC);
            
            return $row;
        }

        public function updateKlant($ID, $naam, $tussenvoegsel, $achternaam){
                $query = "UPDATE klant SET naam = :naam, tussenvoegsel = :tussenvoegsel, achternaam = :achternaam WHERE ID = :ID;";
    
                $prep = $this->dbh->prepare($query);
    
                $prep->execute([
                    'ID' => $ID,
                    'naam' => $naam,
                    'tussenvoegsel' => $tussenvoegsel,
                    'achternaam' => $achternaam
                ]);
    
                header("Location: medewerker_overzicht.php");
    
                exit;
        }

        public function deleteKlant($ID){
                $query = $this->dbh->prepare(
                    "DELETE FROM klant
                    WHERE ID = :ID;"
                );
    
                $query->execute([
                    'ID' => $ID
                ]);
    
                header("Location: medewerker_overzicht.php");
        }
    }
?>