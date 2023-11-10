<?php $post_url = ''; ?>

<div class="login-form">
    <div class="row">
        <div class="col-sm-12" id="msg-info">
            <?php
            Flasher::msgInfo();
            ?>
        </div>

        <section class="title-section">
            <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
                <img src="<?= BASEURL; ?>/assets/images/logo/logo USTP.png" width="20%" alt="">
            </div>
            <div class="flexx">
                <div class="col-xs-12 col-md-6 oer">
                    <div class="text-center div-oer">
                        <img class="img-oer" src="<?= BASEURL; ?>/assets/images/logo/oer-cropped.png" alt="">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 mb-3">
                    <div class="text-center">
                        <h4><label for="">Login</label></h4>
                    </div>
                    <form action="<?= BASEURL; ?>/AuthUser/login" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <button class="col-xs-12 col-sm-12 btn btn-success" id="loginBtn">Login</button>
                        </div>
                    </form>
                </div>
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