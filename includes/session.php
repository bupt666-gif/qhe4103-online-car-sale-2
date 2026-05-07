<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in(): bool
{
    return isset($_SESSION['seller_id']);
}

function current_seller_id(): ?int
{
    if (!isset($_SESSION['seller_id'])) {
        return null;
    }

    return (int) $_SESSION['seller_id'];
}

function require_login(string $redirectPath = '/pages/login.php'): void
{
    if (!is_logged_in()) {
        header('Location: ' . $redirectPath);
        exit;
    }
}
