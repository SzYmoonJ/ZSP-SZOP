<html>
    <head>    
        <title>ZySyPy-SZOP_login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form  method="POST">
            <table style="width=auto;background-color:teal;border:5px solid #000;">
                <tr>
                    <td style="padding-right: 50px">
                        <h2>LOGIN</h2>
                    </td>
                    <td>
                        <h2><a href="register.php" style="">SIGN UP</a></h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>    
                        <input type="text" name="email" id="email" placeholder="Email"><br>
                        <label>Password</label>
                        <input type="password" name="pass" id="pass"placeholder="Pass"><br> 
                        <button type="submit">Login</button>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            $con = new mysqli('localhost','root','','zsp-szop');
            session_start();
            if (isset($_POST["email"]) && isset($_POST["pass"])){
                $t="SELECT id FROM users WHERE email='".$_POST["email"]."' AND password='".$_POST["pass"]."'";
                $result=$con->query($t);
                $id=$result->fetch_all(MYSQLI_ASSOC);
                if (count($id)>0){
                        header("location:main.php");
                }
                else{
                        print("Nieprawidłowy login lub hasło");
                
                };
            };
        ?>
    </body>
</html>


                