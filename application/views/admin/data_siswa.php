<?php include 'navbar.php';?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title" style="color: black;">Management Data Siswa Skybook</h2>
                            <hr>
                            <p class="card-text"> Tugas Admin adalah menjaga dan mengatur semua data  ,tolong berhati-hati dengan data yang akan diinputkan dan yang akan anda ubah.
 </p>
                            <a href="<?= base_url('user/registration') ?>" class="btn btn-info">Tambah
                                Data Siswa ⭢ </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                                <div class="table-responsive">
                                    <table id="example" class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Akun Aktif *</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            foreach ($user as $u) {
                                            ?>
                                                <tr class="text-center">

                                                    <th scope="row">
                                                        <?php echo $u->id ?>
                                                    </th>

                                                    <td>
                                                        <?php echo $u->nama ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $u->email ?>
                                                    </td>

                                                    <td>
                                                        <img height="20px" src="<?= base_url() . 'assets/profile_picture/' . $u->image; ?>">
                                                    </td>

                                                    <td>
                                                        <?php echo $u->is_active ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="<?php echo site_url('admin/detail_siswa/' . $u->id); ?>" class="btn btn-info">Detail ⭢</a>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="<?php echo site_url('admin/update_siswa/' . $u->id); ?>" class="btn btn-info">Update ⭢</a>

                                                        <a href="<?php echo site_url('admin/delete_siswa/' . $u->id); ?>" class="btn btn-danger remove">Delete ✖</a>
                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <p class="small font-weight-bold">* Angka 1 menunjukan akun telah aktif sedangkan
                                        Angka
                                        0 menunjukan akun
                                        belum
                                        aktif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End Main Content -->

    <!-- Start Sweetalert -->

    <?php if ($this->session->flashdata('success-edit')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Siswa Telah Dirubah!',
                text: 'Selamat data berubah!',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user-delete')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Siswa Telah Dihapus!',
                text: 'Selamat data telah Dihapus!',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php endif; ?>

    <!-- End Sweetalert -->

 <?php include 'footer.php';?>