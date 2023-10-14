            <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between small">
                          <p class="text-muted">&copy; STMIK IKMI Cirebon 2022</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end content -->
        </div>
        <!-- end sidebar -->


        <!-- logout modal -->
        <!-- Modal -->
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
   
        <script src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', event => {

                // Toggle the side navigation
                const sidebarToggle = document.body.querySelector('#sidebarToggle');
                if (sidebarToggle) {
                    // Uncomment Below to persist sidebar toggle between refreshes
                    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                    //     document.body.classList.toggle('sb-sidenav-toggled');
                    // }
                    sidebarToggle.addEventListener('click', event => {
                        event.preventDefault();
                        document.body.classList.toggle('sb-sidenav-toggled');
                        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                    });
                }

            });


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

    </body>
</html>

