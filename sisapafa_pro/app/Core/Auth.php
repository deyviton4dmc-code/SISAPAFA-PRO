<?php

class Auth
{
    public static function check()
    {
        return isset($_SESSION['usuario']);
    }

    public static function user()
    {
        return $_SESSION['nombre'] ?? '';
    }

    public static function rol()
    {
        return $_SESSION['rol'] ?? 0;
    }

    public static function logout()
    {
        session_destroy();
        header("Location: login.php");
        exit;
    }
}