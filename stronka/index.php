<html>
    <head>    
        <title>ZySyPy-SZOP_login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form  method="POST">
            <h2>LOGIN</h2>
            <label>Email</label>    
            <input type="text" name="email" id="email" placeholder="Email"><br>
            <label>Password</label>
            <input type="password" name="pass" id="pass"placeholder="Pass"><br> 
            <button type="submit">Login</button>
         </form>
        <?php
            $con = new mysqli('localhost','root','','zsp-szop');
            if (isset($_POST["email"]) && isset($_POST["pass"])){
                $q="SELECT * FROM users WHERE email='".$_POST["email"]."'";
                $res=$con->query($q);
                $user=$res->fetch_all(MYSQLI_ASSOC);
                $session_name="user1";
                if (count($user)>0){
                    $b="SELECT id FROM users WHERE email='".$_POST["email"]."'";
                    $result = $con->query($b);
                    $id=$result->fetch_assoc();
                    '<input type="hidden" name="varname" value="$id">';
                    session_start();
                    $_SESSION["loged"] = "$id";
                    header("Location:main.php");
                };
            };
        ?>
    </body>
</html>