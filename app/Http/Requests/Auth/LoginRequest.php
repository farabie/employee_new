<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nik' => ['required', 'string'], // ganti email dengan nik
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nik.required' => 'NIK wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ];
    }

    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        // Manual authentication dengan MD5
        $user = User::where('nik', $this->nik)->first();
        
        if (!$user) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'nik' => 'NIK tidak ditemukan dalam sistem.',
            ]);
        }

        if (md5($this->password) !== $user->password) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'nik' => 'Password yang Anda masukkan salah.',
            ]);
        }

        // Login manual tanpa password verification
        Auth::login($user, $this->boolean('remember'));
        RateLimiter::clear($this->throttleKey());
    }


    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'nik' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . ceil($seconds / 60) . ' menit.',
        ]);
    }
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('nik')).'|'.$this->ip());
    }
}
