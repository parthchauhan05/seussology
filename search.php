<?php 
    require_once 'db.php';
    $sql = "SELECT * FROM `books` WHERE `book_title` LIKE ? OR `book_description` LIKE ?;";
    $param = array("%".$_GET['query']."%", "%".$_GET['query']."%");
    $stmt = $db->prepare($sql);
    $stmt->execute($param);
    $books = $stmt->fetchAll();
?>
<?php include_once 'header.php';?>
<?php include_once 'navigation.php'; ?>
<div class="row py-2">
        <div class="col"></div>
        <div class="col-md-6">
            <form action="search.php" method="get">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="query" value=<?php echo $_GET['query']; ?>>
            </form>
        </div>
        <div class="col"></div>
    </div>

    <?php if(count($books)>0) {?>
    <div class="row">
        <?php foreach ($books as $book) : ?>
            <div class="col-md-2 py-3 px-3">
                <a href="<?php echo '?id=' . $book['book_id']?>">
                    <div class="card">
                        <div class="view">
                            <?php if($book['book_image']) { ?>
                            <img class="card-img-top" src=<?php echo "./book-covers/" . $book['book_image']; ?> alt="<?php echo $book['book_title'];?>">
                            <div class="mask rgba-white-slight"></div>
                            <?php } else { ?>
                            <h5 class="text-center fixed-height p-2"><?php echo $book['book_title']; }?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach;?>
                            <?php } else { echo "<p class='text-center'>No Result Found</p>"; }?>
    </div>          
<?php include_once 'footer.php';?>