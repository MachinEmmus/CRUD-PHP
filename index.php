<?php
    include("db.php")
?>
    <?php include("includes/header.php")
    
    
    ?>
        
        <div class="container p-4">

            <div class="row">
            
                <div class="col-md-4">

                    <?php if (isset($_SESSION['message'])){ ?>
                        <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>        

                    <?php session_unset();} ?>

                    <div class="card card-body">
                        <form action="savetask.php" method="POST">
                            <div class="Form-group">
                                <input type="text" name="title" class="form-control"
                                placeholder="Task Title" autofocus>
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="2" class="form-control"
                                placeholder="Task Description"></textarea>
                            </div>
                            <input type="submit" class="btn btn-success btn-block"
                            name="save_task" value="Save Task">
                        </form>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM task";
                                $result_task = mysqli_query($conection, $query);

                                while ($row = mysqli_fetch_array($result_task)) { ?>
                                    <tr>
                                        <td><?php echo $row['Title'] ?></td>
                                        <td><?php echo $row['Description'] ?></td>
                                        <td><?php echo $row['CreateDate'] ?></td>
                                        <td>
                                            <a href="edittask.php?Id=<?php echo $row['Id']?>" class="btn btn-secondary">
                                                <i class="fas fa-marker"></i>
                                            </a>
                                            <a href="deletetask.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">
                                                <i class ="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    
                                    </tr>

                                <?php } ?> 
                                
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

<?php include("includes/footer.php")?>
       