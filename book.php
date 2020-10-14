<?php 
  $sql = "SELECT * FROM `books` WHERE `book_id` = ".$_GET['id'];
  $book = $db->query($sql)->fetch();
  $sql = "SELECT * FROM `quotes` WHERE `book_id` = ".$book['book_id'];
  $quotes = $db->query($sql)->fetchAll();
?>
<?php include_once 'header.php';?>
<?php include_once 'navigation.php'; ?>
<div class="container my-3 py-5 z-depth-1">
  <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
    <h1 class="font-weight-bold"><?php echo $book['book_title'];?></h1>
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="view overlay z-depth-1-half">
          <?php if($book['book_image']) { ?>
            <img class="card-img-top" src=<?php echo "./book-covers/" . $book['book_image']; ?> alt="<?php echo $book['book_title'];?>">
            <div class="mask rgba-white-slight"></div>
          <?php } else {?>
            <div class="row">
              <h5 class="text-center fixed-height fixed-lh col p-2"><?php echo $book['book_title']; ?></h5>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-8 mb-4 mb-md-0">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h3 class="font-weight-bold">About the book</h3>
            </div>
            <div class="col-md-4">  
              <a href="<?php echo './edit.php?id=' . $book['book_id']; ?>">
                <button type="submit" name="edit" class="btn btn-warning px-4 py-2" style="border-radius: 25px;"><i class="fas fa-edit" aria-hidden="false"></i>Edit</button>
              </a>
            </div>
          </div>
        </div>
        <p><?php echo $book['book_description'];?></p>
        <div class="container">
          <div class="row">
            <p class="col-md-6"><span class="font-weight-bold">Published:</span> <?php echo $book['book_year'];?></p>
            <?php if($book['book_pages']) {?>
              <p class="col-md-6"><span class="font-weight-bold">Pages:</span> <?php echo $book['book_pages'];?></p>
            <?php } ?>
          </div>
        </div>
        <?php if(!empty($quotes)) { ?>
          <h3 class="font-weight-bold">Book Quotes</h3>    
          <?php foreach ($quotes as $quote) :?>
            <p class="note note-success"><em><?php echo $quote['quote'];?></em></p>
          <?php endforeach?>
        <?php }?>
      </div> 
    </div>
  </section>
</div>
  