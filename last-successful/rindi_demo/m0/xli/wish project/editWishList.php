<?php
session_start();
if (!array_key_exists("user", $_SESSION)) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wish List Application</title>
        <link href="wishlist.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>


        <?php
        echo "<h1>Hello " . $_SESSION['user'] . "</h1>";
        ?>


        <table class="std">
            <tr>
                <th>Item</th>
                <th>Due Date</th>
                <th colspan="3">&nbsp;</th>
            </tr>
            <?php
            require_once("Includes/db.php");

            $wisherID = WishDB::getInstance()->get_wisher_id_by_name($_SESSION['user']);
            $result = WishDB::getInstance()->get_wishes_by_wisher_id($wisherID);
            while ($row = mysqli_fetch_array($result)):
                echo "<tr><td>" . htmlentities($row['description']) . "</td>";
                echo "<td>" . htmlentities($row['due_date']) . "&nbsp;</td>";
                $wishID = $row['id'];
                //The loop is left open
                ?>
                <td>
                    <form name="editWish" action="editWish.php" method="GET">
                        <input type="hidden" name="wishID" value="<?php echo $wishID; ?>"/>
                        <input type="submit" name="editWish" value="Edit"/>
                    </form>
                </td>
                <td>
                    <form name="deleteWish" action="deleteWish.php" method="POST">
                        <input type="hidden" name="wishID" value="<?php echo $wishID; ?>"/>
                        <input type="submit" name="deleteWish" value="Delete"/>
                    </form>
                </td>
                <?php
                echo "</tr>\n";
            endwhile;
            mysqli_free_result($result);
            ?>
        </table>
        <form name="addNewWish" action="editWish.php">
            <input type="submit" value="Add Wish"/>
        </form>
        <form name="backToMainPage" action="index.php">
            <input type="submit" value="Back To Main Page"/>
        </form>
    </body>
</html>