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
                    @include('partials.alerts')
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email"
                                @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif>
                        </div>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="mb-3 password-input">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" placeholder="Enter Password"
                                    @if (isset($_COOKIE['password'])) 
                                    value="{{ $_COOKIE['password'] }}" 
                                    @endif>
                                <i class="bi bi-eye-slash eye-icon" id="togglePassword"></i>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" id="remember" name="remember" for="exampleCheck1"
                                @if (isset($_COOKIE['email'])) checked @endif>Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <div class="mt-2">
                            <a href="{{ route('registerpage') }}">Not have an account</a>
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
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#exampleInputPassword1');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using getAttribute() method
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icons
            togglePassword.classList.toggle('bi-eye-slash');
            togglePassword.classList.toggle('bi-eye');
        });
    </script>

</body>

</html>
