<?php
include('config.php');

$id = $_GET['id'];

    $DeleteDATADB =
    "DELETE FROM 
        daftar_order
        WHERE id = '$id'";
$DeleteGo = mysqli_query($connection, $DeleteDATADB) or die(mysqli_error(($connection)));
if ($DeleteGo) {
    echo "
        <script>
            alert('Successfully Deleted')
            window.location.href = 'index.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Failed to Delete your submission')
        </script>
        ";
}


?>
<!doctype html>
<html lang="en">
    <head></head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
</html>