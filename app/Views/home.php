<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteID</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/carousel.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>
<body>
  <?php echo view("includes/topmenu"); ?>
<br>
<center>
    <section id="Suggest-Search">
            <div>
                <h1 class="logo"><span class="red">Taste</span><span class="white">ID.</span></h1>
                <form action="<?= base_url("resep/search") ?>">
                    <input type="search" name="query" id="search" placeholder="Cari Resep, Bahan, atau Tips" class="search-bar">
                </form>
            </div>
            
            <br><br>
    </section>
    <div class="carousel-container">
        <div class="owl-carousel owl-theme">
            <?php foreach($events as $e){ ?>
              <div class="item">
                <img src="assets/images/<?= $e["gambar"] ?>" alt="" style="position: relative;">
                <div style="position: absolute;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height: 100%;
                  width: 100%;
                  opacity: 1;
                  transition: .5s ease;
                  background-color: rgba(0, 0, 0, 0.3);">
                </div>
                <h1 style="position: absolute; top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%); color: white;"><?= $e["judul"] ?></h1>
              </div>
            <?php } ?>
        </div>
    </div>
    <section id="List-Resep">
        <h1 class="title">Rekomendasi Resep Masakan</h1>
        <p class="small-title">Resep Makanan Yang Mungkin Anda Suka</p>
        <div class="row">
        <?php foreach($resep as $rsp){ ?>
            <div class="column" onclick="location.href = '<?= base_url('resep/view/'.$rsp['id_resep']) ?>'">
              <div class="card">
                  <div>
                  <img src="/assets/images/User/<?= $rsp["user"]["img_user"] ?>" alt="" class="profile-user">
                  <p class="profile-name"><?= $rsp["user"]["nama_user"] ?></p>
                  <?php session(); 
                    if(isset($_SESSION['user'])){ ?>
                  <?php if(!$rsp["bookmark"]) {  ?>
                      <a class="bookmark" href="<?= base_url("bookmark/add/".$rsp["id_resep"])?>"><i class="fa fa-bookmark-o"></i></a>
                  <?php } else { ?>
                      <a class="bookmark" href="<?= base_url("bookmark/remove/".$rsp["id_resep"])?>"><i class="fa fa-bookmark"></i></a>
                  <?php }} ?>
                </div>
                <img src="/assets/images/Resep/<?= $rsp["gambar_resep"] ?>" alt="" class="card-image">
                <p class="resep-title"><?= $rsp["nama_resep"] ?></p>
                <p class="resep-desc"><?= $rsp["detail_resep"] ?></p>
              </div>
            </div>  
        <?php } ?>
        </div>
    </section>
    <section id="List-Resep">
      <h1 class="title">Artikel Masakan</h1>
      <p class="small-title">Tips dan Trik Terkait Masakan Untuk Anda</p>
        <div class="row">
        <?php foreach($artikel as $art){ ?>
            <div class="column" onclick="location.href = '<?= base_url('artikel/view/'.$art['id']) ?>'">
              <div class="card">
                  <div>
                  <img src="/assets/images/User/<?= $art["user"]["img_user"] ?>" alt="" class="profile-user">
                  <p class="profile-name"><?= $art["user"]["nama_user"] ?></p>
                  
                </div>
                <img src="/assets/images/Artikel/<?= $art["gambar"] ?>" alt="" class="card-image">
                <p class="resep-title"><?= $art["judul"] ?></p>
                <p class="resep-desc"><?= $art["isi"] ?></p>
              </div>
            </div>  
        <?php } ?>
          </div>
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
<script>
    $('.owl-carousel').owlCarousel({
        items:1,
        loop: true,
        autoplay:true,
        center:true,
        touchDrag: true,
        dots:true,        
        smartSpeed:1000,
    })
    
</script>