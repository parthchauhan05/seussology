<?php 

    require_once 'db.php';
    
    $sql = "DELETE FROM `quotes` WHERE `book_id` = ?";
    $param = array($_GET['id']);
    $stmt = $db->prepare($sql);
    $stmt->execute($param);

    $sql = "DELETE FROM `books` WHERE `book_id` = ?";
    $param = array($_GET['id']);
    $stmt = $db->prepare($sql);
    $stmt->execute($param);

    header('Location: '. 'index.php');

?>