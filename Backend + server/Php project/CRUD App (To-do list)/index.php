<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP CRUD</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php require_once 'process.php'; ?>

    <?php if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
            ?>
    </div>
    <?php endif; ?>
    <div class="container">

        <?php
   $mysqli = new mysqli('localhost','root','','crud')
     or die(mysqli_error($mysqli));

    $result = $mysqli->query("SELECT * FROM data")
    or die($mysqli->error);
        
        // //pre_r($result);
        // pre_r($result->fetch_assoc());
    ?>

        <div class="row justify-content-center" style="background-color: #F9E6F0; margin-top: 1%;">
            <table class="table">

                <head>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Location</b></th>
                        <th colspan="2"><b>Action</b></th>
                    </tr>
                </head>

                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                <?php endwhile; ?>

            </table>
        </div>


        <?php
      function pre_r( $array ) {
          echo '<pre>';
          print_r($array);
          echo '</pre>';
      }

    ?>

        <div class="row justify-content-center"  style="padding: 10%; background-color: #edf7e8;">
            <form action="process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"
                        placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="Location"><b>Location</b></label>
                    <input type="text" name="location" class="form-control" value="<?php echo $location; ?>"
                        placeholder="Enter Your Location">
                </div>
                <div class="form-group">
                    <?php if ($update == true): ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
               <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
               <?php endif ?>

                </div>
            </form>
        </div>
    </div>
</body>

</html>