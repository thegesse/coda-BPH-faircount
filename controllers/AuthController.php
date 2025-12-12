<?php
class AuthController extends AbstractController {
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = $this->userManager->findOneByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] = $user->getName();
                header('Location: /home');
                exit;
            } else {
                $_SESSION['error'] = 'Invalid credentials.';
                header('Location: /login');
                exit;
            }
        }
    }

    // Inside AuthController
    public function register()
    {
        $userManager = new UserManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userManager->createUser($name, $email, $password);
        }
    }

}
