<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteID</title>
    <link rel="stylesheet" href="/assets/css/detail_resep.css">
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
    <section id="Detail-Resep">
        <div class="column">
            <div class="card">
                <div>
                  <img src="/assets/images/User/<?= $user["img_user"] ?>" alt="" class="profile-user">
                  <p class="profile-name"><?= $user["nama_user"] ?></p>
                  <div class="bookmark">
                    <a href="#" onclick="print()"><i class="fa fa-print"></i></a>
                    <!-- <a href="#"><i class="fa fa-heart-o"></i></a> -->
                    <?php if(empty($bookmark)) {  ?>
                        <a href="<?= base_url("bookmark/add/".$resep["id_resep"])?>"><i class="fa fa-bookmark-o"></i></a>
                    <?php } else { ?>
                        <a href="<?= base_url("bookmark/remove/".$resep["id_resep"])?>"><i class="fa fa-bookmark"></i></a>
                    <?php } ?>
                  </div>
                </div>
                <img src="/assets/images/Resep/<?= $resep["gambar_resep"] ?>" alt="" class="card-image">
                <p class="resep-title"><?= $resep["nama_resep"] ?></p>
                <div class="resep-desc"><?= $resep["detail_resep"] ?></div>
                <hr>
                <p class="bahan-title">Bahan-bahan</p>
                <?php foreach($bahan as $b){ ?>
                    <p class="list-bahan"><?= $b["nama_bahan"] ?></p>
                <?php } ?>
                <hr>
                <p class="langkah-title">Langkah-langkah</p>
                <?php $i = 1; foreach($instruksi as $l){ ?>
                    <div id="langkah-langkah">
                        <div>
                            <p class="langkah-nomor"><?= $i++ ?></p>
                        </div>
                        <div class="block" style="display: block;">
                            <div>
                                <p class="langkah-text"><?= $l["detail_instruksi"] ?></p>
                            </div>
                            <div>
                                <img src="/assets/images/Resep/<?= $l["gambar"] ?>" alt="" class="langkah-foto">
                            </div>
                        </div>
                    </div>
                <?php } ?>
              </div>
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