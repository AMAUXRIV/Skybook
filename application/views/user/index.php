<?php include 'navbar.php';?>


    <!-- Start Greetings Card -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Selamat Datang
                        di Skybook <span style="font-size: 40px;">👋🏻
                        </span> </h1>
                    <p>Hello Students! , Ini merupakan halaman utama Skybook ! Silahkan pilih kelas yang akan kamu
                        akses
                        dan pilih mata pelajaran yang ingin kamu pelajari. Selamat belajar ya students!</p>
                    <hr>
                    <h4 style="line-height: 4px;" data-aos="fade-down" data-aos-duration="1700"><?php
                                                                                                $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                                                $this->session->userdata('email')])->row_array();
                                                                                                echo $data['user']['nama'];
                                                                                                ?> - Skybook Students</h3>
                        <p data-aos="fade-down" data-aos-duration="1800">Silahkan pilih kelas yang akan kamu akses
                            dibawah
                            ini!
                        </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greetings Card -->


    <br>


    <!-- Start Class Card -->
    <div class="container">
        <div class="row mt-4 mb-5 justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-right">
                        <a href="<?= base_url('user/kelas10') ?>">
                            <div class="card-kelas text-center">
                                <img src="<?= base_url('assets/') ?>img/kelas10.png" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-down">
                        <a href="<?= base_url('user/kelas11') ?>">
                            <div class="card-kelas">
                                <img src="<?= base_url('assets/') ?>img/kelas11.png" class="card-img-top" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-left">
                        <a href="<?= base_url('user/kelas12') ?>">
                            <div class="card-kelas">
                                <img src="<?= base_url('assets/') ?>img/kelas12.png" class="card-img-top" alt="...">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Class Card -->

    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Quiz
                        di Skybook <span style="font-size: 40px;">👋🏻
                        </span> </h1>
                    <hr>
                    <h4 style="line-height: 4px;" data-aos="fade-down" data-aos-duration="1700"><?php
                                                                                                $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                                                $this->session->userdata('email')])->row_array();
                                                                                                echo $data['user']['nama'];
                                                                                                ?> - Skybook Students</h3>
                        <p data-aos="fade-down" data-aos-duration="1800">Silahkan pilih quiz yang akan kamu akses
                            dibawah
                            ini!
                        </p>
                </div>
            </div>
        </div>
    </div>

    <br>


    <!-- Start Class Card -->
    <div class="container">
        <div class="row mt-4 mb-5 justify-content-center">
            <div class="col-md-12">
            <div class="row">
                    <div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-right">
                        <a href="<?= base_url('user/quiz_kelas/X') ?>">
                            <div class="card-kelas text-center">
                                <img src="<?= base_url('assets/') ?>img/kelas10.png" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-down">
                        <a href="<?= base_url('user/quiz_kelas/XI') ?>">
                            <div class="card-kelas">
                                <img src="<?= base_url('assets/') ?>img/kelas11.png" class="card-img-top" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-left">
                        <a href="<?= base_url('user/quiz_kelas/XII') ?>">
                            <div class="card-kelas">
                                <img src="<?= base_url('assets/') ?>img/kelas12.png" class="card-img-top" alt="...">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row" style="display:none">
                <?php foreach ($quiz as $list): ?>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-right">
                        <a href="<?= base_url('user/quiz/'.$list->id_materi) ?>" class="text-decoration-none">
                            <div class="card-kelas text-center">
                                <div class="card-body">
                                    <img src="<?= base_url('assets/') ?>img/<?= $list->nama_mapel.'.png' ?>" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                   
                </div>
            </div>
        </div>
    </div>
    <!-- End Class Card -->


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->