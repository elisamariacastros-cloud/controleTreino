<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Treino+</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        body { background-color: #f5f5f5; margin: 0; }
        .navbar { background-color: #dc3545; }
        .navbar-brand { color: white; font-weight: bold; }
        .login-container {
            min-height: calc(100vh - 70px);
            padding: 1rem 0;
        }
        .card {
            border: none;
            border-radius: 15px;
            padding: 2.5rem 2rem;
        }
        .title {
            font-weight: bold;
            font-size: 1.8rem;
        }
        .title span { color: #dc3545; }
        .form-control {
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .btn {
            padding: 0.75rem;
            font-size: 1rem;
        }
        .btn-primary { background-color: #dc3545; border: none; }
        .btn-primary:hover { background-color: #bb2d3b; }
        .btn-outline-secondary { border-radius: 8px; }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 10px;
        }
        @media (max-width: 576px) {
            .card { margin: 0 1rem; padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>

    <nav class="navbar p-3">
        <div class="container">
            <span class="navbar-brand">TREINO+</span>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center login-container">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">

                <h2 class="text-center mb-3 title">
                    Bem-vindo ao <span>Treino+</span>
                </h2>

                <p class="text-center text-muted mb-4">
                    Entre ou crie sua conta para continuar
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Senha" required>
                    </div>

                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">ACESSAR</button>
                    </div>

                    <div class="d-grid">
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">CADASTRAR</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>