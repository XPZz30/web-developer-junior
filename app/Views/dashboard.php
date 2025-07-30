<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .dashboard-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h3 {
            color: #022c9e;
            margin-bottom: 10px;
            font-weight: 600;
        }

        p {
            color: #333;
            margin-bottom: 30px;
        }

        a.btn {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            font-weight: 500;
            padding: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-primary {
            background-color: #022c9eff;
            border-color: #022c9eff;
        }

        .btn-primary:hover {
            background-color: #01308e;
            border-color: #01308e;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
    </style>
</head>

<body>
    <div class="dashboard-box">
        <?php $usuario = session()->get('usuario_logado'); ?>
        <h3>Bem-vindo, <?= isset($usuario['nome']) ? esc($usuario['nome']) : 'Usuário' ?>!</h3>
        <p>Você está logado no painel de controle.</p>

        <a href="<?= site_url('/posts') ?>" class="btn btn-secondary">Ir o controle de posts</a>
        <a href="<?= site_url('blog') ?>" class="btn btn-primary">Ir para o Blog</a>
        <a href="<?= site_url('logout') ?>" class="btn btn-danger">🚪 Sair</a>
    </div>
</body>
</html>
