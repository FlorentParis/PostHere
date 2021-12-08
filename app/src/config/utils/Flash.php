<?php
namespace App\config\utils;

class Flash
{
    public static function setFlash(string $channel, string $message): void
    {
        $_SESSION['msg'][$channel] = htmlspecialchars($message);
    }

    public static function hasFlash(string $channel): bool
    {
        return isset($_SESSION['msg'][$channel]);
    }

    public static function getFlash(string $channel)
    {
        if (self::hasFlash($channel)) {
            $message = $_SESSION['msg'][$channel];
            unset($_SESSION['msg']);
        }

        return $message;
    }
}