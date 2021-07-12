<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- Ini Bagian Gambar pada login page -->
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><b>LOGIN</b></h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="usernameHelp" placeholder="Masukkan Username " value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', ' </small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', ' </small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Ingat saya</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        LOGIN
                                    </button>
                                </form>
                                <hr>
                                <table>
                                    <tr>
                                        <!-- <td><a href="forgot-password.html" class="mr-5" >Lupa Password?</a></td> -->
                                        <div class="text-center">
                                            <a href="<?= base_url('auth/registrasi'); ?>" class="justify-content">Registrasi Akun Baru</a>
                                        </div>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>