
<!-- Players -->
<div class="container mt-3 shadow-sm p-3 mb-5 bg-body rounded overflow-auto" style="max-height: 350px;">
    <div class="row">
        <div class="col-4 col-md-3 text-center">
            <div class="rounded-pill bg-success bg-opacity-25 bg-gradient" id="simple-list-example">
                <h1 class="display-4 text-success">0</h1>
            </div>
            <p>0 of <?= count($data['mhs']); ?> Mahasiswa</p>
        </div>
        <div class="col-8 col-md-9 text-center">
            <!-- <div data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0"> -->
                <div class="row">
                <?php
                if ($data['mhs']==NULL) {
                    ?>
                    <h1>Tidak Ada Mahasiswa Terdaftar</h1>
                    <?php
                }else {
                    ?>
                <?php foreach($data['mhs'] as $mhs) : ?>
                    <div class="col-4 col-md-2 m-1">

                    <?php
                    if ($mhs['folder_uploads']==NULL) {
                        ?>
                        <img src="<?= BASEURL; ?>public/img/_uploads/student.png" class="rounded-circle w-50 offline" alt="">
                        
                        <?php
                    }else {
                        ?>
                        <img src="<?= BASEURL; ?>public/img/_uploads/<?= $mhs['folder_uploads']; ?>" class="rounded-circle w-50 offline" alt="">
                        
                        <?php
                    }
                    ?>
                        <p><small><?= $mhs['nama_mhs']; ?></small></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                  <?php
                }
                ?>
            <!-- </div> -->
        </div>
    </div>
</div>