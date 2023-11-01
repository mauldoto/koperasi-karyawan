<?php $post_url = ''; ?>

<div class="login-form">
    <div class="row">
        <div class="col-sm-12" id="msg-info">
            <?php
            Flasher::msgInfo();
            ?>
        </div>

        <section class="title-section">
            <div class="col-xs-12 col-md-6 col-md-offset-3 text-center mb-3">
                <h4>Login</h4>
            </div>
            <div class="col-xs-12 col-md-6 col-md-offset-3 mb-3">
                <form action="<?= BASEURL; ?>/authuser/login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control nik-select2" id="username" name="username" placeholder="Username">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button class="col-xs-12 col-sm-12 btn btn-success" id="loginBtn">Login</button>
                    </div>
                </form>
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