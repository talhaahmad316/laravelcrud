<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* CSS to align the eye icon properly */
        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-input {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 p-4">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name">
                        </div>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email">
                        </div>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="mb-3 password-input">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password"
                                    placeholder="Enter Password"
                                    @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif>
                                <i class="bi bi-eye-slash eye-icon toggle-password"
                                    data-target="exampleInputPassword1"></i>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                        <div class="mb-3 password-input">
                            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="exampleInputPassword2"
                                    name="confirm_password" placeholder="Confirm Password">
                                <i class="bi bi-eye-slash eye-icon toggle-password"
                                    data-target="exampleInputPassword2"></i>
                            </div>
                        </div>
                        @if ($errors->has('confirm_password'))
                            <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                        @endif
                        <div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('loginpage') }}">Already Have an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const togglePasswords = document.querySelectorAll('.toggle-password');
        togglePasswords.forEach(function(togglePassword) {
            togglePassword.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                // Toggle the eye and bi-eye icons
                this.classList.toggle('bi-eye-slash');
                this.classList.toggle('bi-eye');
            });
        });
    </script>
</body>

</html>
