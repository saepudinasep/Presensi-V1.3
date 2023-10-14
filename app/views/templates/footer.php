
<!-- Modal -->
<!-- <div class="modal fade" id="Logout" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <span class="tombol"></span>
        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" id="aksi" class="btn btn-primary">Save changes</button> -->
        <!-- <a href="<?= BASEURL; ?>?url=Log/logout" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade" id="Logout" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size_logout" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <span class="pLog"></span>
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <span class="tombol"></span>
        <!-- <button type="button" id="aksi" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

    
    <script>
      // data modal
      $(function(){

        // start modal logout
        $('.logout').on('click', function() {
            let keluar = '<a href="<?= BASEURL; ?>?url=Log/logout" class="btn btn-primary">Logout</a>';
            let pLog = 'Yakin anda akan logout....?';
            $('.modal-title').html('Logout');
          //   $('.modal-body').html('Yakin anda akan logout....?');
            $('#close').html('Batal');
            $('.pLog').html(pLog);
            $('.tombol').html(keluar);

            $('#modal-size_logout').attr('class', 'modal-dialog modal-sm');
        });
        // end modal logout
      });
    </script>

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 px-5 my-4 border-top">
    <div class="col-4 col-md-4 d-flex align-items-center">
      <span class="mb-3 mb-md-0 text-muted">&copy; STMIK IKMI Cirebon 2022</span>
    </div>
  </footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script type="text/javascript" src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/sweetalert.min.js"></script>


</body>
</html>