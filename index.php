<?php 
include "db.php";

$sql = "SELECT * FROM `answers`";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <title>Tests</title>
            <style>
                <?php include 'style.css'; ?>
            </style>

</head>
        <body>
                  <h1 style="color:white;">Tests
                  </h1>
        
                <?php
                while($res=$result->fetch_assoc()){
                        $id = $res['id'];
                        $answer = $res['answer'];
                        $cor = $res['is corect'];
                        
                             $question = $conn->query("SELECT * FROM `questions` WHERE id='".$res['question_id']."'");
                                while ($row = $re->fetch_assoc()) {
                                $q = $row['question']; 
               }       
                                
                ?>
                <div>
                        <div>
                                <div>
                                  <h2> <?php echo $q ?> </h2>
                                  <p> <?php echo $answer ?></p>
                                  <p> <?php echo $cor ?> </p>
                                </div>
                        </div>
               </div>
                <?php
                }
                ?>
        </body>
</html>