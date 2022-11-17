<html>
    <head>    
        <title>ZySyPy-SZOP_login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form  method="POST" action="login.php">
            <h2>LOGIN</h2>
            <label>Email</label>    
            <input type="text" name="Email" id="Email" placeholder="Email"><br>
            <label>Password</label>
            <input type="password" name="Pass" id="Pass"placeholder="Pass"><br> 
            <button type="submit">Login</button>
            <?php
                $con = new mysqli('localhost','root','','zsp-szop')
            ?>
        </form>
    </body>
</html>