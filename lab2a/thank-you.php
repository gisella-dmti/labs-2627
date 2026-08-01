<?php

require "helpers/helper-functions.php";

session_start();

if (
    empty($_POST['email']) ||
    empty($_POST['password']) ||
    !isset($_POST['agree'])
) {
    header("Location: step3.php");
    exit();
}

$birthDate = new DateTime($_SESSION['birthdate']);
$today = new DateTime();

$age = $birthDate->diff($today)->y;

$_SESSION['age'] = $age;

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$agree = $_POST['agree'];

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['agree'] = $agree;

$form_data = $_SESSION;

dump_session();

session_destroy();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php if ($key == "birthdate") {
                            echo date("F d, Y", strtotime($val));
                            } else {
                            echo $val;
                            }
                            ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
      

      </div>
    </div>
  </div>
</section>

</body>
</html>
