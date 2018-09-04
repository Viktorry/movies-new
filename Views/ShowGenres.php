<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/movies_new6/Views/Alllist.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>

    </script>
</head>
<body>
<h1>Genres:</h1><br>
<table border="2px" width="100%" bgcolor="white">
    <tr>
        <th>genres_id</th>
        <th>genre</th>
    </tr>
    <?php
    foreach($gen as $row) {
        echo "
        <tr>
            <td>".$row['genres_id'] ."</td>
            <td>".$row['genre'] ."</td>
            <td><a href='index.php?page=editgenre&id=".$row['genres_id']."'>Edit  </td>
            <td><a href='index.php?page=deletegenre&id=".$row['genres_id']."'>Delete </td>
        </tr>";
    }
    ?>

</table><br>
<a href="./index.php?page=showadminspage" style="color:#100b0a">Back</a>
</body>
</html>