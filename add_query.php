<?php
    require_once 'db.php';

    $title = $_POST['book_title'];
    $title_sort = $_POST['book_title_sort'];
    $description = $_POST['book_description'];
    $year = $_POST['book_year'];
    $pages = $_POST['book_pages'];
    if(empty($year)){
        $year = null;
    }
    if(empty($title_sort)){
        $title_sort = null;
    }
    if(empty($description)){
        $description = null;
    }
    if(empty($pages)){
        $pages = null;
    }

    if(!empty($year) && !intval($year)){
        echo "<script type='text/javascript'>alert('Book Year must be decimal.')</script>";
    } else if(!empty($pages) && !intval($pages)){
        echo "<script type='text/javascript'>alert('Book Pages must be decimal.')</script>";
    } else {
        if(!empty($year)){
            $year=intval($year);
        }
        if(!empty($pages)){
            $pages = intval($pages);
        }
        $sql = "INSERT INTO `books`(`book_title`, `book_title_sort`, `book_year`, `book_description`, `book_pages`) VALUES (?,?,?,?,?)";
        $param = array($title, $title_sort, $year, $description, $pages);
        $stmt = $db->prepare($sql);
        $stmt->execute($param);
    }
    $sql = "SELECT * FROM `books`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll();
    $id = count($books);
    header('Location: '. 'index.php?id='.$id);
?>