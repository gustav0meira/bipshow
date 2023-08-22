<?php
session_start();

require "sql.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = hash("sha256", $_POST["password"]);

    if (!isset($_SESSION["user"])) {
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION["user"] = $user;

            header("Location: ./");
            exit();
        } else {
            echo "<script>alert('Credenciais inválidas');</script>";

            echo "<script>window.location.href = './';</script>";
            exit();
        }
    } else {
        header("Location: ./");
        exit();
    }
}
?>