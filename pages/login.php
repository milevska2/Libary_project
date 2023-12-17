<?php
require_once __DIR__ . '/../layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $usernameOrEmail = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $usernameOrEmail, 'email' => $usernameOrEmail]);
        if ($stmt->rowCount() == 0) {
            $_SESSION['msg'] = ['status' => 0, 'text' => 'Incorrect username or user not found.'];
            redirect(route('login'));
        }

        $user = $stmt->fetch();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            redirect(route('home'));
        } else {
            $_SESSION['msg'] = ['status' => 0, 'text' => 'You have entered an incorrect password.'];
            redirect(route('login'));
        }
    }
}

?>
<div class="container my-4">
    <h1 class="text-center text-white mb-5">Login</h1>
    <form action="" method="POST">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username or E-Mail">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mb-4">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-lg bg-warmyellow" name="submit">Submit</button>
        </div>
        <p class="text-center text-white mt-3">Don't have an account? <a class="text-warmyellow" href="<?= route('register'); ?>">Sign Up now.</a></p>
    </form>
</div>


<?php
require_once __DIR__ . '/../layouts/footer.php';
?>