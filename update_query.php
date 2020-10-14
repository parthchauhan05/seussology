<?php
    require_once 'db.php';

    $title = $_POST['book_title'];
    $title_sort = $_POST['book_title_sort'];
    $description = $_POST['book_description'];
    $year = $_POST['book_year'];
    $pages = $_POST['book_pages'];
    $id = $_GET['id'];

    if(!intval($year)){
        echo "<script type='text/javascript'>alert('Book Year must be decimal.')</script>";
    }

    if(!intval($pages)){
        echo "<script type='text/javascript'>alert('Book Pages must be decimal.')</script>";
    }
    $year=intval($year);
    $pages = intval($pages);
    $sql = "UPDATE `books` SET `book_title`=?,`book_title_sort`=?,`book_year`=?,`book_description`=?,`book_pages`=? WHERE `book_id`=?";
    $param = array($title, $title_sort, $year, $description, $pages, $id);
    $stmt = $db->prepare($sql);
    $stmt->execute($param);
    
    header('Location: '. 'index.php?id='.$id);
?>