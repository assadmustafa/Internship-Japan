<?php
require '../../../connection.php';
/** @var PDO $db */
$user_id = intval($_GET['id']);
$sql = 'DELETE FROM intern WHERE user_id=:user_id';
$statement = $db->prepare($sql);
if ($statement->execute([':user_id' => $user_id])) {
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}