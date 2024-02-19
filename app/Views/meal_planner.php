<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteID</title>
    <link rel="stylesheet" href="assets/css/meal_planner.css">
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
    <section id="List-voucher">
      <h1 style="font-size: 35px; font-family: 'Poppins-Bold';">Meal Planner</h1>
        <form action="" method="post">
          <input type="date" name="hari" value="<?= $hari ?>" onchange="this.form.submit()">
        </form>
        <h1 class="title">Breakfast</h1>
        <?php if(isset($breakfast)) { ?>
          <div class="column">
            <div class="card">
              <img src="/assets/images/resep/<?= $breakfast['resep']["gambar_resep"] ?>" alt="" class="card-image">
              <div style="display: block;">
                <p class="voucher-title"><?= $breakfast['resep']["nama_resep"] ?></p>
                <a href="<?= base_url("planner/delete/".$breakfast['id_rencana_memasak']) ?>"><button class="delete-plan"><span class="fa fa-trash"></span></button></a>
              </div>
            </div>  
          </div>
        <?php } else { ?>
          <form action="<?= base_url("planner/addmeal") ?>" method="post">
            <input type="hidden" name="hari" value="<?= $hari ?>">
            <input type="hidden" name="waktu" value="breakfast">
            <button  class="add-plan">+ Add Breakfast Plan</button>
          </form>
        <?php } ?>
    </section>

    <section id="List-voucher">
        <h1 class="title">Lunch</h1>
        <?php if(isset($lunch)) { ?>
          <div class="column">
            <div class="card">
              <img src="/assets/images/Resep/<?= $lunch['resep']["gambar_resep"] ?>" alt="" class="card-image">
              <div style="display: block;">
                <p class="voucher-title"><?= $lunch['resep']["nama_resep"] ?></p>
                <a href="<?= base_url("planner/delete/".$lunch['id_rencana_memasak']) ?>"><button class="delete-plan"><span class="fa fa-trash"></span></button></a>
              </div>
            </div>  
          </div>
        <?php } else { ?>
          <form action="<?= base_url("planner/addmeal") ?>" method="post">
            <input type="hidden" name="hari" value="<?= $hari ?>">
            <input type="hidden" name="waktu" value="lunch">
            <button  class="add-plan">+ Add Lunch Plan</button>
          </form>
        <?php } ?>
    </section>

    <section id="List-voucher">
      <h1 class="title">Dinner</h1>
      <?php if(isset($dinner)) { ?>
          <div class="column">
            <div class="card">
              <img src="/assets/images/resep/<?= $dinner['resep']["gambar_resep"] ?>" alt="" class="card-image">
              <div style="display: block;">
                <p class="voucher-title"><?= $dinner['resep']["nama_resep"] ?></p>
                <a href="<?= base_url("planner/delete/".$dinner['id_rencana_memasak']) ?>"><button class="delete-plan"><span class="fa fa-trash"></span></button></a>
              </div>
            </div>  
          </div>
        <?php } else { ?>
          <form action="<?= base_url("planner/addmeal") ?>" method="post">
            <input type="hidden" name="hari" value="<?= $hari ?>">
            <input type="hidden" name="waktu" value="dinner">
            <button  class="add-plan">+ Add Dinner Plan</button>
          </form>
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