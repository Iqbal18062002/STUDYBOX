<?php
include('config.php');

$id = $_GET['id'];

if (isset($_REQUEST['button'])) {
    $fullname = $_REQUEST['Full_name'];
    $ordered = $_REQUEST['Stock_Ordered'];
    $alamat = $_REQUEST['Alamat'];

    $queryUpdateUser =
        "UPDATE 
            daftar_order
            SET  
                Full_Name = '$fullname', 
                Stock_Ordered = '$ordered',
                Alamat = '$alamat' 
            WHERE id = '$id'";
    $updateUser = mysqli_query($connection, $queryUpdateUser) or die(mysqli_error(($connection)));
    if ($updateUser) {
        echo "
            <script>
                alert('Successfully updated')
                window.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Failed updated')
            </script>
            ";
    }
}

$query = "SELECT * FROM daftar_order WHERE id = '$id'";
$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
$user = mysqli_fetch_assoc($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Edit Your Submission</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card mb-5 p-5">
            <form method="POST">
                <div class="form-group">
                    <label>Stock_Ordered</label>
                    <input type="text" name="Stock_Ordered" class="form-control" value="<?= $user['Stock_Ordered'] ?>">
                </div>
                <div class="form-group">
                    <label>Full Name </label>
                    <input type="text" name="Full_name" class="form-control" value="<?= $user['Full_Name'] ?>">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="Alamat" class="form-control" value="<?= $user['Alamat'] ?>">
                </div>
                <button type="submit" name="button" class="btn btn-success btn-block">Update</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>