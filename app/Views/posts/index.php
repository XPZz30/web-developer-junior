<!DOCTYPE html>
<html>
<head>
    <title>Lista de Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
             background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            font-family: 'Roboto', sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
            min-height: 100vh;
        }

        h2 {
            color: #ffffffff;
            font-weight: 600;
            border-left: 4px solid #022c9e;
            padding-left: 10px;
            margin-bottom: 30px;
        }

        .table-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .table th {
            background-color: #f7f9fb;
            color: #333;
            font-weight: 500;
            font-size: 15px;
        }

        .table td {
            vertical-align: middle;
            font-size: 14px;
            color: #222;
        }

        .btn-primary {
            background-color: #022c9e;
            border-color: #022c9e;
        }

        .btn-primary:hover {
            background-color: #021b6f;
            border-color: #021b6f;
        }

        .btn-warning, .btn-danger {
            font-weight: 500;
        }

        img {
            max-width: 100px;
            border-radius: 4px;
        }

        .alert {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Controle de Posts</h2>
    <a href="<?= site_url('posts/create') ?>" class="btn btn-primary mb-3">Novo Post</a>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Usuário</th>
                    <th>Imagem</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post->id ?></td>
                    <td><?= esc($post->title) ?></td>
                    <td><?= esc($post->user->username ?? 'Desconhecido') ?></td>
                    <td>
                        <?php if ($post->image): ?>
                            <img src="<?= base_url('writable/uploads/' . $post->image) ?>" alt="Imagem">
                        <?php endif; ?>
                    </td>
                    <td><?= date('d/m/Y H:i', strtotime($post->created_at)) ?></td>
                    <td>
                        <a href="<?= site_url('posts/edit/' . $post->id) ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="<?= site_url('posts/delete/' . $post->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirma a exclusão?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="<?= site_url('blog') ?>" class="btn btn-primary mt-4">Ir para Blog</a>
</div>

</body>
</html>
