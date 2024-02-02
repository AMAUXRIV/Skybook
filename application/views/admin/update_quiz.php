<?php include 'navbar.php';?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <h2 class="card-title" style="color: black;">Update Data Quiz</h2>
                                <a href="#detail" class="btn btn-info">Saya paham dan
                                    ingin melanjutkan ⭢</a>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="col-md-12 text-center">
                                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                                    Update Quiz</p>
                                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                                    dibawah </p>
                                <hr>
                            </div>
                            <?php foreach ($user as $u) { ?>
                            <div id="detail" class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/quiz_edit') ?>">
                                    <div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('guru/quiz_edit') ?>">
                                            <input type="hidden" name="id" value="<?= $u->id ?>" >
                                            <input type="hidden" name="id_materi" value="<?= $u->id_materi ?>" >
                                            <div class="form-group">
                                                <label for="nip">Nama Guru</label>

                                                <input readonly id="nama_mapel" type="text" class="form-control" value="<?= $u->nama_mapel ?>" name="nama_mapel">
                                                <?= form_error('nama_mapel', '<small class="text-danger">', '</small>'); ?>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>


                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pertanyaan</label>
                                                <textarea class="form-control" required name="pertanyaan" id="exampleFormControlTextarea1" rows="3"><?= $u->pertanyaan ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pilihan A</label>
                                                <input type="text" class="form-control" name="pilihan_a" id="pilihan_a" value="<?= $u->pilihan_a ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pilihan B</label>
                                                <input type="text" class="form-control" name="pilihan_b" id="pilihan_b" value="<?= $u->pilihan_b ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pilihan C</label>
                                                <input type="text" class="form-control" name="pilihan_c" id="pilihan_c" value="<?= $u->pilihan_c ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pilihan D</label>
                                                <input type="text" class="form-control" name="pilihan_d" id="pilihan_d" value="<?= $u->pilihan_d ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState">Jawaban Benar</label>
                                                <select required id="inputState" name="jawaban_benar" class="form-control">
                                                    <option <?php echo ($u->jawaban_benar == 'A') ? 'selected' : ''; ?> value="A">A</option>
                                                    <option <?php echo ($u->jawaban_benar == 'B') ? 'selected' : ''; ?> value="B">B</option>
                                                    <option <?php echo ($u->jawaban_benar == 'C') ? 'selected' : ''; ?> value="C">C</option>
                                                    <option <?php echo ($u->jawaban_benar == 'D') ? 'selected' : ''; ?> value="D">D</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pembahasan</label>
                                                <textarea class="form-control" required name="pembahasan" id="exampleFormControlTextarea1" rows="3"><?= $u->pembahasan ?></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-info">Edit
                                                Quiz ⭢</button>
                                    </div>
                                </form>
                            </div>

                            <?php } ?>

                        </div>
                        <br>
                    </div>
                </section>
            </div>
        </div>
        <!-- End Main Content -->
        
<?php include 'footer.php';?>