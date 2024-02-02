<?php include 'navbar.php';?>


            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <h2 class="card-title" style="color: black;">Management Data Quiz Skybook</h2>
                            <hr>
                            <a href="<?= base_url('admin/tambah_quiz') ?>" class="btn btn-info">Tambah
                                Data Quiz ⭢</a>
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
                                                <th scope="col">Nama Materi</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Pilihan A</th>
                                                <th scope="col">Pilihan B</th>
                                                <th scope="col">Pilihan C</th>
                                                <th scope="col">Pilihan D</th>
                                                <th scope="col">Jawaban Benar</th>
                                                <th scope="col">Pembahasan</th>
                                                <th scope="col">Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
            $no = 1;
                                            foreach ($user as $u) {
                                            ?>
                                                <tr class="text-center">

                                                    <th scope="row">
                                                        <?php echo $no++ ?>
                                                    </th>

                                                    <td>
                                                        <?php echo $u->nama_mapel ?>
                                                    </td>
                                                    
                                                     <td>
                                                        <?php echo $u->kelas ?>
                                                    </td>

                                                   
                                                    <td>
                                                        <?= substr($u->pertanyaan, 0, 30); ?>
                                                        .&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
                                                    </td>
                                                    <td>
                                                        <?php echo $u->pilihan_a ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $u->pilihan_b ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $u->pilihan_c ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $u->pilihan_d ?>
                                                    </td>

                                                    <td>
                                                        <?= substr($u->pembahasan, 0, 30); ?>
                                                        .&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="<?php echo site_url('admin/update_quiz/' . $u->id); ?>" class="btn btn-info">Update ⭢</a>

                                                        <a href="<?php echo site_url('admin/delete_quiz/' . $u->id); ?>" class="btn btn-danger remove">Delete ✖</a>
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