<?php
require_once("../config.php");

$deletingUsers = $_POST['userToDelete'];
if(!empty($deletingUsers))
{
    foreach($deletingUsers as $i){
        $dbConn->exec("DELETE FROM users WHERE id=" . $i);
    }
}
$aDoor = $_POST['comment'];
if(!empty($aDoor))
{
    foreach($aDoor as $i){
        $dbConn->exec("DELETE FROM comments WHERE id=" . $i);
    }
}

$stmt = $dbConn->prepare("SELECT * FROM users WHERE admin=0");
$stmt->execute();
$realUsers = $stmt->fetchAll();



$stmt = $dbConn->prepare("SELECT * FROM comments ORDER BY id DESC");
$stmt->execute();
$comments = $stmt->fetchAll();

$stmt = $dbConn->prepare("SELECT username, id FROM users");
$stmt->execute();
$users1 = $stmt->fetchAll();
$userid_comment = [];
foreach($users1 as $i)
{
	$userid_comment[$i['id']] = $i['username'];
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Admin Panel AA</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.gif" type="image/gif">
    <style>
        .block{
            width: 40%;
            display: inline-block;
        }
        .block div{
            background: rgba(0,0,0,0.1);

        }
        body{
            margin: 30px;
        }
    </style>
</head>

<body style="background: grey">
    <h1>Admin Panel   <a style="font-size: 15pt" href="../index.php">Come back</a></h1>
    <hr />
    <div>
        <form class="block" method="POST">
            <h2>Users:</h2>
            <?php
    	    foreach($realUsers as $u)
    	    {
                echo '<div>
                <span style="font-size: 20pt; background: red">' . $u['username'] . ':</span>
    	    				<span style="font-size: 15pt">' . $u['first_name']. '</span>
    	    				<span style="font-size: 15pt">' . $u['last_name'] . '</span>
                            <span style="font-size: 10pt; color: yellow">' . $u['email'] . '</span>
                            <input style="zoom: 2" type="checkbox" name="userToDelete[]" value="'.$u['id'].'"/>
                      </div>';
            }
            ?>
            <div style="height: 20px"></div>
            <input type="submit" value="delete" name="deleteUser">
        </form>
        <form class="block" method="POST">
            <h2>Comments:</h2>
            <?php
    	    foreach($comments as $comment)
    	    {
                echo '<div>
                <span style="font-size: 20pt; background: red">' . $userid_comment[$comment['user_id']] . ':</span>
    	    				<span style="font-size: 15pt">' . $comment['comment'] . '</span>
                            <span style="font-size: 10pt; color: yellow">' . $comment['created_at'] . '</span>
                            <input style="zoom: 2" type="checkbox" name="comment[]" value="'.$comment['id'].'"/>
                      </div>';
                    }
                    ?>
            <div style="height: 20px"></div>
            <input type="submit" value="delete" name="delete">
        </form>
    </div>
</body>

</html>