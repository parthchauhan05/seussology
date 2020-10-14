<?php require_once "db.php"; ?>

<?php include_once 'header.php'; ?>

<?php 
if(isset($_GET['id'])){
    include_once 'book.php';
}

else { ?>
    <?php include_once 'navigation.php'; ?>
    <?php 
        $sql = "SELECT * FROM `books`";
        $books = $db->query($sql)->fetchAll();   
    ?>
    <div class="row py-2">
        <div class="col"></div>
        <div class="col-md-6">
            <form action="search.php" method="get">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="query">
            </form>
        </div>
        <div class="col"></div>
    </div>
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
    </div>          
<?php }?>
<?php include_once 'footer.php';?>