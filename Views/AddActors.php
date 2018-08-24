<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complete Bootstrap 4 Website Layout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="Form.css" rel="stylesheet">
</head>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" action="./index.php?page=insertactor" method="post">
                    <fieldset>
                        <legend class="text-left header">Insert Actor</legend>
                        <div class="form-group">
                            Movie:
                            <div class="col-md-8">
                                <input id="fname" name="actor" type="text" placeholder="InsertActor" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" value="InsertActor" class="btn btn-primary btn-lg">InsertActor</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <form action="./index.php?page=showactors" method="post">
                    <input type="submit" name="showactors" class="btn btn-primary btn-lg" value="ShowallActors">
                </form>
                <?php
                if(isset($msg)){
                    echo $msg;
                }

                ?>
                <br>
                <a href="./index.php?page=user">Back</a>
                <table border='2' class="table table-dark">
                    <?php
                        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['showactors'])) {
                                foreach ($act as $row) {
                                    echo "
                      
                            <tr>
                                <td>" . $row['actor'] . "</td>
                                <td><a href='./index.php?&page=deleteactor&id=".$row['actor_id']."'=> Delete </td>
                                <td><a href='./index.php?page=editactor&id=".$row['actor_id']."'=>Edit  </td>
                            </tr>";

                                }
                            }
                        }
                        ?>
            </div>
        </div>
    </div>
</div>



</body>
</html>
