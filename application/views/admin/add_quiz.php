<?php include 'navbar.php'; ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div>
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Tambah Data Quiz</h2>
                    <hr>
                    <p class="card-text">After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.</p>
                    <a href="#detail" class="btn btn-info">Saya paham dan ingin melanjutkan ⭢</a>
                </div>
            </div>
            <div class="card card-success">
                <div class="col-md-12 text-center">
                    <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">Tambah Quiz</p>
                    <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan dibawah </p>
                    <hr>
                </div>
                <div id="detail" class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/tambah_quiz') ?>">
                        <div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                            <div class="form-group">
                                <label for="nama_materi">Nama Materi</label>
                                <select name="id_materi" id="id_materi" class="form-control" required>
                                    <option value="">PILIH</option>
                                    <?php foreach ($materi as $t) { ?>
                                        <option value="<?= $t->id ?>" data-nama="<?= $t->nama_mapel ?>"><?= $t->nama_mapel ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Materi</label>
                                <textarea class="form-control" required name="deskripsi" id="deskripsi" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Kelas</label>
                                <select required id="inputState" name="kelas" class="form-control">
                                    <option selected>Pilih disini</option>
                                    <option value="X">X (Kelas Sepuluh)</option>
                                    <option value="XI">XI (Kelas Sebelas)</option>
                                    <option value="XII">XII (Kelas Dua Belas)</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan</label>
                                <textarea class="form-control" required name="pertanyaan" id="pertanyaan" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="pilihan_a">Pilihan A</label>
                                <input type="text" class="form-control" name="pilihan_a" id="pilihan_a">
                            </div>

                            <div class="form-group">
                                <label for="pilihan_b">Pilihan B</label>
                                <input type="text" class="form-control" name="pilihan_b" id="pilihan_b">
                            </div>

                            <div class="form-group">
                                <label for="pilihan_c">Pilihan C</label>
                                <input type="text" class="form-control" name="pilihan_c" id="pilihan_c">
                            </div>

                            <div class="form-group">
                                <label for="pilihan_d">Pilihan D</label>
                                <input type="text" class="form-control" name="pilihan_d" id="pilihan_d">
                            </div>
                            
                            <div class="form-group">
                                <label for="jawaban_benar">Jawaban Benar</label>
                                <select required id="jawaban_benar" name="jawaban_benar" class="form-control">
                                    <option selected>Pilih disini</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="pembahasan">Pembahasan</label>
                                <textarea class="form-control" required name="pembahasan" id="pembahasan" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-info">Tambah Quiz ⭢</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </section>
</div>
<!-- End Main Content -->

<?php include 'footer.php'; ?>

<script>
    document.getElementById('nama_materi').addEventListener('input', function() {
        var selectedOption = document.querySelector('#nama_materi option[value="' + this.value + '"]');
        if (selectedOption) {
            var namaMapel = selectedOption.getAttribute('data-nama');
            var idMateri = selectedOption.value;

            // Menyimpan nilai id_materi ke hidden input
            document.getElementById('id_materi_hidden').value = idMateri;

            // Mengganti nilai input dengan nama_mapel
            this.value = namaMapel;
        } else {
            // Reset nilai hidden input jika tidak ada opsi yang cocok
            document.getElementById('id_materi_hidden').value = '';
        }
    });
</script>
