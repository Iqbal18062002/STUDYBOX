<?php
include('config.php');
if (isset($_REQUEST['button'])) {
    $fullname = $_REQUEST['Full_Name'];
    $ordered = $_REQUEST['Stock_Ordered'];
    $alamat = $_REQUEST['Alamat'];

    $queryInsertUser =
        "INSERT INTO 
            daftar_order (Full_Name, Stock_Ordered, Alamat)
        VALUES 
            ('$fullname', '$ordered', '$alamat')";
    $insertUser = mysqli_query($connection, $queryInsertUser) or die(mysqli_error(($connection)));
    if ($insertUser) {
        echo "
            <script>
                alert('Successfully added')
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Failed added')
            </script>
            ";
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" href="cssproject.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <title>Pre-Order Regiment Laptop</title>
    </head>

    <body>
    <div class="split left">
        <div class="centered">
            <img src="pexels-karsten-madsen-18105.jpg" alt="Avatar woman">
            <h1>ALTECH KATANA 17</h1>
            <h2 class="preorder-fonts">PRE ORDER THIS INCREDIBLE LAPTOP NOW!!</h2>
            <h2 class="preorder-fonts">ONLY $200</h2>
            <p class="preorder-keterangan">Cash On-Delivery Payment. We accept orders only in Indonesia.</p>
            <p class="preorder-keterangan">Any submission from outside of Indonesia will be ignored</p>
        </div>
    </div>

    <div class="split right">
        <div class="centered">
            <div>
            <form method="POST">
                <div class="form-group">
                    <label>Full Name </label>
                    <input type="text" name="Full_Name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Stock Ordered</label>
                    <input type="text" name="Stock_Ordered" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address </label>
                    <input type="text" name="Alamat" class="form-control">
                </div>
                <button type="submit" name="button" class="btn btn-primary">Submit</button>
            </form>
            </div>
            <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Full Name</th>
                        <th>Ordered</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getUser = "SELECT * FROM daftar_order";
                    $sql = mysqli_query($connection, $getUser) or die(mysqli_error($connection));
                    $no = 1;
                    while ($user = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['Full_Name'] ?></td>
                            <td><?= $user['Stock_Ordered'] ?></td>
                            <td><?= $user['Alamat'] ?></td> 
                            <td>
                                <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="Delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>