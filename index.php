<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        a:link {
            color: white;
        }

        a:visited {
            color: white;
        }

        a:hover {
            color: white;
        }

        a:active {
            color: white;
        }

        #new-record {
            margin: 10px;
        }

    </style>

    <script>
        $(document).ready(function() {

        });

    </script>
</head>

<body>

    <div class="container">
        <div class="panel panel-default" style="margin-top: 20px;">
            <div class="panel-heading">
                <center>
                    <h2 style="margin: 0px;">Search</h2>
                </center>
            </div>
            <div class="panel-body">
                <center>
                    <div class="panel panel-info" style="width: 309px; margin-bottom: 5px;">
                        <div class="panel-heading">
                            <label for="name" style="font-size: 20px; margin: 0px;">Operator</label>
                        </div>
                        <div class="panel-body">
                            <form action="search.php" method="get">
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="name" name="name" style="font-size: 20px; width: auto;">
                                </div>
                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-info" style="width: 309px; margin-bottom: 5px;">
                        <div class="panel-heading">
                            <label style="font-size: 20px; margin: 0px;">Booth number</label>
                        </div>
                        <div class="panel-body">
                            <form action="search.php" method="get">
                                <div class="form-group">
                                    <div style="display: inline-flex;">
                                        <label for="section" style="margin: auto; font-size: 16px;">Section:&nbsp;</label>
                                        <input required type="text" class="form-control" id="section" name="section" maxlength="1" size="1" style="
                                            font-size: 20px;
                                            width: 40px;
                                            text-transform: capitalize;
                                        "> &nbsp;
                                        <label for="section" style="margin: auto; font-size: 16px;">Number:&nbsp;</label>
                                        <input type="number" min="0" max="99" class="form-control" id="number" name="number" maxlength="1" size="1" style="
                                            font-size: 20px;
                                            width: 70px;
                                        ">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                        </div>
                    </div>
                    <form action="search.php" method="get">
                        <input required type="hidden" id="name" name="name">
                        <button type="submit" class="btn btn-info btn-lg">Show All</button>
                    </form>

                    <div class="panel panel-primary" id="new-record" style="width: 475px; display: block; opacity: 1;">
                        <div class="panel-heading" style="font-size: 20px; padding: 0px;">
                            <a data-toggle="collapse" href="#collapse1" style="display: block; padding: 10px;">New Record</a>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form action="handleAction.php" method="get" style="display: inline;">
                                    <table class="table table-striped table-bordered" style="width: auto; margin-bottom: 0px;">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                <th>Number</th>
                                                <th>Operator</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                                <input required type="text" class="form-control" id="section" name="section" maxlength="1" size="1" style="font-size: 20px; width: 40px; text-transform: capitalize;">
                                            </td>
                                            <td>
                                                <input required type="number" min="0" max="99" class="form-control" id="number" name="number" maxlength="1" size="1" style="font-size: 20px; width: 70px;">
                                            </td>
                                            <td>
                                                <input required type="text" class="form-control" id="name" name="name" style="font-size: 20px; width: auto;">
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="hidden" id="action" name="action" value="add" />
                                    <button type="submit" id="submit" class="btn btn-success btn-lg" style="margin-top: 10px; padding: 10px; float: right;">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>

    </div>

</body>

</html>
