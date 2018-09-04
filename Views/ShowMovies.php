<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>

        /*   $(document).ready(function () {

               myTablemov = $('#myTablemov').DataTable();
               $.ajax({
                   type: "GET",
                   url: '/test-project/movies_new3/index.php',
                   data: {page: 'jsonMovies'},
                   success: function (output) {
                       var obj = $.parseJSON(output);
                       var result = obj.map(function (item) {
                           var result = [];
                           result.push(item.movies_id);
                           result.push(item.movies_name);
                           result.push(item.movies_date);
                           result.push(item.duration_time);
                           result.push(item.ratings);
                           result.push(item.youtube);
                           result.push(item.imdb);
                           result.push(item.url);
                           result.push(item.updated_at);
                           return result;
                       });
                       myTablemov.rows.add(result); // add to DataTable instance
                       myTablemov.draw(); // always redraw
                   }
               });
           });*/

    </script>
    <link href="/test-project/movies_new3/Views/Form.css" rel="stylesheet">
</head>
<body>
<!--
<ul id="list">
    <li><button type="button" class="btn btn-secondary">Edit</button></li>
    <li><button type="button" class="btn btn-secondary">Delete</button></li>
</ul>


<h1>Movies:</h1><br>
<table  id="myTablemov">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Ratings</th>
        <th>Youtube</th>
        <th>Imdb</th>
        <th>Updated_at</th>
    </tr>
    </thead>
</table>
</table>-->
<h1>Movies:</h1><br>
<table border="2px" width="100%" bgcolor="white">
    <?php
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
    ?>
</table><br>
<a href="./index.php?page=showadminspage" style="color:#100b0a">Back</a>
</body>
</html>