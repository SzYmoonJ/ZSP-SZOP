<html>
    <head>    
        <meta charset="UTF-8">
        <title>ZySyPy-SZOP-main</title>
    </head>
    <body>
        <table style="width=auto;background-color:teal;border:5px solid #000;">
                <tr>
                    <td style="border-bottom: solid black;">
                        <h2><a href="main.php" style="">Main</a></h2>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <?php
                        session_start();
                        $con = new mysqli('localhost','root','','zsp-szop');
                        $li = 'SELECT offers.id, offers.offer_name, offers.price, offers.description FROM offers JOIN users ON offers.user_id=users.id WHERE users.email="'.$_SESSION["user_email"].'"';
                        $result = $con -> query($li);
                        $list = $result -> fetch_all(MYSQLI_ASSOC);
                        for ($i=0; $i<count($list);$i++){
                            echo "Id:".'&nbsp'.$list[$i]["id"].'&nbsp';
                            echo $list[$i]["offer_name"].'&nbsp';
                            echo $list[$i]["price"].'&nbsp';
                            echo '<b><a href="edit.php">Edit</a></b><br>';
                            echo "Description:".'&nbsp'.$list[$i]["description"].'<br> <br>';
                        };
                        ?>
                    </td>
                </tr>
        </table>
    </body>
</html>