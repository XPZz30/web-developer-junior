<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background-color: #343a40;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
        }

        .login-box h3 {
            text-align: center;
            color: #f8f9fa;
            margin-bottom: 30px;
        }

        label {
            color: #adb5bd;
        }

        .btn-primary {
            background-color: #022c9eff;
            border-color: #022c9eff;
        }

        .btn-primary:hover {
            background-color: #0c34a1ff;
            border-color: #0c34a1ff;
        }
        
    </style>
</head>
<body>
    <div class="login-box">
        <h3>Login</h3>

        <?php if (session()->getFlashdata('erro')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('erro') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Entrar</button>
        </form>
    </div>
</body>
</html>
