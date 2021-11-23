<?php
class Journal {
    /* Connection Database */
    protected $connection;

    /* Constructor */
    public function __construct (PDO $connection) {
        $this -> connection = $connection;
    }

    /* Create new Journal Entry */
    // Insert into Database
    // Create Prepared Statement
    // Execute Prepared Statement
    public function newJournalEntry($array) {
        $query = "INSERT INTO `journal` (date, firstGoal, secondGoal, thirdGoal, importantTask, sleep, userId) VALUES (:currentDate, :firstGoal, :secondGoal, :thirdGoal, :importantTask, :sliderValueSleep, :userId)";
        $stmt = $this -> connection -> prepare($query);
        $stmt -> execute($array);
    }

    /* Get all Journal Entries */
    // Select Statement
    // Create Prepare Statement
    // Execute Prepare Statement
    public function getJournalEntries($userId) :array {
        $query = "SELECT * FROM journal WHERE userId = :userId";
        $stmt = $this -> connection -> prepare($query);  
        $stmt -> execute(["userId" => $userId]);
        $result = $stmt -> fetchAll();


        if (count($result) > 0) {
          $result[0]['date'] = date("d.m.Y", strtotime($result[0]['date']));
          $Response = array(
            'status' => true,
            'data' => $result
          );
          return $Response;
        }

        $Response = array(
          'status' => false,
          'data' => []
        );
        return $Response;
    }

    /* Get one Journal Entry */
    public function getEntry($id) {
      $query = "SELECT * FROM journal WHERE id = :id";
      $stmt = $this -> connection -> prepare($query);
      $stmt -> execute(["id" => $id]);
      $result = $stmt -> fetch();
      return $result;
    }


    /* Update Journal Entry */
    public function updateJournal(
                                  $summaryField,
                                  $wentWellField,
                                  $doBetterField,
                                  $ideasField,
                                  $sliderValueMood,
                                  $sliderValueMotivation,
                                  $sliderValueConcentration,
                                  $sliderValueTranquility,
                                  $sliderValuePhysical,
                                  $journalId) {
      $query = "UPDATE `journal` SET ";
      $query .= "summary = :summary, ";
      $query .= "wentWell = :wentWell, ";
      $query .= "doBetter = :doBetter, ";
      $query .= "ideas = :ideas, ";
      $query .= "mood = :mood, ";
      $query .= "motivation = :motivation, ";
      $query .= "concentration = :concentration, ";
      $query .= "tranquility = :tranquility, ";
      $query .= "physical = :physical ";
      $query .= "WHERE id = :journalId";
      $stmt = $this -> connection -> prepare($query);
      $stmt -> bindParam(":journalId", $journalId, PDO::PARAM_INT);
      $stmt -> bindParam(":summary", $summaryField);
      $stmt -> bindParam(":wentWell", $wentWellField);
      $stmt -> bindParam(":doBetter", $doBetterField);
      $stmt -> bindParam(":ideas", $ideasField);
      $stmt -> bindParam(":mood", $sliderValueMood);
      $stmt -> bindParam(":motivation", $sliderValueMotivation);
      $stmt -> bindParam(":concentration", $sliderValueConcentration);
      $stmt -> bindParam(":tranquility", $sliderValueTranquility);
      $stmt -> bindParam(":physical", $sliderValuePhysical);
      // print_r($stmt);
      $stmt -> execute();
    }
};
?>