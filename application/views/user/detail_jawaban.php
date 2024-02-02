<?php include 'navbar.php';?>


    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1 ml-4">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Berikut Hasil Score Anda !
                    </h1>
                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                        $this->session->userdata('email')])->row_array();
                                                                        echo $data['user']['nama'];
                                                                        ?> - Skybook Students</h3>
                        <p><?= 
                        $jawaban[0]->nama_mapel ?> </p>
<?php 
$hitung = 0;
$benarCount = 0;
$salahCount = 0;

foreach ($jawaban as $list):
    $hitung += $list->skor;
    $benarCount += ($list->benar == 1) ? 1 : 0;
    $salahCount += ($list->benar == 0) ? 1 : 0;
endforeach;
?>

Total Score: <?php echo $hitung; ?><br>
Correct Answers: <?php echo $benarCount; ?><br>
Incorrect Answers: <?php echo $salahCount; ?>

                        
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <?php $index = 0; ?>
        <?php foreach ($jawaban as $list): ?>
            <input  type="hidden" name="id_quiz[<?= $list->id ?>]"  value="<?= $list->id ?>">
                    
            <div class="card materi border-0 question" id="question<?= $index ?>" data-question-id="<?= $list->id ?>">
                <div class="card-body p-5">
                    <h3 class="card-title display-5">Question <?= $index + 1 ?>: <?= $list->pertanyaan; ?></h3>
                    <hr style="background-color: white;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $list->id ?>]" id="optionA<?= $index ?>" value="A">
                        <label class="form-check-label" for="optionA<?= $index ?>">
                            <?= $list->pilihan_a; ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $list->id ?>]" id="optionB<?= $index ?>" value="B">
                        <label class="form-check-label" for="optionB<?= $index ?>">
                            <?= $list->pilihan_b; ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $list->id ?>]" id="optionC<?= $index ?>" value="C">
                        <label class="form-check-label" for="optionC<?= $index ?>">
                            <?= $list->pilihan_c; ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $list->id ?>]" id="optionD<?= $index ?>" value="D">
                        <label class="form-check-label" for="optionD<?= $index ?>">
                            <?= $list->pilihan_d; ?>
                        </label>
                    </div>

                    <div class="mt-3">
                    <strong>Your Answer:</strong>
                    <?php
                    //var_dump($list->jawaban_siswa);die;
                    echo ($list->jawaban_siswa == '0') ?'Not answered' :$list->jawaban_siswa ; ?>
                    <br>
                    <strong>Correct Answer:</strong> <?= $list->jawaban_benar; ?>
                    <br>
                    <?php
                        // Provide feedback based on correctness
                        $userAnswer = isset($list->jawaban_siswa) ? $list->jawaban_siswa : 0;
                        if ($userAnswer === $list->jawaban_benar) {
                            echo '<span style="color: green;">Correct!</span>';
                        } else {
                            echo '<span style="color: red;">Incorrect. Correct answer is ' . $list->jawaban_benar . '</span>';
                            echo ' <br>';
                            echo '<span style="color: red;">Pembahasan :  ' . $list->pembahasan . '</span>';
                        }
                    ?>
                </div>
                
                
                </div>

               
            </div>
            <br>
            <?php $index++; ?>
        <?php endforeach; ?>

</div>
