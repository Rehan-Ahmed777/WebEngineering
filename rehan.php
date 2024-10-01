<?php 
    $con = mysqli_connect('localhost', 'root', '', 'webapp');

    if (!$con) {
        echo "<h2>Connection Failed</h2><br>";
    }
    
    if (isset($_POST['register'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        if(empty($user) || empty($pass)){
            echo "<script> alert('please fill all fields...');</script>";
        }
        
    
        $query = "INSERT INTO user (username, password) VALUES ('$user', '$pass')";
    
        $trigger = mysqli_query($con, $query);
    
        if ($trigger) {
            $message = "<span style='color:green;'>Signup successful!</span>";
        }
        // } else {
        //     return {'msg':'Registeration failed!'};
        // }
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Login</h2>
        <input type="text" placeholder="username" id="username" name="username" required>
        <input type="password" placeholder="password" id="password" name="password" required>
        <div class="buttons">
            <button type="submit" name="register">Sign Up</button>

        </div>
    </form>
    <br>

    <table>
        <tr>
        <th>Resigtration Number</th>
        <th>Student Name</th>
        </tr>
        
        <?php
        $qr = "select * from user";
        $re = mysqli_query($con,$qr);
        while($data = mysqli_fetch_assoc($re)){
            echo '<tr>
            <td> '.$data['id'].' </td>
            <td> '.$data['username'].'</td>
             </tr>';
        }
        ?>
    </table>

</body>
</html>