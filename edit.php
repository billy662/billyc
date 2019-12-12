<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Editing
        <?php 
            if(isset($_GET["section"]) && isset($_GET["number"]))
            {
                $section = $_GET["section"];
                $number = $_GET["number"];
            }
            echo $section . $number; 
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        function editClick(section, number){
            var name = document.getElementById("name").value;
            window.location.replace("handleAction.php?action=edit&section=" + section + "&number=" + number + "&name=" + name);
        }
    </script>
    
    <style>
        .modal-header {
            background-color: crimson;
            color: white !important;
            text-align: center;
        }

    </style>
</head>

<body>
    <?php include 'conn.php'; ?>
    <div class="container" id="container">
        <center>
            <h2>Editing
                <?php echo $section . $number; ?>
            </h2>
            <table class="table table-striped table-bordered" style="
                width: auto;
                font-size: 18px;
            ">
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Number</th>
                        <th>Operator</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `booth_plan` WHERE `section` = '$section' AND `number` = $number";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <center><?php echo $section; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $number; ?></center>
                                    </td>
                                    <td>
                                        <center><input required type="text" class="form-control" id="name" name="name" value="<?php echo $row["operator"];?>" style="
                                            font-size: 20px;
                                            width: auto;
                                        "></center>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'><center>0 results</center></tr></td>";
                        }
                    ?>
                </tbody>
            </table>
            <button type="button" id="submit" class="btn btn-success btn-lg" onclick="editClick(<?php echo "'" . $section . "', " . $number; ?>);">Submit</button>
            <button type="button" id="back" class="btn btn-danger btn-lg" onclick="window.history.back();">Back</button>
        </center>
    </div>

</body>

</html>
