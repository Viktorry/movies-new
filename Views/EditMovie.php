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
    <script>
        $(document).ready(function() {
            $("#btnInsert").click(function(){
                var dataForm = $("#form").serialize();
                $.ajax({
                    type: "GET",
                    url: '/test-project/movies_new3/index.php',
                    data: dataForm,
                    success: function(output) {
                        $("#result").html('<h1>' + output + '</h1>');
                        $("#result").show(1000);
                        setTimeout(function () {
                            $("#result").hide(1000);
                        }, 5000);
                    }
                });
            });
        });

    </script>
    <link href="/test-project/movies_new3/Views/Form.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <div id="result" style="display:none;"></div>
                <form class="form-horizontal" id="form">
                    <fieldset>
                        <legend class="text-left header">Edit Movie</legend>
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
                            Url:
                            <div class="col-md-8">
                                <input id="fname" name="url" type="text" placeholder="InsertUrl" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="hidden" name="id" value="<?php echo $mov['movies_id']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="reset" id="btnInsert" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </div>
                        <input type="hidden" value="updatemovie" name="page">
                    </fieldset>
                </form>
                <?php
                if(isset($msg)){
                    echo $msg;
                }

                ?>
                <br>
                <a href="./index.php?page=showMovies">Back</a><br>

            </div>
        </div>
    </div>
</div>
</body>
</html>
