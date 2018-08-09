<div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-building"></i>
              Daftar bandara
            </div>
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      $cari = $koneksi->query("SELECT * FROM bandara");
                      while($hasil = $cari->fetch_assoc()){
                        ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $hasil['nama'];?></td>
                          <td>
                          <a class="btn btn-success ganti" href="?halaman=bandara&aksi=ubah&id=<?php echo $hasil['id'];?>">Ubah</a>
                          <a class="btn btn-danger" href="hapus_bandara.php?id=<?php echo $hasil['id'];?>">Hapus</a>
                          </td>
                        </tr>
                        <?php
                       }
                    ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Rafi Priatna 2018</span>
            </div>
          </div>
        </footer>