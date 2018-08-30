<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="UpdatePicture.php" method="post" enctype="multypart/from-data">

        <label for="file">File:<input type="file" name="file" id="file"></label>
        <input type="submit" value="Upload">

    <?php



    if(isset($_FILES['file'])){
                $upload->updatePict($_FILES['file']);
        }else{
            die('File was not submited!!!');
        }


    ?>
</form>
</body>
</html>