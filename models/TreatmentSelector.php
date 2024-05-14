<?php 

require_once "Database.php";
/**
 * Type treatment dropdown
 */
class TreatmentSelector
{
    private $db;

    public function __construct()
    {
        $this->db = ConnectDb::getInstance()->getConnection();
    }

    public function showTreatment()
    {
        $stmt = $this->db->prepare("SELECT * FROM `treatment`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<label for="type_treatment">soort behandeling:</label><br>
                <select name="type_treatment" id="type_treatment">';

        foreach ($result as $row) {
            echo '<option value="' . $row["treatment"] . '">' . $row["treatment"] . '</option>';
        }
            echo '</select><br>';
    }
}

// execute and show
$treatmentSelector = new TreatmentSelector();
$treatmentSelector->showTreatment();