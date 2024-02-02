<?php include 'navbar.php';?>


    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Silahkan pilih mata pelajaran !
                    </h1>
                    <p>Hello Students! , Ini merupakan halaman mapel Skybook ! Silahkan pilih mapel yang akan kamu
                        akses
                        dan taddaa video dan materi siap disaksikan! Selamat belajar ya students!</p>
                    <hr>

                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                        $this->session->userdata('email')])->row_array();
                                                                        echo $data['user']['nama'];
                                                                        ?> - Skybook Students</h3>
                        <h5>Mata Pelajaran Kelas X</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->


    <!-- Start Lesson Card -->
    <div class="container">
   <div class="row">
                <?php foreach ($quiz as $list): ?>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-right">
                        <a href="<?= base_url('user/quiz/'.$list->id_materi) ?>" class="text-decoration-none">
                            <div class="card-kelas text-center">
                                <div class="card-body">
                                    <img src="<?= base_url('assets/') ?>img/<?= $list->nama_mapel.'.jpg' ?>" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                   
                </div>
    </div>
   
    <br>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->