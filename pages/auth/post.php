<?php
	require_once "../../config/index.php";

	if($_SERVER["REQUEST_METHOD"] === "POST") {
		$page = sanitize($_POST["page"]);
        $type = sanitize($_POST["type"]);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        if ($type === "login") {
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['name'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["role"] = $row['role'];
            } else {
                $_SESSION["error"] = "Invalid login credentials";
            }
            redirect($page);
        } else {
            $name = sanitize($_POST['name']);
            $re_password = sanitize($_POST['re-password']);

            if($password !== $re_password) {
                $_SESSION["error"] = "Passwords do not match";
                redirect($page);
            }

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            check_for_db_error($sql);
            if($result->num_rows > 0) {
                $_SESSION["error"] = "Email address already exists";
                redirect($page);
            }

            $sql = "INSERT INTO users (name, password, email) VALUES ('$name', '$password', '$email')";
            $conn->query($sql);
            check_for_db_error($sql);

            $_SESSION["success"] = "Account created successfully";
            redirect($page);
        }
    }
?>