<html>
    <head>    
        <meta charset="UTF-8">
        <title>ZySyPy-SZOP-main</title>
    </head>
    <body>
        <table style="width=auto;background-color:teal;border:5px solid #000;">
                <tr>
                    <td style="padding-right: 50px">
                        <h2><a href="list.php">My offers</a></h2>
                    </td>
                    <td>
                        <h2><a href="index.php">Log out</a></h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1>Offers</h1>
                        <?php
                        $con = new mysqli('localhost','root','','zsp-szop');
                        session_start();
                        $li = 'SELECT offers.offer_name, offers.price, offers.description from offers JOIN users ON offers.user_id=users.id WHERE offers.id NOT IN (SELECT offer_id FROM orders) AND users.email!="'.$_SESSION["user_email"].'";';
                        $result = $con -> query($li);
                        $list = $result -> fetch_all(MYSQLI_ASSOC);
                        for ($i=0; $i<count($list);$i++){
                            echo $list[$i]["offer_name"].'&nbsp';
                            echo $list[$i]["price"].'<br> <br>';
                        };
                        ?>
                    </td>
                </tr>
            </table>
    </body>
</html>