@extends('layouts.auth')

@section('title', 'HRIS')

@section('content')
    <div class="col-xl-7">
        <img class="bg-img-cover bg-center" src="{{ asset('storage/assets/img/illustration_login1.png') }}"
            alt="login illustration">
    </div>
    <div class="col-xl-5 p-0">
        <div class="login-card login-dark">
            <div class="login-main">
                <!-- Alert untuk menampilkan error -->
                @if ($errors->any() || session('error'))
                    <div id="loginAlert" class="alert alert-danger dark mb-3" role="alert">
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close"
                            onclick="closeAlert()"></button>

                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Kolom kiri: Pesan error -->
                            <div class="flex-grow-1 me-3">
                                <strong class="d-block mb-2">Login Gagal!</strong>
                                <p class="txt-light mb-0">
                                    @if ($errors->has('nik'))
                                        {{ $errors->first('nik') }}
                                    @elseif ($errors->has('password'))
                                        {{ $errors->first('password') }}
                                    @elseif (session('error'))
                                        {{ $errors->first('error') }}
                                    @else
                                        NIK atau password yang Anda masukkan salah.
                                    @endif
                                </p>
                            </div>

                            <!-- Kolom kanan: Countdown -->
                            <div class="flex-shrink-0" style="margin-right: 20px">
                                <div class="circular-progress">
                                    <svg class="progress-ring" width="40" height="40">
                                        <circle class="progress-ring-bg" cx="20" cy="20" r="16" />
                                        <circle class="progress-ring-progress" cx="20" cy="20" r="16" />
                                    </svg>
                                    <div class="progress-text">
                                        <span id="countdown">10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="theme-form">
                    @csrf
                    <h4>Sign in to account</h4>
                    <p>Enter your NIK & password to login</p>

                    <div class="form-group">
                        <label class="form-label" for="nik">NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                            value="{{ old('nik') }}" required placeholder="Masukkan NIK">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" required placeholder="*********">
                            <div class="show-hide"><span class="show"></span></div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="form-check">
                            <input id="remember_me" class="checkbox-primary form-check-input" type="checkbox"
                                name="remember" checked>
                            <label class="text-muted form-check-label" for="remember_me">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CSS untuk circular progress bar dan shake animation -->
    <style>
        .circular-progress {
            position: relative;
            display: inline-block;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring-bg {
            fill: none;
            stroke: rgba(255, 255, 255, 0.2);
            stroke-width: 2;
        }

        .progress-ring-progress {
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-dasharray: 100.5;
            /* 2 * PI * 16 = 100.5 (radius = 16) */
            stroke-dashoffset: 0;
            transition: stroke-dashoffset 1s linear;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            text-align: center;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .shake-animation {
            animation: shake 0.6s ease-in-out;
        }

        .alert-fade-out {
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.5s ease-out;
        }
    </style>

    <!-- JavaScript untuk auto-hide alert dengan circular progress dan shake -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('loginAlert');
            const countdownElement = document.getElementById('countdown');
            const progressRing = document.querySelector('.progress-ring-progress');

            if (alertElement && countdownElement && progressRing) {
                // Tambahkan shake animation saat alert muncul
                alertElement.classList.add('shake-animation');

                let timeLeft = 10; // 10 detik
                const totalTime = 10;
                const circumference = 100.5; // 2 * PI * 16 (radius = 16)

                // Set initial progress ring - mulai dari penuh
                progressRing.style.strokeDasharray = circumference;
                progressRing.style.strokeDashoffset = 0;

                // Update countdown dan progress ring setiap detik
                const countdownTimer = setInterval(function() {
                    timeLeft--;
                    countdownElement.textContent = timeLeft;

                    // Update circular progress - hitung progress yang tersisa
                    const progressRemaining = (timeLeft / totalTime);
                    const dashOffset = circumference - (progressRemaining * circumference);
                    progressRing.style.strokeDashoffset = dashOffset;

                    // Ubah warna progress ring saat waktu semakin sedikit
                    if (timeLeft <= 3) {
                        progressRing.style.stroke = '#ff6b6b'; // Merah saat <= 3 detik
                    } else if (timeLeft <= 6) {
                        progressRing.style.stroke = '#feca57'; // Kuning saat <= 6 detik
                    }

                    // Jika waktu habis, sembunyikan alert
                    if (timeLeft <= 0) {
                        clearInterval(countdownTimer);
                        hideAlert();
                    }
                }, 1000);

                // Fungsi untuk menyembunyikan alert dengan animasi
                function hideAlert() {
                    alertElement.classList.add('alert-fade-out');

                    setTimeout(function() {
                        alertElement.style.display = 'none';
                    }, 500);
                }

                // Fungsi untuk menutup alert secara manual
                window.closeAlert = function() {
                    clearInterval(countdownTimer);
                    hideAlert();
                };

                // Hilangkan shake animation setelah selesai
                setTimeout(function() {
                    alertElement.classList.remove('shake-animation');
                }, 600);
            }
        });
    </script>
@endsection
