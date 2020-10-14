<?php 
    require_once "db.php"; 

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM `books` WHERE `book_id` = ".$_GET['id'];
        $book = $db->query($sql)->fetch();    
    } else {
        header('Location: '. 'index.php');
    }
    

   $update = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['book_title'])){
            echo "<script type='text/javascript'>alert('Book Title Required')</script>";
            $update=false;
        }

        if (!empty($_POST['book_year']) && strlen((string)$_POST['book_year']) != 4){
            echo "<script type='text/javascript'>alert('Book Year must be 4 digit.')</script>";
            $update=false;
        }
    }

    if(isset($_POST['update'])){
        if($update){
            include_once 'update_query.php';
        }
    }

    if(isset($_POST['delete'])){
         include_once 'delete.php';
    }    

?>
<?php include_once 'header.php'; ?>
<?php include_once 'navigation.php';?> 
<div class="row">
    <div class="col-md-10">
        <h1 class="font-weight-bold">Edit Book</h1>    
    </div>
    <div class="col-md-2">
        <a href=<?php echo './delete.php?id=' . $book['book_id']; ?>>
            <button type="submit" name="delete" class="btn btn-danger px-4 py-2" style="border-radius: 25px;">Delete Book</button>
        </a>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <form action="#" method="post">
            <label for="book_title" class="mb-0 py-1">Book Title</label>
            <input value="<?php echo $book['book_title'];?>" type="text" id="book_title" class="form-control" name="book_title">
            
            <label for="book_title_sort" class="mb-0 py-1">Book Title Sort</label>
            <input value="<?php echo $book['book_title_sort'];?>" type="text" id="book_title_sort" class="form-control" name="book_title_sort">
            
            <div class="row">
                <div class="col-md-6">
                    <label for="book_published_year" class="mb-0 py-1">Published Year</label>
                        <input value="<?php echo $book['book_year'] ?>" type="text" id="book_published_year" class="form-control" name="book_year">
                </div>
                <div class="col-md-6">
                    <label for="book_pages" class="mb-0 py-1">Book Pages</label>
                    <input value="<?php echo $book['book_pages']; ?>" type="text" id="book_pages" class="form-control" name="book_pages">
                </div>
            </div>
            
            <label for="book_description" class="mb-0 py-1" >Book Description</label>
            <textarea class="form-control rounded-0" id="book_description" rows=5 name="book_description"><?php echo $book['book_description']; ?></textarea>
            
            <button type="submit" name="update" class="btn btn-info px-4 py-2" style="border-radius: 25px;">Update Book</button>
        </form>
    </div>
</div>

<?php include_once 'footer.php'; ?>

