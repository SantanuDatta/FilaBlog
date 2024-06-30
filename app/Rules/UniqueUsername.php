<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueUsername implements ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (User::where('username', $value)->exists()) {
            $fail('The username is already taken. Please choose another one.');
        }
    }
}
