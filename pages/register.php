<?php
require_once __DIR__ . '/../layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {

        $userSql = "SELECT * FROM users WHERE username = :username";
        $userSqlStmt = $conn->prepare($userSql);
        $userSqlStmt->execute(['username' => $_POST['username']]);
        $userExists = $userSqlStmt->fetch();

        $mailSql = "SELECT * FROM users WHERE email = :email";
        $mailSqlStmt = $conn->prepare($mailSql);
        $mailSqlStmt->execute(['email' => $_POST['email']]);
        $mailExists = $mailSqlStmt->fetch();

        if (empty($_POST['first_name'])) {
            $_SESSION['val'] = ['first_name' => 1, 'text' => 'First Name field must be filled.'];
            redirect(route('register'));
        } else if (strlen($_POST['first_name']) < 2) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'First Name must be 2 characters minimum.'];
            redirect(route('register'));
        } else {
            input_data($_POST['first_name']);
        }

        if (empty($_POST['last_name'])) {
            $_SESSION['val'] = ['last_name' => 1, 'text' => 'Last Name field must be filled.'];
            redirect(route('register'));
        } else if (strlen($_POST['last_name']) < 2) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'Last Name must be 2 characters minimum.'];
            redirect(route('register'));
        } else {
            input_data($_POST['last_name']);
        }

        if (empty($_POST['username'])) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'Username field must be filled.'];
            redirect(route('register'));
        } else if (strlen($_POST['username']) < 6) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'Username must be 6 characters minimum.'];
            redirect(route('register'));
        } else if ($userExists > 0) {
            $_SESSION['val'] = ['username' => 1, 'text' => 'Username already taken.'];
            redirect(route('register'));
        } else {
            input_data($_POST['username']);
        }

        if (empty($_POST['email'])) {
            $_SESSION['val'] = ['email' => 1, 'text' => 'Email field must be filled.'];
            redirect(route('register'));
        } else if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['email'])) {
            $_SESSION['val'] = ['email' => 1, 'text' => 'Email must be valid.'];
            redirect(route('register'));
        } else if ($mailExists > 0) {
            $_SESSION['val'] = ['email' => 1, 'text' => 'Email already taken.'];
            redirect(route('register'));
        } else {
            input_data($_POST['email']);
        }

        if (empty($_POST['password'])) {
            $_SESSION['val'] = ['password' => 1, 'text' => 'Password field must be filled.'];
            redirect(route('register'));
        } else if (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/", $_POST['password'])) {
            $_SESSION['val'] = ['password' => 1, 'text' => 'Password must contain at least 8 characters, 1 number and 1 special character.'];
            redirect(route('register'));
        } else {
            input_data($_POST['password']);
        }

        $sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES (:first_name, :last_name, :username, :email, :password)";
        $stmt = $conn->prepare($sql);

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        ];

        try {
            if ($stmt->execute($data)) {
                $_SESSION['msg'] = ['status' => 1, 'text' => 'You have registered successfully!'];
                redirect(route('login'));
            } else {
                $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
                redirect(route('register'));
            }
        } catch (PDOException $e) {
            $_SESSION['msg'] = ['status' => 0, 'text' => 'An error occured.'];
            redirect(route('register'));
        }
    }
}

?>
<div class="container my-4">
    <h1 class="text-center text-white mb-5">Register</h1>
    <?= printSessionMessages(); ?>
    <form action="" method="POST">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control mb-2" name="first_name" id="first_name" placeholder="First Name">
                <?php if (isset($_SESSION['val']['first_name'])) {
                    printValidationMessages('first_name');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control mb-2" name="last_name" id="last_name" placeholder="Last Name">
                <?php if (isset($_SESSION['val']['last_name'])) {
                    printValidationMessages('last_name');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control mb-2" name="username" id="username" placeholder="Username">
                <?php if (isset($_SESSION['val']['username'])) {
                    printValidationMessages('username');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="E-Mail">
                <?php if (isset($_SESSION['val']['email'])) {
                    printValidationMessages('email');
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="password" class="form-control mb-2" name="password" id="password" placeholder="Password">
                <?php if (isset($_SESSION['val']['password'])) {
                    printValidationMessages('password');
                } ?>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-lg bg-warmyellow" name="submit">Submit</button>
        </div>
    </form>
</div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>