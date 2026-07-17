<?php

function limpiar($valor)
{
    return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
}

function redireccionar($url)
{
    header("Location: $url");
    exit;
}

function estaLogueado()
{
    return isset($_SESSION['usuario']);
}

function verificarSesion()
{
    if (!estaLogueado()) {
        redireccionar("login.php");
    }
}

function obtenerNombreUsuario()
{
    return $_SESSION['nombre'] ?? '';
}

function obtenerRol()
{
    return $_SESSION['rol'] ?? 0;
}

function formatoMoneda($monto)
{
    return 'S/ '.number_format($monto,2);
}

function fechaActual()
{
    return date('Y-m-d');
}

function fechaHoraActual()
{
    return date('Y-m-d H:i:s');
}