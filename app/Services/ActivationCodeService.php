<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class ActivationCodeService
{
    /**
     * Generate an activation code for authenticator with email
     *
     * @param string $receiver authenticator's email address or mobile.
     * @param string $table table which handle activation .
     *
     * @return string
     */
    public static function generate(string $receiver, string $table = "users"): string
    {
        $digits = 4;
        $code = "1111";

        $receiver = strtolower($receiver);

        // while ($digits > 0) {
        //     $code .= mt_rand(1, 9);
        //     $digits -= 1;
        // }

        $expiresAt = now()->addMinutes(10);

        Cache::put(
            "verify_{$table}-" . $receiver,
            $code,
            $expiresAt
        );

        return $code;
    }

    /**
     * Validate activation code of user by code , email
     *
     * @param string $receiver authenticator's email address or mobile .
     * @param string $code authenticator's activation code .
     * @param string $table table which handle activation .
     *
     * @return boolean
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function validate(string $receiver, string $code, string $table = "users")
    {
        $receiver = strtolower($receiver);
        $storedCode = Cache::get("verify_{$table}-" . $receiver);
        return $storedCode && $storedCode === $code;
    }

    /**
     * Remove activation code from cache with email
     *
     * @param string $receiver authenticator's email address or mobile.
     * @param string $table    table which handle activation .
     *
     * @return void
     */
    public static function remove(string $receiver, string $table = "users"): void
    {
        $receiver = strtolower($receiver);
        Cache::forget("verify_{$table}-" . $receiver);
    }
}
