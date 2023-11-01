<?php $post_url = ''; ?>

<div class="logout-btn text-right" style="margin-top: 5px;">
    <form action="<?= BASEURL; ?>/authuser/logout" method="post">
        <button class="btn btn-sm btn-danger">Logout</button>
    </form>
</div>

<div class="table-content">
    <div class="row">
        <div class="col-sm-12" id="msg-info">
            <?php
            Flasher::msgInfo();
            ?>
        </div>

        <section class="title-section">
            <div class="col-xs-12 col-sm-12 text-center mb-3">
                <h4>Block User Koperasi</h4>
            </div>
            <div class="col-xs-12 mb-3">
                <form action="<?= BASEURL; ?>/blockuser/submit" method="post">
                    <div class="form-group">
                        <label for="pegawai">Anggota</label>
                        <select type="text" class="form-control nik-select2" id="pegawai" name="anggota" placeholder="Ketik Nik atau Nama Karyawan disini">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button class="col-xs-12 col-sm-12 btn btn-success" id="loadbtn">Submit</button>
                    </div>
                </form>
            </div>

            <div class="text-center">
                <?php
                if (isset($_SESSION['blocked'])) {
                    echo $_SESSION['blocked']['kode'] . ' - ' . $_SESSION['blocked']['nama'];
                }

                unset($_SESSION['blocked']);
                ?>
            </div>
        </section>

        <section class="list-section">
            <!-- <div class="col-xs-12 col-sm-12 text-center mb-3">
                <h4>Block User Koperasi</h4>
            </div> -->
        </section>
    </div>
</div>
</div>
</div>