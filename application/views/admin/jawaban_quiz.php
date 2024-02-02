<?php include 'navbar.php';?>


            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <h2 class="card-title" style="color: black;">Management Data Jawaban Quiz Skybook</h2>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                                <div class="table-responsive">
                                    <table id="example" class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Materi</th>
                                                <th scope="col">Quiz</th>
                                                <th scope="col">Jawaban Siswa</th>
                                                 <th scope="col">Jawaban Benar</th>
                                                <th scope="col">Score</th>
                                                <th style="display:none" scope="col">Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
            $no = 1;
                                            foreach ($jawaban as $u) {
                                            ?>
                                                <tr class="text-center">

                                                    <th scope="row">
                                                        <?php echo $no++ ?>
                                                    </th>

                                                    <td>
                                                        <?php echo $u->nama ?>
                                                    </td>
  <td>
                                                        <?php echo $u->nama_mapel ?>
                                                    </td>
                                                   
                                                    <td>
                                                        <?= substr($u->pertanyaan, 0, 30); ?>
                                                        .&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
                                                    </td>
                                                    <td>
                                                        <?php echo $u->jawaban_siswa ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $u->jawaban_benar ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $u->benar ?>
                                                    </td>
                                                  

                                                    <td style="display:none" class="text-center">
                                                        <a target="_blank" href="<?php echo site_url('admin/detail_jawaban/' . $u->id); ?>" class="btn btn-info">Detal ⭢</a>

                                                       
                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                              
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->


    <!-- Start Sweetalert -->

    <?php if ($this->session->flashdata('success-edit')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Quiz Telah Dirubah!',
                text: 'Selamat data berubah!',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('quiz-delete')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Quiz Telah Dihapus!',
                text: 'Selamat data telah Dihapus!',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success-reg')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Quiz Telah Ditambah!',
                text: 'Selamat data telah Ditambah!',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php endif; ?>

    <!-- End Sweetalert -->
    
<?php include 'footer.php';?>