<html>
    <head>
    <meta charset="UTF-08">
    <title>ZySyPy-SZOP-register</title>
    </head>
    <body>
        <form  method="POST">
            <table style="width=auto;background-color:teal;border:5px solid #000;">
                <tr>
                    <td>
                        <h2>REGISTER</h2>
                    </td>
                    <td>
                        <h2><a href="index.php">LOGIN</a></h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>    
                        <input type="text" name="email" id="email" placeholder="Email"><br>
                        <label>Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password"><br> 
                        <label>Repeat password</label>
                        <input type="password" name="rpass" id="rpass" placeholder="Repeat Password"><br>
                        <button type="submit">SING UP</button>
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            $con = new mysqli('localhost','root','','zsp-szop');
            if (isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["rpass"])){
                $t="SELECT id FROM users WHERE email='".$_POST["email"]."'";
                $result=$con->query($t);
                $id=$result->fetch_all(MYSQLI_ASSOC);
                if (count($id)==0){
                   if ($_POST["pass"]==$_POST["rpass"]){
                       $add="INSERT INTO users(`email`, `password`, `is_admin`) VALUES ('".$_POST["email"]."','".$_POST["pass"]."','0')";
                       $con->query($add);
                       header("location:index.php");
                   }else{
                     print("Passwords are not the same");
                   };
               }else{
                    print("Email already exist");
                }
            };
        ?>
    </body>
</html>