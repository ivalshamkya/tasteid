<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TasteID</title>
    <link rel="stylesheet" href="assets/css/upload_artikel.css" />
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  </head>
  <body>
    <br />
    <center>
      <section id="Detail-Resep">
        <form action="<?= base_url("artikel/add") ?>" method="post" class="column" enctype="multipart/form-data">
          <div class="file-upload">
            <div class="image-upload-wrap">
              <input
                class="file-upload-input"
                type="file"
                onchange="readURL(this);"
                accept="image/*"
                name="gambar"
              />
              <div class="drag-text">
                <i
                  class="fa fa-camera"
                  style="padding: 40px 0 30px 0; font-size: 40px"
                ></i>
                <h3>Tambahkan Foto</h3>
                <h5>Untuk Memperjelas Tips</h5>
              </div>
            </div>
          </div>
          <div class="card">
            <input
              type="text"
              class="text-input"
              placeholder="Judul Artikel/Tips"
              name="judul"
            />
            <textarea
              name="isi"
              id=""
              cols="30"
              rows="10"
              class="text-area-input"
              placeholder="Ketik isi artikel mu disini"
            ></textarea>
          </div>
          <br />
          <button class="nav-daftar">Submit</button>
        </form>
      </section>
    </center>
    <br /><br /><br />
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function () {
    var max_fields = 10;
    var wrapper = $("#bahan-input");
    var wrapper2 = $("#langkah-input");
    var add_button = $(".add_form_field");
    var add_button2 = $(".add_form_field2");

    var x = 1;
    $(add_button).click(function (e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        $(wrapper).append(
          '<input type="text" class="text-area-input" name="bahan' +
            x +
            '" id="member" placeholder="Bahan ' +
            x +
            '"><br>'
        ); //add input box
        // $(".add_form_field").remove();
        // $(wrapper).append('<button class="add_form_field" style="border: none; font-size: 17px; font-weight: 600; cursor: pointer;"><span style="font-size:16px; font-weight:bold;"><i class="fa fa-plus"></i></span>Bahan</button>'); //add input box
      } else {
        alert("Maksimal 10 Kolom");
      }
    });
    y = 1;
    $(add_button2).click(function (e) {
      e.preventDefault();
      if (y < max_fields) {
        y++;
        $(wrapper2).append(
            '<div style="display: block;">'+
              '<div style="display: flex;">'+
                '<p id="langkah-num" class="langkah-num">'+y+'</p>'+
                '<div style="display: block;width: 95%;">'+
                '<input type="text" class="text-area-input" name="langkah'+y+'" id="member" placeholder="Langkah '+y+'"/>'+
                '<div>'+
                    '<div class="image-upload-wrap">'+
                      '<input class="file-upload-input" name="foto_langkah'+y+'" type="file" onchange="readURL(this);" accept="image/*"/>'+
                      '<div class="drag-text" style="width: 150px; background-color: #fff;">'+
                        '<i class="fa fa-camera" style="padding: 40px 60px; font-size: 30px;"></i>'+
                      '</div>'+
                    '</div>'+
                '</div>'+
              '</div>'+                
            '</div>'+
            '<br>'
        ); //add input box
        // $(".add_form_field").remove();
        // $(wrapper).append('<button class="add_form_field" style="border: none; font-size: 17px; font-weight: 600; cursor: pointer;"><span style="font-size:16px; font-weight:bold;"><i class="fa fa-plus"></i></span>Bahan</button>'); //add input box
      } else {
        alert("Maksimal 10 Kolom");
      }
    });

    // $(wrapper).on("click", ".delete", function(e) {
    //     e.preventDefault();
    //     $(this).parent('div').remove();
    //     x--;
    // })
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
