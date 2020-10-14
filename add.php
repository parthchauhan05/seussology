<?php 
    require_once "db.php";    

    $add=true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['book_title'])){
                echo "<script type='text/javascript'>alert('Book Title Required')</script>";
                $add=false;
            }
    
            if (!empty($_POST['book_year']) && strlen((string)$_POST['book_year']) != 4){
                echo "<script type='text/javascript'>alert('Book Year must be 4 digit.')</script>";
                $add=false;
            }
        }
    }

    if(isset($_POST['add'])){
        if($add){
            include_once 'add_query.php';
        }    
    }
?>
<?php include_once 'header.php';?>
<?php include_once 'navigation.php';?>
<h1 class="font-weight-bold">Add Book</h1>
<div class="card">
    <div class="card-body">
        <form action="#" method="post">
            <label for="book_title" class="mb-0 py-1">Book Title</label>
            <input type="text" id="book_title" class="form-control" name="book_title">
            
            <label for="book_title_sort" class="mb-0 py-1">Book Title Sort</label>
            <input type="text" id="book_title_sort" class="form-control" name="book_title_sort">
            
            <div class="row">
                <div class="col-md-6">
                    <label for="book_published_year" class="mb-0 py-1">Published Year</label>
                        <input type="text" id="book_published_year" class="form-control" name="book_year">
                </div>
                <div class="col-md-6">
                    <label for="book_pages" class="mb-0 py-1">Book Pages</label>
                    <input type="text" id="book_pages" class="form-control" name="book_pages">
                </div>
            </div>
            
            <label for="book_description" class="mb-0 py-1" >Book Description</label>
            <textarea class="form-control rounded-0" id="book_description" rows=5 name="book_description"></textarea>
            
            <button type="submit" name="add" class="btn btn-info px-4 py-2" style="border-radius: 25px;">Add Book</button>
        </form>
    </div>
</div><?php include_once 'footer.php';?>