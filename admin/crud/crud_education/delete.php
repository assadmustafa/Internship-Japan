<?php

/** @var PDO $db */

require '../../../connection.php';

$user_id = intval($_GET['id']);
$sql = 'DELETE FROM education WHERE user_id=:user_id';
$statement = $db->prepare($sql);
if ($statement->execute([':user_id' => $user_id])) {
    header("Location: index.php");
}