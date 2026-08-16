<?php
# from the $_SERVER global variable, check if the HTTP method used is POST, if its not POST, redirect to the index.php page
# Reference: https://www.php.net/manual/en/reserved.variables.server.php

// Supply the missing code
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];

$first_name = explode(' ', trim($complete_name))[0];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    
    <div class="notification is-info">
    Hello <?php echo htmlspecialchars($first_name); ?>, please read the instructions first.
    </div>
    
    <h1 class="title">Instructions</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity.
    </h2>

    <!-- Supply the correct HTTP method and target form handler resource -->
  <form method="POST" action="quiz.php">
 <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
 <input type="hidden" name="email" value="<?php echo $email; ?>" />
 <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
 <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />
        <!-- Display the instruction -->
        <p>
                Please read each question carefully and select the best answer.
                Answer all questions before submitting the quiz.
                You have 60 seconds to complete the quiz.
                Your quiz will be submitted automatically when the time expires.
        </p>
       <div class="field">
    <label class="label">Terms and Conditions</label>

    <div class="box">
        <p>
            By starting the quiz, you agree to answer the questions honestly
            and follow the quiz instructions. Your answers will be used to
            calculate your quiz score. The quiz will automatically submit
            when the 60-second time limit expires.
        </p>
    </div>
</div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                <input type="checkbox" name="agree" value="yes" id="agree">
                I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <!-- Start Quiz button -->
        <button type="submit" class="button is-link">Start Quiz</button>
    </form>
    
    <script>
    const agree = document.getElementById('agree');
    const startQuiz = document.getElementById('startQuiz');

    agree.addEventListener('change', function () {
        startQuiz.disabled = !agree.checked;
    });
</script>
</section>

</body>
</html>
