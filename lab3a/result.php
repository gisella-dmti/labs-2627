<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
$answers = $_POST['answers'] ?? [];

// Make sure every question has an answer value
$complete_answers = [];

for ($i = 0; $i < MAX_QUESTION_NUMBER; $i++) {

    $complete_answers[$i] = $answers[$i] ?? '';

}

// Compute the score
$score = compute_score($complete_answers);

$questions = retrieve_questions();
$correct_answers = $questions['answers'];

function get_answer_text($options, $answer_key) {

    if ($answer_key === '') {
        return 'No answer';
    }

    foreach ($options as $option) {

        if ($option['key'] === $answer_key) {
            return $option['value'];
        }

    }

    return 'Unknown answer';
}
?>
<html>
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<section class="hero <?php echo $score > 2 ? 'is-success' : 'is-danger'; ?>">    <div class="hero-body">
        <p class="title">Your Score <?php echo $score; ?></p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>
<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo $complete_name; ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                     <td>
                        <?php
                        $formatted_birthdate = date("F d, Y", strtotime($birthdate));
                        echo $formatted_birthdate;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $contact_number; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<div class="table-container">
    <table class="table is-bordered is-hoverable is-fullwidth">

        <thead>
            <tr>
                <th>Question</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
                <th>Result</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($questions['questions'] as $question_number => $question): ?>

                <tr>

                    <td>
                        <?php echo $question_number + 1; ?>
                    </td>

                    <td>
                        <?php
                        echo get_answer_text(
                            $question['options'],
                            $complete_answers[$question_number]
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo get_answer_text(
                            $question['options'],
                            $correct_answers[$question_number] ?? ''
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        $user_answer = $complete_answers[$question_number] ?? '';
                        $correct_answer = $correct_answers[$question_number] ?? '';

                        if ($user_answer !== '' && $user_answer === $correct_answer) {
                            echo 'Correct';
                        } else {
                            echo 'Incorrect';
                        }
                        ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
</div>
   <?php if ($score == 5000): ?>

    <canvas id="confetti-canvas"></canvas>

    <script>
        var confettiSettings = {
            target: 'confetti-canvas'
        };

        var confetti = new ConfettiGenerator(confettiSettings);

        confetti.render();
    </script>

<?php endif; ?>
</section>
    
</body>
</html>
