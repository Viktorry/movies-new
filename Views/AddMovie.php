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
                <form class="form-horizontal" action="./index.php?page=insertmovie" method="post">
                    <fieldset>
                        <legend class="text-left header">Insert Movie</legend>
                        <div class="form-group">
                            Movie:
                            <div class="col-md-8">
                                <input id="fname" name="movie" type="text" placeholder="InsertMovie" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Date:
                            <div class="col-md-8">
                                <input id="fname" name="date" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Duration:
                            <div class="col-md-8">
                                <input id="fname" name="duration" type="text" placeholder="InsertDuration" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Ratings:
                            <div class="col-md-8">
                                <input id="fname" name="ratings" type="text" placeholder="InsertRatings" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Youtube:
                            <div class="col-md-8">
                                <input id="fname" name="youtube" type="text" placeholder="InsertYoutube" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Imdb:
                            <div class="col-md-8">
                                <input id="fname" name="imdb" type="text" placeholder="InsertImdb" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Imdb:
                            <div class="col-md-8">
                                <input id="fname" name="url" type="text" placeholder="InsertUrl" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" value="InsertMovie" class="btn btn-primary btn-lg">Insert</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <form action="./index.php?page=showmovies" method="post">
                    <input type="submit" name="showmovies" class="btn btn-primary btn-lg" value="ShowallMovies">
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
                        if (isset($_POST['showmovies'])) {
                            foreach ($mov as $row) {
                                echo "
  
        <tr>
            <td>" . $row['movies_name'] . "</td>
            <td>" . $row['movies_date'] . "</td>
            <td>" . $row['duration_time'] . "</td>
            <td>" . $row['ratings'] . "</td>
            <td>" . $row['youtube'] . "</td>
            <td>" . $row['imdb'] . "</td>
            <td>" . $row['url'] . "</td>
            <td>" . $row['updated_at'] . "</td>
            <td><a href='./index.php?&page=deletemovie&id=".$row['movies_id']."'=> Delete </td>
            <td><a href='./index.php?page=editmovie&id=".$row['movies_id']."'=>Edit  </td>
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
