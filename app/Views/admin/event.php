<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 mb-5">
      Events
  </h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary"> Daftar Event
        <a href="<?= base_url('admin/addevent') ?>" class="btn btn-outline-info float-right"> 
          <i class="fas fa-plus"></i> Tambah
        </a>
      </h4>
    </div>
    <div class="card-body">
      

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            
            <?php 
              $i = 0;
              foreach($events as $event):
              $i++; 

            ?>

              <tr>
                <td> <?= $i; ?> </td>
                <td> <?= $event["judul"] ?> </td>
                <td> <img src="/assets/images/<?= $event["gambar"] ?>" height="100" alt="">  </td>
                <td>                                     
                    <a href="<?= base_url('admin/editevent/'.$event['id'])?>" class="btn btn-outline-warning"> 
                      <i class="fas fa-edit"></i> Edit 
                    </a>

                    <a href="<?= base_url('admin/deleteevent/'.$event['id'])?>" class="btn btn-outline-danger"> 
                      <i class="fas fa-trash-alt"></i> Delete 
                    </a>
                </td>
                
              </tr>

            <?php endforeach; ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>


