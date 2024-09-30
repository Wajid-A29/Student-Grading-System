<?php
    session_start();
    if(!isset($_SESSION['grades'])){
        $_SESSION['grades']=[];
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['addRecord'])){
            $newGrade= array(
                'Name'=>$_POST['name'],
                'RollNo'=>$_POST['rollNo'],
                'Course'=>$_POST['course'],
                'Marks'=>$_POST['marks'],
                'Grade'=>$_POST['grade'],
                'Checkedby'=>$_POST['checkedby']
            );
            $_SESSION ['grades'][]=$newGrade;
            header('location:'. $_SERVER['PHP_SELF']);
            
            exit();
            
            session_destroy();


        }
        if (isset($_POST['deleteRecord'])){
            array_splice($_SESSION['grades'],$_POST['deleteRecord'],1);
            $_SESSION['message']="Student record deleted successfully";
            header('location:'. $_SERVER['PHP_SELF']);
            exit();
        };

        if(isset($_POST['updateRecord'])){
            $index = (int)$_POST['updateRecord'];
            $updatedGrade =array(
                'Name'=>$_POST['name'],
                'RollNo'=>$_POST['rollNo'],
                'Course'=>$_POST['course'],
                'Grade'=>$_POST['grade'],
                'Checkedby'=>$_POST['checkedby']
            );
            $_SESSION['grades'][$index]=$updatedGrade;
            $_SESSION['message']="Student record updated successfully";
    
            header('location:'. $_SERVER['PHP_SELF']);
            exit();
        
        }
       
    }

?>
 