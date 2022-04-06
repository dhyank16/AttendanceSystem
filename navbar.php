<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="navbar.css" rel="stylesheet">
<div class="nav flexbox navbg">
    <li class="nav-item">
        <a class="nav-link" href="home.php">Attendance Portal</a>
    </li>
    <?php
        require("db_connect.php");
        session_start();
        if(isset($_SESSION['login_user'])){
            $usr = $_SESSION['login_user'];
            echo '
                <li class="nav-item">
                    <a class="nav-link" href="markatt.php"> Mark Attendance</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="add_remove.php"> Add/Remove Student</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a></li>';
        }
        else{
            echo '
            <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a></li>';
        }
    ?>
</div>