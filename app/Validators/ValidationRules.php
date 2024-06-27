<?php

namespace App\Validators;

use CodeIgniter\Validation\Rules;

class ValidationRules extends Rules
{
    public static function valid_time(string $str): bool
    {
        // Validasi waktu dalam format HH:MM (24 jam)
        return (bool) preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $str);
    }
}
