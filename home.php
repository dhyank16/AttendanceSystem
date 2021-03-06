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
        ?>
     <div class="container">
        <h2 class="alert alert-primary">Attendance Records</h2>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="month" name="month" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="form-control" type="number" name="roll_no" placeholder = "Enter Roll Number" required>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="submit" value="Show Attendance Records">
                </form>
            </div>
        </div>
        <div class="row">
            <?php
                if(isset($_POST['submit']))
                {
                    $month = $_POST['month'];
                    $m = date("m",strtotime($month));
                    $y = date("Y",strtotime($month));
                    $roll_no = $_POST['roll_no'];
                    $total = 0; 
                    $present = 0;

                    $sql = "SELECT * from student where roll_no = '$roll_no'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                        
                    if($count == 0)
                    {
                        echo "<div class='alert alert-danger'>Roll Number not found</div>";
                    }
                    else
                    {
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['full_name'];

                        $sql1 = "SELECT * from attendance where roll_no = '$roll_no' and MONTH(date)=$m and YEAR(date)=$y ";
                        $result1 = mysqli_query($conn, $sql1);
                        while($row1 = mysqli_fetch_assoc($result1))
                        {
                            $total = $total + 1;
                            if($row1['status']==1)
                            {
                                $present = $present + 1;
                            }
                        }
                        echo "<table class='table'><tr>
                            <th>Month</th>
                            <th>Name</th>
                            <th>Total Days</th>
                            <th>Days Present</th>
                            <th>Days Absent</th>
                            </tr>";
                            echo "<tr><td>" . $month . "</td><td>" . $name . "</td><td>" . $total . "</td><td>" . $present . "</td><td>" . $total - $present . "</td></tr>";
                    }
                }
            ?>
        </div>
    </div>
    </body>
    </html>

