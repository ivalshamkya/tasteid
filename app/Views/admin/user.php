<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 mb-5">
      Users
  </h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary"> Daftar User

      </h4>
    </div>
    <div class="card-body">
      

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Provinsi</th>
              <th>Kota</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Provinsi</th>
              <th>Kota</th>
            </tr>
          </tfoot>
          <tbody>
            
            <?php 
              $i = 0;
              foreach($users as $user):
              $i++; 

            ?>

              <tr>
                <td> <?= $i; ?> </td>
                <td> <?= $user["nama_user"] ?> </td>
                <td> <?= $user["email_user"] ?> </td>
                <td> <?= $user["provinsi"] ?> </td>
                <td> <?= $user["kota"] ?> </td>
                
              </tr>

            <?php endforeach; ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>


