<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 27.09.2016
 * Time: 18:58
 */
session_start();
include('../database/database.php');
include('../api/boatModel.php');

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();

    header('location: ../index.php');
}

//Si la session est valide on affiche tout le contenu de la page
//La page n'affiche que les bateaux appartenant à l'utilisateur
if (isset($_SESSION['valid'])) {

    $userid = $_SESSION['user_id'];
    $bm = new BoatModel();
    $result = $bm->getBoatsList($userid);

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel='stylesheet prefetch' href='../sources/bootstrap-3.3.7-dist/css/bootstrap.min.css'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../sources/DataTables-1.10.12/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="../sources/style.css">
        <title>Logged in</title>
    </head>
    <body>

    <div class="disconnect">
        <form method="post" name="logout">
            <button type="submit" name="logout" value="logout" class="btn btn btn-link">Logout</button>
        </form>
    </div>

    <div class="session">
        <p><?php echo 'WELCOME ' . $_SESSION['username'] . ' |'; ?></p>
    </div>

    <div class="main-block">
        <div class="container">
            <h2>Insert a boat</h2>

            <form id="insert_form_id" class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="name"></label>
                    <input class="form-control" id="name" placeholder="name"/>
                </div>
                <div class="form-group">
                    <label for="type" style="display: none"></label>
                    <select class="form-control" id="type">
                        <option>Catamaran</option>
                        <option>Cabin cruiser</option>
                        <option>Fishing boat</option>
                        <option>Langschiff</option>
                        <option>Dragon boat</option>
                        <option>Hovercraft</option>
                        <option>Luxury yacht</option>
                        <option>Motorboat</option>
                    </select>
                </div>
                <input type="submit" value="Click me" class="btn btn-default" />
            </form>
        </div>

        <div class="container">
            <h2>Boats List</h2>
            <table id="boats_table" class="table table-hover">
                <thead>
                <tr>
                    <th>Boat ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                <?php

                foreach ($result as $k => $v) {

                    echo '<tr id="' . $v['id_boat'] . '">';
                    echo '<td>' . $v['id_boat'] . '</td>';
                    echo '<td>' . $v['name'] . '</td>';
                    echo '<td>' . $v['type'] . '</td>';
                    echo '<td><button class="delete_boat btn btn-danger">delete</button></td>';
                    echo '</tr>';
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>

    </body>
    </html>

    <?php
}
?>

<script src="../sources/jquery-3.1.1.min.js"></script>
<script src="../sources/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
<script>

    //Datatables
    $(document).ready(function () {
        $('#boats_table').DataTable({
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "pageLength": 10,
            "bAutoWidth": false,
            "order": [[0, "desc"]]
        });

        //Jquery pour insertion, suppression des bateaux   
        $(document).on('click', '.delete_boat', function () {

            var sure = confirm("Are you sure that you want to delete this record ?");
            if (sure) {
                var idrow = $(this).parent().parent().attr('id');


                $.ajax({
                    url: '../api/apiHook.php',
                    type: 'POST',
                    data: {
                        delete_status: 'yes',
                        id: idrow
                    },
                    success: function () {

                        location.reload(true);

                    }
                });
            }
            else {
                return false;
            }

        });


        $("#insert_form_id").submit(function () {

            var name = $("#name").val();
            var type = $("#type").find(":selected").text();

            if (name == '') {
                alert('Enter a name');
                return false
            }

            $.ajax({
                url: '../api/apiHook.php',
                type: 'POST',
                data: {
                    insert_status: 'yes',
                    name: name,
                    type: type
                },
                success: function () {

                    location.reload(true);


                }
            });
        });

    });

</script>

