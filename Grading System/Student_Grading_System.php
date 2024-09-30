<?php include ('include.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel ="stylesheet" href=" style.css">
    <script src="script.js"></script>
    <title>Student Grading System</title>
</head>

<body>
    <div class="header">
        <h1>Student Grading System</h1>
    </div>
    <div class="parent-div">
    <div class="table-div">
        <?php
        if(!empty($_SESSION['grades'])){
        ?>
        <form method='post'>
            <table border='1'>
                <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Course</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Checked by</th>
                <th>Actions</th>
                </tr>
                <?php
                foreach($_SESSION['grades'] as $index=>$grade){
                    echo "<tr>";
                    echo "<td>".($index+1)."</td>";
                    echo isset($grade['Name'])? "<td>" .$grade['Name']."</td>" :" N/A";
                    echo isset($grade['RollNo'])? "<td>".$grade['RollNo']."</td>" :" N/a";
                    echo isset($grade['Course'])? "<td>".$grade['Course']."</td>":"N/A ";
                    echo isset($grade['Marks'])? "<td>".$grade['Marks']."</td>":"N/A ";
                    echo isset($grade['Grade'])? "<td>".$grade['Grade']."</td>":"N/A ";
                    echo isset($grade['Checkedby'])?"<td>". $grade['Checkedby']."</td>":"N/A ";

                    echo "<td>

                    <button class='delete-btn fa fa-trash' name='deleteRecord' value=".$index." ></button>";
                    echo "<button class='edit-btn fa fa-edit' name='editRecord' value=".$index." ></button>
                    <button name='view' onclick='viewStudent(". $index .") '> <i class='fa fa-eye'> </i></button>
                    </td>";
                    echo "</tr>";


                }

                ?>
            </table>
        </form>
        <div id="overlay" class="overlay_bg"></div>
        <div id="cardDetails" class="cardDetailed">
            <i class="fa fa-times "onclick =closeCard(); style="text-align:right; cursor:pointer;"></i>
            <h2 id="studentName"></h2>
            <p id="Grade"></p>
            <p id="marks"></p>
            <p id="teacherName"></p>

        </div>
        <?php
    if(isset($_SESSION['message'])){
        echo "<span class='span' id='message'>" . $_SESSION['message'] . "</span>";
    }
    ?>
        <?php }?>
        <?php
        if (isset($_POST['editRecord'])){
            $gradesRecord = $_SESSION['grades'][$_POST['editRecord']];
        }
        ?>

    </div>

<div class="form-div"> 
    <form method='Post'>
        <h2>Add Grade Record</h2>
        <label for="name"> Name </label><br>
        <input type="text" name="name" placeholder="Student Name" value="<?php echo isset($gradesRecord['Name'])?$gradesRecord['Name']:"" ?>"><br>

        <label for="rollNo"> Roll NO </label><br>
        <input type="text" name="rollNo" placeholder="Roll No" value="<?php echo isset($gradesRecord['RollNo'])?$gradesRecord['RollNo']:"" ?>"><br>

        <label for="course">Course</label><br>
        <input type="text"placeholder="Course" name="course" value="<?php echo isset($gradesRecord['Course'])?$gradesRecord['Course']:"" ?>"><br>

        <label for="marks">Marks</label><br>
        <input type="text"placeholder="Type Marks" name="marks" value="<?php echo isset($gradesRecord['Marks'])?$gradesRecord['Marks']:"" ?>"> <br>

        <label for="grade">Grade</label><br>
        <input type="text"placeholder="Type Grade" name="grade" value="<?php echo isset($gradesRecord['Grade'])?$gradesRecord['Grade']:"" ?>"> <br>


        <label for="checkedby">Checked By</label><br>
        <input type="text"placeholder="Teacher Name" name="checkedby" value="<?php echo isset($gradesRecord['Checkedby'])?$gradesRecord['Checkedby']:"" ?>"><br>
        
    <div class="button-div">

                <?php 
                if (isset($_POST['editRecord'])){
                     ?>

                    <button class="button-submit" type="submit" name="updateRecord" value="<?php echo $_POST['editRecord']  ?>" > Update</button>


                <?php } 

                else {?>
            
                <button class="button-submit" type="submit" name="addRecord"> Submit</button>
               <?php }
               ?>
            
            </div>
    </form>
    </div>
    </div>
    <footer>
        &copy;WajidNaeem |<i> Wajidnaeem4246@gmail.com </i>
    </footer>

    <script>

   function viewStudent (id){

event.preventDefault();
var studentData = JSON.parse('<?php echo json_encode($_SESSION['grades']); ?>');

if(studentData[id]){
    document.getElementById("overlay").style.display="flex";
    document.getElementById("cardDetails").style.display="flex";
    document.getElementById("studentName").innerHTML=studentData[id].Name;
    document.getElementById("marks").innerHTML=studentData[id].Marks;
    document.getElementById("Grade").innerHTML=studentData[id].Grade;
    document.getElementById("teacherName").innerHTML=studentData[id].Checkedby;

}

}
    </script>
    <?php
unset($_SESSION['message']);
?> 
</body>
</html>