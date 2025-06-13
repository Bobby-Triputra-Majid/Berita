<?php
if (!class_exists('AuthController')) {
    class AuthController
    {
        private $connect;

        public function __construct($dbConnection)
        {
            $this->connect = $dbConnection;
        }

        public function login($email, $password)
        {
            $stmt = $this->connect->prepare("SELECT id, namalengkap, email, password FROM tb_users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    // $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['success_message'] = "Login Berhasil!  ";
                    $_SESSION['admin_logged_in'] = true;

                    header("Location: index.php?page=admin");
                    exit();
                } else {
                    return "Invalid password!";
                }
            } else {
                return "Email not found!";
            }
            $stmt->close();
        }
    }
}
?>