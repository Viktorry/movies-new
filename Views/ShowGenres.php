<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/test-project/movies_new3/Views/Alllist.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function () {
            myTablegen = $('#myTablegen').DataTable();
            $.ajax({
                type: "GET",
                url: '/test-project/movies_new3/index.php',
                data: {page: 'jsonGenres'},
                success: function (output) {
                    var obj = $.parseJSON(output);
                    var result = obj.map(function (item) {
                        var result = [];
                        result.push(item.genres_id);
                        result.push(item.genre);
                        return result;
                    });
                    myTablegen.rows.add(result); // add to DataTable instance
                    myTablegen.draw(); // always redraw
                }
            });
            myTab

        });
    </script>
</head>
<body>

<ul id="list">
    <li><button type="button" class="btn btn-secondary">Edit</button></li>
    <li><button type="button" class="btn btn-secondary">Delete</button></li>
</ul>


<h1>Genres:</h1><br>
<table  id="myTablegen">
    <thead>
    <tr>
        <th>Id</th>
        <th>Genre</th>
    </tr>
    </thead>

</table>
</body>
</html>