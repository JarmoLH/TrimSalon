<?php

require_once "Database.php";

/**
 * Pet species dropdown
 */
class SpeciesSelector
{
    private $db;

    public function __construct()
    {
        $this->db = ConnectDb::getInstance()->getConnection();
    }

    public function showAnimal()
    {
        $stmt = $this->db->prepare("SELECT * FROM `species`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<label for="type_pet">soort dier:</label><br>
               <select name="type_pet" id="type_pet">';

        foreach ($result as $row) {
            echo '<option value="' . $row["animal"] . '">' . $row["animal"] . '</option>';
        }

        echo '</select><br>';
    }
}

// execute and show
$animalSelector = new SpeciesSelector();
$animalSelector->showAnimal();
