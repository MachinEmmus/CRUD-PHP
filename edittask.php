<?php

    include("db.php");

    if(isset($_GET['Id'])){
        $id = $_GET['Id'];

        $query = "SELECT * FROM task WHERE Id = $id";
        $result = mysqli_query($conection, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['Title'];
            $description = $row['Description'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['Id'];
        $title = $_POST['Title'];
        $description = $_POST['Description'];

        $query = "UPDATE task set Title = '$title', Description = '$description' WHERE Id = $id";
        mysqli_query($conection, $query);
        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'dark';
        header("Location: index.php");
    }

?>

<?php include("includes/header.php") ?>

    <div class="cointainer p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edittask.php?Id=<?php echo $_GET['Id']; ?>" method="POST"> 
                        <div class="form-group">
                            <input type="text" name="Title" value="<?php echo $title; ?>"
                            class="form-control" placeholder="Update Title">                        
                        </div>
                        <div>
                            <textarea name="Description" rows="2" class="form-control"
                            placeholder="Update Description"><?php echo $description; ?></textarea>
                        </div>
                        <button class="btn btn-success" name="update" >
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php") ?>