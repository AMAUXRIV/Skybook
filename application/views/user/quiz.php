<?php include 'navbar.php';?>


    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1 ml-4">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Selamat Mengerjakan !
                    </h1>
                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                                                                        $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                        $this->session->userdata('email')])->row_array();
                                                                        echo $data['user']['nama'];
                                                                        ?> - Skybook Students</h3>
                        <p><?= 
                        $quiz[0]->nama_mapel ?> </p>
                        
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <form id="quizForm" action="<?= base_url('user/submit_jawaban/'.$id) ?>" method="post">
        <?php $index = 0; ?>
        <?php foreach ($quiz as $list): ?>
            <input  type="hidden" name="id_quiz[<?= $list->id ?>]"  value="<?= $list->id ?>">
                    
            <div class="card materi border-0 question" id="question<?= $index ?>" data-question-id="<?= $list->id ?>">
                <div class="card-body p-5">
                    <h3 class="card-title display-5">Question <?= $index + 1 ?>: <?= $list->pertanyaan; ?></h3>
                    <p id="timer<?= $index ?>" class="text-danger">Time remaining: 60 seconds</p>
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
                </div>
                <?php if ($index < count($quiz) - 1): ?>
                    <button type="button" class="btn btn-primary" onclick="nextQuestion(<?= $index ?>)">Next</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-success">Finish</button>
                <?php endif; ?>
            </div>
            <br>
            <?php $index++; ?>
        <?php endforeach; ?>
    </form>
</div>

<script>
    // Function to handle timer and question visibility
    // Function to handle timer and question visibility
function showQuestion(index) {
    // Hide all questions
    $(".question").hide();

    // Show the current question
    $("#question" + index).show();

    // Set a timer for 60 seconds
    var timeLeft = 60;
    var timer = setInterval(function () {
        document.getElementById('timer' + index).innerHTML = 'Time remaining: ' + timeLeft + ' seconds';
        timeLeft--;

        if (timeLeft < 0) {
            clearInterval(timer); // Stop the timer

            // Check if it's the last question
            if (index + 1 < <?= count($quiz) ?>) {
                // Move to the next question
                showQuestion(index + 1);
            } else {
                // Finish the quiz if it's the last question
                finishQuiz();
            }
        }
    }, 1000);

    // Store the timer in a variable accessible outside this function
    window.currentTimer = timer;
}

// Function to handle next question
function nextQuestion(index) {
    var questionId = $("#question" + index).data("question-id");
    var selectedOption = $("input[name='jawaban[" + questionId + "]']:checked").val();
    if (selectedOption) {
        clearInterval(window.currentTimer); // Stop the timer
        if (index + 1 < <?= count($quiz) ?>) {
            showQuestion(index + 1); // Move to the next question
        }
    } else {
        alert("Please select an answer before moving to the next question.");
    }
}

// Function to handle finishing the quiz
function finishQuiz() {
    $("#quizForm").submit(); // Submit the form
}

// Start showing questions from the first one
showQuestion(0);
    
</script>
