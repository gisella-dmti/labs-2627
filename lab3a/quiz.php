<?php

require "helpers.php";

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Get the registration information
$complete_name = $_POST['complete_name'] ?? '';
$email = $_POST['email'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';
$agree = $_POST['agree'] ?? '';

// Load all questions
$questions = retrieve_questions();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>

<body>

<section class="section">

    <h1 class="title">
        PHP Quiz
    </h1>

    <p class="subtitle">
        Please answer all questions.
    </p>

    <form method="POST" action="result.php" id="quizForm">

        <!-- Registration information -->
        <input type="hidden"
            name="complete_name"
            value="<?php echo htmlspecialchars($complete_name); ?>">

        <input type="hidden"
            name="email"
            value="<?php echo htmlspecialchars($email); ?>">

        <input type="hidden"
            name="birthdate"
            value="<?php echo htmlspecialchars($birthdate); ?>">

        <input type="hidden"
            name="contact_number"
            value="<?php echo htmlspecialchars($contact_number); ?>">

        <input type="hidden"
            name="agree"
            value="<?php echo htmlspecialchars($agree); ?>">


        <!-- Display ALL questions -->
        <?php foreach ($questions['questions'] as $question_number => $question): ?>

            <div class="box">

                <h2 class="title is-4">
                    Question <?php echo $question_number + 1; ?>
                </h2>

                <p class="subtitle is-5">
                    <?php echo htmlspecialchars($question['question']); ?>
                </p>


                <!-- Display the choices -->
                <?php foreach ($question['options'] as $option): ?>

                    <div class="field">

                        <div class="control">

                            <label class="radio">

                                <input
                                    type="radio"
                                    name="answers[<?php echo $question_number; ?>]"
                                    value="<?php echo $option['key']; ?>">

                                <?php echo htmlspecialchars($option['value']); ?>

                            </label>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>


        <!-- Submit button -->
        <div class="field">

            <div class="control">

                <button
                    type="submit"
                    class="button is-primary">

                    Submit Quiz

                </button>

            </div>

        </div>

    </form>

</section>


<script>

    // Automatically submit the quiz after 60 seconds
    setTimeout(function () {

        document.getElementById('quizForm').submit();

    }, 60000);

</script>

</body>

</html>
