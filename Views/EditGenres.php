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
    <link href="/movies_new6/Views/Form.css" rel="stylesheet">
</head>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <div id="result" style="display:none;"></div>
                <form class="form-horizontal" id="form">
                    <fieldset>
                        <legend class="text-left header">Edit Genres</legend>
                        <div class="form-group">
                            <h4 style="color: white">Genre:</h4>
                            <div class="col-md-8">
                                <input id="fname" name="genres" type="text" placeholder="EditGenre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="hidden" name="id" value="<?php echo $gen['genres_id'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="reset" id="btnInsert" value="editgenres" class="btn btn-primary btn-lg" style="background: 	#100b0a;border-color: 	#100b0a">EditGenre</button>
                            </div>
                        </div>
                        <input type="hidden" value="updategenre" name="page">
                    </fieldset>
                </form>
                <!-- <form action="./index.php?page=showactors" method="post">
                     <input type="submit" name="showactors" class="btn btn-primary btn-lg" value="ShowallActors">
                 </form>-->
                <?php
                if(isset($msg)){
                    echo $msg;
                }

                ?>
                <br>
                <a href="./index.php?page=showGenres" style="color:#100b0a">Back</a>
            </div>
        </div>
    </div>
</div>



</body>
</html>