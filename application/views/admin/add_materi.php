<?php include 'navbar.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Tambah Data Materi</h2>
                    <hr>
                    <p class="card-text">After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.</p>
                    <a href="#detail" class="btn btn-info">Saya paham dan ingin melanjutkan ⭢</a>
                </div>
            </div>
            <div class="card card-success">
                <div class="col-md-12 text-center">
                    <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">Tambah Materi</p>
                    <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan dibawah </p>
                    <hr>
                </div>
                <div id="detail" class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/tambah_materi') ?>">
                        <div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama_guru">Nama Guru</label>
                                    <select name="nama_guru" id="nama_guru" class="form-control" required onchange="autofill()">
                                        <option value="">PILIH</option>
                                        <?php foreach ($guru as $t) { ?>
                                            <option value="<?= $t->nama_guru ?>"><?= $t->nama_guru ?></option>
                                        <?php } ?>
                                    </select>
                                    <small>List guru sudah tersedia di autocomplete, kalian hanya tinggal klik input area nya atau dengan cara menulis namanya dan klik guru yang akan dipilih.</small>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="nama_mapel">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" required placeholder="Pilih nama guru yang valid agar nama mapel muncul" readonly>
                                <small>Jika nama mapel sudah berganti artinya nama guru yang kamu masukan di input area adalah valid! jika tidak muncul nama mapel anda harus klik input area nama guru dan pilih guru yang tersedia disana.</small>
                            </div>
                            <div class="form-group">
                                <label for="jenis_file">Jenis File</label>
                                <select name="jenis_file" id="jenis_file" class="form-control" onchange="pilihJenis(this)">
                                    <option value="video">Video</option>
                                    <option value="foto">Foto</option>
                                </select>
                            </div>

                            <div class="form-group" id="video_div">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Upload Video Materi Disini</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="foto_div">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
                                        <label class="custom-file-label" for="inputGroupFile02">Upload Foto Materi Disini</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link_ppt">Link PPT</label>
                                <input type="text" name="link_ppt" id="link_ppt" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Materi</label>
                                <textarea class="form-control" required name="deskripsi" id="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select required id="kelas" name="kelas" class="form-control">
                                    <option selected>Pilih disini</option>
                                    <option value="X">X ( Kelas Sepuluh )</option>
                                    <option value="XI">XI ( Kelas Sebelas )</option>
                                    <option value="XII">XII ( Kelas Dua Belas )</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-block btn-info">Tambah materi ⭢</button>
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
    $(document).ready(function() {
        $("#foto_div").hide();
    });

    function pilihJenis(obj) {
        if ($(obj).val() == 'foto') {
            $("#foto_div").show();
            $("#video_div").hide();
        } else {
            $("#video_div").show();
            $("#foto_div").hide();
        }
    }

    function autofill() {
        var nama_guru = $("#nama_guru").val();
        $.ajax({
            url: '<?php echo base_url("admin/autofill"); ?>',
            data: "nama_guru=" + nama_guru,
        }).done(function(data) {
            console.log(data.nama_mapel);
            $('#nama_mapel').val(data.nama_mapel);
        });
    }
</script>
