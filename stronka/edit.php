<html>
    <head>
        <meta charset="UTF-8">
        <title>ZySyPy-SZOP-edit</title>
    </head>
    <body>
        <table style="width=auto;background-color:teal;border:5px solid #000;">
            <tr>
                <td>
                    <h2>Edit<h2>
                </td>
                <td>
                    <h2><a href="main.php" style="">Main</a></h2>
                </td>
                <td>
                    <h2>Your offers</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-right: solid black">
                    <form method="POST">
                        <label>Id of offer you want to change:</label>
                        <input type="int" placeholder="Offer ID" name="offer_id" id="offer_id"><br>
                        <label>Name</label>
                        <input type="text" placeholder="New offer name" name="offer_name" id="offer_name"><br>
                        <label>Description</label>
                        <input type="text" placeholder="New offer description" name="offer_description" id="offer_description"><br>
                        <label>Price</label>
                        <input type="int" placeholder="New offer price" name="offer_price" id="offer_price"><br>
                        <button type="submit">Submit edit</button>
                    </form>
                    <?php
                    $con = new mysqli('localhost','root','','zsp-szop');
                    session_start();
                    if (isset($_POST["offer_id"])){
                        $t = "SELECT id FROM offers WHERE id='".$_POST["offer_id"]."' ";
                        $result = $con->query($t);
                        $id = $result->fetch_all(MYSQLI_ASSOC);
                            if (count($id)>0){
                                $p = "UPDATE offers SET offers.id='".$_POST["offer_id"]."', offers.offer_name='".$_POST["offer_name"]."' ,offers.description='".$_POST["offer_description"]."',offers.price='".$_POST["offer_price"]."' WHERE offers.id='".$_POST["offer_id"]."'";
                                $con -> query($p);
                                header("Refresh:0");
                            }
                            else{
                                print("This offer doesn't exist");
                            };
                    };
                    ?>
                </td>
                <td>
                    <?php
                        $con = new mysqli('localhost','root','','zsp-szop');
                        $li = 'SELECT offers.id, offers.offer_name, offers.price, offers.description FROM offers JOIN users ON offers.user_id=users.id WHERE users.email="'.$_SESSION["user_email"].'"';
                        $result = $con -> query($li);
                        $list = $result -> fetch_all(MYSQLI_ASSOC);
                        for ($i=0; $i<count($list);$i++){
                            echo "Id:".'&nbsp'.$list[$i]["id"].'&nbsp';
                            echo $list[$i]["offer_name"].'&nbsp';
                            echo $list[$i]["price"].'<br> <br>';
                        }
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>