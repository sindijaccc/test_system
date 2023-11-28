<?php 
include "db.php";

    $mysql = "SELECT * FROM `answers`";

    $answers = mysqli_query($conn,$mysql);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Jautājuma izveide</title>    
    <style>
    <?php include 'style.css'; ?>
    </style>   
</head>
        <body>
            <div>
            <h2>Jautājuma izveide</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">  
                        <div class="form-group">
                
                    <label id="first">Jautājums: </label>
                    <input type="text" name="question"><br/> 
                    <br>
                    <label id="first">1. atbilde: </label>
                    <input type="int" name="answer"><br/> 
                    <br>
                    <label id="first">2. atbilde: </label>
                    <input type="varchar" name="answer"><br/> 
                    <br>
                    
                     <label>Pareizās atbildes numurs:</label>
                        <select name="is_correct">
                            <?php
                                while ($cor = mysqli_fetch_array($answers,MYSQLI_ASSOC)):;
                            ?>
                                <option value="<?php echo $cor['is_correct'];?>">
                                    <?php echo $cor['question_id'];?>
                                </option>
                            <?php
                                endwhile;
                            ?>
                        </select>

                   
                               <div class="form-group">
                               <input type="submit" class="btn" name="submit" value="Pievienot">
                               <input type="button" onclick="document.location.href='index.php';" value="Visi jautājumi">

                               </div>
                         </div>  
                </form>
             </div>
        </body>
</html>
<?php
                    if(isset($_POST['submit'])){
                    $id = mysqli_real_escape_string($conn,$_POST['is_correct']);
                    
                    $sql = "INSERT INTO questions () VALUES ('".$_POST["id"]."','".$_POST["question"]."');
                    		INSERT INTO answers () VALUES ('".$_POST["id"]."','".$_POST["answer"]."','".$_POST["question_id"]."','".$id."')"; 
                            
                    if ($conn->multi_query($sql) === true) {
                          echo "Jautājums pievienots datubāzei";
                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                     }
                    
?>