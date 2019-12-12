<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php 
            if(isset($_GET["name"]))
            {
                $search = $_GET["name"];
                $searching = "name";
            }  
            else if (isset($_GET["section"]) && isset($_GET["number"]))
            {
                $search = $_GET["section"] . "" . $_GET["number"];
                $searching = "boothNumber";
            }
            
            if($search != "")
                echo "Search result of " . $search; 
            else
                echo "Showing all records";
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        function actionClick(action, section, number) {
            document.getElementById("section").value = section;
            document.getElementById("number").value = number;
            document.getElementById("action").value = action;
            if (action == "edit") {
                window.location.replace("edit.php?section=" + section + "&number=" + number);
            }
        }

        $(document).ready(function() {
            $("#collap-table").click();
            $("#alert-success").stop().animate({
                opacity: "1"
            }, 350);
            $("#alert-close").click(function() {
                $("#alert-success").stop().animate({
                    height: "0px",
                    padding: "0px",
                    margin: "0px",
                    opacity: "0"
                }, 500, function() {
                    $(this).hide();
                });
            });
        });

    </script>

    <style>
        .glyphicon {
            font-size: 30px;
        }

        .modal-header {
            background-color: crimson;
            color: white !important;
            text-align: center;
        }

        #back {
            transition: all 1s;
        }

    </style>
</head>

<body>
    <?php include 'conn.php'; ?>
    <div class="container" id="container">
        <center>
            <h2>
                <?php 
                    if($search != "")
                        echo "Search result of " . $search; 
                    else
                        echo "Showing all records";
                ?>
            </h2>
            <button type="button" id="back" class="btn btn-danger btn-lg" onclick="window.location.replace('index.php');" style="
                margin-bottom: 10px;
                width: 320px;
                                                                                                                                 
            ">Back</button>
            <?php
                if(isset($_GET["returnmsg"])){
                    ?>
                <div class="alert alert-success" id="alert-success" style="opacity: 0;">
                    <p>
                        <a href="#" class="close" id="alert-close" aria-label="close">&times;</a>
                    </p>
                    <strong><?php echo $_GET["returnmsg"]; ?></strong>
                </div>
                <?php
                }
            ?>
                    <button id="collap-table" data-toggle="collapse" data-target="#main-table" style="display: none;">Collapsible</button>
                    <div id="main-table">
                        <table class="table table-striped table-bordered" style="width: auto;font-size: 18px;">
                            <thead>
                                <tr>
                                    <th>Section</th>
                                    <th>Number</th>
                                    <th>Operator</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        if($searching == "name")
                            $sql = "SELECT * FROM `booth_plan` WHERE operator LIKE '%$search%'";
                        else
                        {
                            if(isset($_GET["number"]) && $_GET["number"] === NULL)
                                $sql = "SELECT * FROM `booth_plan` WHERE `section` = '" . $_GET["section"]. "' AND `number` = ". $_GET["number"];
                            else
                                $sql = "SELECT * FROM `booth_plan` WHERE `section` = '" . $_GET["section"]. "'";
                        }
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo 
                                    "<tr style=\"height: 0px;\">
                                        <td>" . $row["section"]. "</td>
                                        <td>" . $row["number"]. "</td>
                                        <td>" . $row["operator"]. "</td>
                                        <td>
                                            <a href=\"#\"><span class=\"glyphicon glyphicon-edit\" onclick=\"actionClick('edit', '" . $row["section"] . "', " . $row["number"] . ");\"></span></a>
                                            <a href=\"#myModal\" data-toggle=\"modal\"\"><span class=\"glyphicon glyphicon-remove-circle\" onclick=\"actionClick('delete', '" . $row["section"] . "', " . $row["number"] . ");\"></span></a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'><center>0 results</center></tr></td>";
                        }
                    ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="font-size: 30px;">Warning!</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Are you sure to delete this record?</h4>
                                </div>
                                <div class="modal-footer">
                                    <form action="handleAction.php" method="get" style="display: inline;">
                                        <input type="hidden" id="action" name="action" value="" />
                                        <input type="hidden" id="section" name="section" value="" />
                                        <input type="hidden" id="number" name="number" value="" />
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    </form>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </center>
    </div>

</body>

</html>
