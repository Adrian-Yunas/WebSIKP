<?php
$session = $this->session->userdata('user');
$select = $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_jurusan ON tb_siswa.jurusan = tb_jurusan.nama_singkat WHERE user = '$session' ");
$fetch = $select->row();

?>
<div style="overflow-x: hidden">

    <!-- Menu Nav -->
    <nav>
        <i class="fa fa-bars" id="burger"></i>
        <ul>
            <li class="mt--4">
                <a href="#menu-oy">Menu</a>
                <a href="" class="mt--2 float-right" style="font-size: 18px;" id="x">X</a>
            </li>
            <li><a href="">Berkas KP</a></li>
            <li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
        </ul>

    </nav>


    <div class="bunder"></div>
    <div class="kiri">
        <h1 class="animated bounce" id="judul-selamat">Selamat datang, <?= $this->session->userdata('user') ?>!</h1>
        <p class="animated fadeIn" id="tulis-des">Ini adalah website untuk aplikasi KP mahasiswa SI UKDW . Anda dapat menikmati beberapa fitur yang kami sediakan. Antara lain, profil, tempat rekomendasi, daftar sk, pra kp dan kp</p>
        <a href="#menu-oy" class="animated rotateIn" id="btn-oke">Let's Start!</a>
    </div>

    <div class="kanan">
        <div class="animated shake infinite" id="kotak-miring">
            <img src="<?= base_url('assets/uploads/profile-siswa/') . $fetch->foto; ?>" alt="Foto Profile">
        </div>
    </div>
    <div class="container" id="menu-oy">
        <div class="row mt-9 mb-6">
            <div class="container">
                <div class="colom">
                    <i class="ni ni-circle-08" id="icon"></i>
                    <h2 class="judul-icon">Profile</h2>
                    <p class="des-menu">Ini adalah menu profile, disini anda dapet melihat profile anda. Anda juga bisa menambahkan sedikit diskripsi tentang anda</p>
                    <!-- Btn menu -->
                    <a href="<?= base_url('siswa/profile/') . $fetch->id_siswa ?>" class="btn-menu animated infinite bounce delay-2s">Silahkan klik</a>
                </div>

                <div class="colom">
                    <i class="ni ni-fat-add" id="icon"></i>
                    <h2 class="judul-icon">Daftar SK</h2>
                    <p class="des-menu">Ini adalah menu daftar SK, anda dapat mengajukan SK anda disini.</p>
                    <!-- Btn menu -->
                    <?php
                    $idR    = $fetch->id_siswa;
                    $cekSe     = $this->db->query("SELECT * FROM tb_tempat_siswa WHERE id_siswa = '$idR' ");
                    $cekOy     = $this->db->query("SELECT * FROM tb_sementara WHERE id_siswa = '$idR' ");
                    $bar    = $cekSe->num_rows();
                    if ($bar > 0) { ?>
                        <a href="" class="btn-menu animated infinite bounce delay-2s" data-toggle="modal" data-target="#modal-notificationdua">
                            Silahkan klik
                        </a>
                        <div class="modal fade" id="modal-notificationdua" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
                                            <p style="font-size: 13px;">Maaf kamu sudah mendaftarkan SK </p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else if ($cekOy->num_rows() > 0) { ?>
                        <a href="" class="btn-menu animated infinite bounce delay-2s" data-toggle="modal" data-target="#modal-notificationaku">
                            <i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
                        </a>
                        <div class="modal fade" id="modal-notificationaku" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
                                            <p style="font-size: 13px;">Sementara menu ini belum dapat di akses ya, sampai SK yang kamu daftarkan terkonfirmasi hehe </p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else {
                    ?>

                        <a href="<?php echo base_url('siswa/daftarSk/') . $fetch->id_siswa; ?>" class="btn-menu animated infinite bounce delay-2s">
                            Silahkan klik
                        </a>

                    <?php } ?>
                </div>
                <div class="colom">
                    <i class="ni ni-fat-add" id="icon"></i>
                    <h2 class="judul-icon">Daftar Tempat</h2>
                    <p class="des-menu">Ini adalah menu daftar tempat KP, anda dapat mendaftarkan tempat KP anda yang telah di terima di sini.</p>
                    <!-- Btn menu -->
                    <?php
                    $idR    = $fetch->id_siswa;
                    $cekSe     = $this->db->query("SELECT * FROM tb_tempat_siswa WHERE id_siswa = '$idR' ");
                    $cekOy     = $this->db->query("SELECT * FROM tb_sementara WHERE id_siswa = '$idR' ");
                    $bar    = $cekSe->num_rows();
                    if ($bar > 0) { ?>
                        <a href="" class="btn-menu animated infinite bounce delay-2s" data-toggle="modal" data-target="#modal-notificationdua">
                            Silahkan klik
                        </a>
                        <div class="modal fade" id="modal-notificationdua" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
                                            <p style="font-size: 13px;">Maaf kamu sudah mendapatkan tempat KP </p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else if ($cekOy->num_rows() > 0) { ?>
                        <a href="" class="btn-menu animated infinite bounce delay-2s" data-toggle="modal" data-target="#modal-notificationaku">
                            <i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
                        </a>
                        <div class="modal fade" id="modal-notificationaku" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
                                            <p style="font-size: 13px;">Sementara menu ini belum dapat di akses ya, sampai tempat KP yang kamu daftarkan terkonfirmasi hehe </p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else {
                    ?>

                        <a href="<?php echo base_url('siswa/daftarPkl/') . $fetch->id_siswa; ?>" class="btn-menu animated infinite bounce delay-2s">
                            Silahkan klik
                        </a>

                    <?php } ?>
                </div>

                <div class="colom">
                    <i class="ni ni-fat-add" id="icon"></i>
                    <h2 class="judul-icon">Daftar Pra KP</h2>
                    <p class="des-menu">Ini adalah menu daftar pra KP, anda dapat mendaftarkan pra KP anda di sini.</p>
                    <!-- Btn menu -->
                    <?php
                    $idR    = $fetch->id_siswa;
                    $cekSe     = $this->db->query("SELECT * FROM tb_tempat_siswa WHERE id_siswa = '$idR' ");
                    $cekOy     = $this->db->query("SELECT * FROM tb_sementara WHERE id_siswa = '$idR' ");
                    $bar    = $cekSe->num_rows();
                    if ($bar > 0) { ?>
                        <a href="" class="btn-menu animated infinite bounce delay-2s" data-toggle="modal" data-target="#modal-notificationdua">
                            Silahkan klik
                        </a>
                        <div class="modal fade" id="modal-notificationdua" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
                                            <p style="font-size: 13px;">Maaf kamu sudah mendaftarkan pra KP </p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else if ($cekOy->num_rows() > 0) { ?>
                        <a href="" class="btn-menu animated infinite bounce delay-2s" data-toggle="modal" data-target="#modal-notificationaku">
                            <i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
                        </a>
                        <div class="modal fade" id="modal-notificationaku" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
                                            <p style="font-size: 13px;">Sementara menu ini belum dapat di akses ya, sampai pra KP yang kamu daftarkan terkonfirmasi hehe </p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else {
                    ?>

                        <a href="<?php echo base_url('siswa/daftarPkl/') . $fetch->id_siswa; ?>" class="btn-menu animated infinite bounce delay-2s">
                            Silahkan klik
                        </a>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>