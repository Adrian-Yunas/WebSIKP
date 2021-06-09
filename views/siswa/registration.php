    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register Mahasiswa</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('Login/registration'); ?>">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="nim" name="nim" placeholder="NIM" value="<?= set_value('nim'); ?>">
                                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="user" name="user" placeholder="User" value="<?= set_value('user'); ?>">
                                        <?= form_error('user', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_siswa" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pass" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                        </div>
                        <button type="submit" class=" btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('login'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>