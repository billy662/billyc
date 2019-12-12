<?php
    include 'conn.php';
    if(isset($_GET["action"]) && isset($_GET["section"]) && isset($_GET["number"]))
    {
        $action = $_GET["action"];
        $section = $_GET["section"];
        $number = $_GET["number"];
        if(isset($_GET["name"]))
            $name = $_GET["name"];
        
        if($action == "delete"){
            // sql to delete a record
            $sql = "DELETE FROM `booth_plan` WHERE `section` = '$section' AND `number` = $number";
        }
        else if($action == "edit"){
            $sql = "UPDATE `booth_plan` SET section='$section' , number=$number , operator='$name' WHERE section='$section' AND number=$number";
        }
        else if($action == "add"){
            $sql = "INSERT INTO `booth_plan` (`section`, `number`, `operator`) VALUES ('$section', '$number', '$name');";
        }

        if (mysqli_query($conn, $sql)) {
            if($action == "delete")
                header("Location: search.php?name=&returnmsg=Successfully Deleted $section$number");
            else if($action == "edit")
                header("Location: search.php?name=&returnmsg=Successfully Updated $section$number");
            else if($action == "add")
                header("Location: search.php?name=&returnmsg=Successfully Added $section$number");
        } else {
            if($action == "delete")
                echo "Error deleting record: " . mysqli_error($conn);
            else if($action == "edit")
                echo "Error editing record: " . mysqli_error($conn);
            else if($action == "add")
                echo "Error adding record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>