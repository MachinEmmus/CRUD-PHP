<?php 

    include("db.php");

    if (isset($_GET['Id'])) {
        $id = $_GET['Id'];

        $query = "DELETE FROM task WHERE Id = $id";
        $result = mysqli_query($conection, $query);
        if (!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Task Removed Successfully';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");

    }
?>