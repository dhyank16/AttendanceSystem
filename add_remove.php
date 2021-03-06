<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="icon" href="imgs/favicon.jpg" type="image/ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            body{background: linear-gradient(90deg, rgba(159,207,231,1) 0%, rgba(199,228,234,1) 63%, rgba(187,171,234,1) 100%);}
            .col{padding: 50px;}
            img{
                min-width: 400px;
                border-radius: 10px;
            }
            input{margin: 10px;}
            .container{
                border: 1px solid darkblue;
                border-radius: 20px;
                padding: 30px;
            }
        </style>
    </head>
<body>
    <?php
        include('navbar.php');
        include('db_connect.php');
        if(!isset($_SESSION['login_user'])){
            header("location: login.php");
        }
        if(isset($_POST['submit_add'])) 
        {
            $name = $_POST['name'];
            $division = $_POST['division']; 

            $sql = "INSERT INTO student (full_name, division) VALUES ('$name','$division')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "<div class='alert alert-success'>Success! Student Added</div>";
            } 
            else {
                echo "<div class='alert alert-danger'>Student Not Added!".mysqli_error($conn)."</div>";
            }
            
        }

        if(isset($_POST['confirm_delete'])) 
        {
            $rollno = $_POST['roll_no'];
            $sql1 = "DELETE FROM student where roll_no = '$rollno'";
            $result = mysqli_query($conn, $sql1);

            if($result){
                echo "<div class='alert alert-success'>Student Records Succesfully Deleted</div>";
            } 
            else {
                echo "<div class='alert alert-danger'>Student Records Not Deleted".mysqli_error($conn)."</div>";
            }  
        }
    ?>
    
    <div class="container">
        <h2 class="alert alert-primary">Add Student</h2>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <input autofocus class="form-control" type="text" name="name" placeholder="Enter Student Name" required>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="division" value="A" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">Division A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="division" value="B" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Division B</label>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="submit_add" value="Add Student">
                </form>
            </div>
        </div>
        <h2 class="alert alert-primary">Remove Student</h2>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <input autofocus class="form-control" type="number" name="roll_no" placeholder="Enter Roll Number" required>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="submit_remove" value="Remove Student">
                </form>
            </div>
            <?php
                if(isset($_POST['submit_remove'])) 
                {
                    $rollno = $_POST['roll_no'];
                    $sql = "SELECT * from student where roll_no = '$rollno'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                        
                    if($count == 0)
                    {
                        echo "<div class='alert alert-danger'>Roll Number not found</div>";
                    }
                    else 
                    {
                        $row = mysqli_fetch_assoc($result);
                        echo "<table class='table'><tr>
                        <th>Roll Number</th>
                        <th>Name</th>
                        <th>Division</th></tr>";

                        echo "<tr><td>" . $row['roll_no'] . "</td><td>" . $row['full_name'] . "</td><td>" . $row['division'] . "</td></tr>";
                        echo "</table>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='roll_no' value = '".$row['roll_no']."'>";
                        echo "<input class='btn btn-danger' type='submit' name='confirm_delete' value='Confirm Delete'>";
                        echo "</form>";
                    }
                }
            ?>
        </div>
    </div>
<body>
</html>