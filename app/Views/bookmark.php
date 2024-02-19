<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteID</title>
    <link rel="stylesheet" href="assets/css/bookmark.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>
<body>
<?php echo view('includes/topmenu'); ?>
<br>
<center>
    <div class="carousel-container">
        <div class="owl-carousel owl-theme">
            <div class="item">
            <img src="assets/images/black-angus.jpg" alt="">
            </div>
            <div class="item">
                <img src="assets/images/food-steak-meat-soup.jpg" alt="">
            </div>
            <div class="item">
                <img src="assets/images/steak.jpg" alt="">
            </div>
        </div>
    </div>
    <section id="List-bookmark">
        <h1 class="title">Bookmark</h1>
        <div class="small-title">
            Resep yang anda simpan <br><br>
            <!-- <select name="" class="bookmark-category">
                <option value="1">Semua</option>
                <option value="2">Minuman</option>
                <option value="3">Makanan</option>
            </select> -->
        </div>
        <div class="row">
          <?php foreach($resep as $rsp){ ?>
            <div class="column" onclick="location.href = '<?= base_url('resep/view/'.$rsp['id_resep']) ?>'">
              <div class="card">
                  <div>
                  <img src="/assets/images/User/<?= $rsp["user"]["img_user"] ?>" alt="" class="profile-user">
                  <p class="profile-name"><?= $rsp["user"]["nama_user"] ?></p>
                  
                  <a class="bookmark" href="<?= base_url("bookmark/remove/".$rsp["id_resep"])?>"><i class="fa fa-bookmark"></i></a>
                </div>
                <img src="/assets/images/Resep/<?= $rsp["gambar_resep"] ?>" alt="" class="card-image">
                <p class="bookmark-title"><?= $rsp["nama_resep"] ?></p>
                <p class="bookmark-desc"><?= $rsp["detail_resep"] ?></p>
              </div>
            </div>
          <?php } ?>
    </section>
    
</center>
<br><br><br>
<footer>
    <p><i class="fa fa-copyright"></i> 2021 Copyright: TasteID.co.id</p>
</footer>

</body>
</html>

<script src="assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>