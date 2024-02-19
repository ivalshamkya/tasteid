<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteID</title>
    <link rel="stylesheet" href="/assets/css/add_plan.css">
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
    <section id="Suggest-Search">
      <div>
          <form action="<?= base_url("planner/addmeal") ?>" method="post">
              <input type="search" id="search" placeholder="Cari Resep, Bahan, atau Tips" class="search-bar" name="query">
              <span onclick="showFilter()" class="open-filter"><i class="fa fa-filter"></i> Filter</span>
              <div id="filter" class="filter">
                <span onclick="hideFilter()" class="close-filter">&times;</span>
                <br>
                <h3 style="margin-left: 30px;">Filter Berdasarkan</h3>
                <br>
                <h3 style="margin-left: 30px;">Kategori</h3>
                <select name="kategori" class="filter-select">
                  <option value="">Semua</option> 
                  <?php foreach($kategori as $ctg){ ?>
                  <option value="<?= $ctg["id_kategori"]?>"><?= $ctg["kategori"]?></option>
                  <?php } ?>
                </select>
                <br>
                <h3 style="margin-left: 30px;">Lokasi</h3>
                <select name="lokasi" class="filter-select">
                  <option value="">Semua</option>
                  <option value="Bali">Bali</option>
                  <option value="Jawa Timur">Jawa Timur</option>
                  <option value="Jawa Barat">Jawa Barat</option>
                </select>
                <br>
                <h3 style="margin-left: 30px;">Bahan</h3>
                <select name="bahan" class="filter-select">
                  <option value="">Semua</option>
                  <option value="ayam">Ayam</option>
                  <option value="sapi">Sapi</option>
                  <option value="Wortel">Wortel</option>
                </select>
              </div>
              <input type="hidden" name="hari" value="<?= $hari ?>">
              <input type="hidden" name="waktu" value="<?= $waktu ?>">
          </form>
          <?php 
          if(!empty($query)){
          echo "<h3>Hasil Pencarian "."'". $query ."'"."</h3>";
          }
          ?>
          
      </div>
    </section>
    
    <section id="List-Resep">
        <div class="row">
            <?php foreach($resep as $rsp){ ?>
              <div class="column" onclick="location.href = '<?= base_url('resep/view/'.$rsp['id_resep']) ?>'">
                <div class="card">
                    <div>
                    <img src="/assets/images/User/<?= $rsp["user"]["img_user"] ?>" alt="" class="profile-user">
                    <p class="profile-name"><?= $rsp["user"]["nama_user"] ?></p>
                  </div>
                  <img src="/assets/images/Resep/<?= $rsp["gambar_resep"] ?>" alt="" class="card-image">
                  <p class="resep-title"><?= $rsp["nama_resep"] ?></p>
                  <p class="resep-desc"><?= $rsp["detail_resep"] ?></p>
                  <form action="<?= base_url("planner/add") ?>" method="post">
                    <input type="hidden" name="hari" value="<?= $hari ?>">
                    <input type="hidden" name="waktu" value="<?= $waktu ?>">
                    <input type="hidden" name="id_resep" value="<?= $rsp["id_resep"] ?>">
                    <button  class="add-plan">Tambah</button>
                  </form>
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
<script type="text/javascript">
  function showFilter(){
    document.getElementById("filter").style.width = "350px";
    document.getElementById("filter").style.display = "block";
  }
  function hideFilter(){
    document.getElementById("filter").style.width = "0px";
    document.getElementById("filter").style.display = "none";
  }
</script>