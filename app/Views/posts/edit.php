<!DOCTYPE html>
<html>
<head>
    <title>Editar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
             background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            font-family: 'Roboto', sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #022c9e;
            font-weight: 600;
            border-left: 4px solid #022c9e;
            padding-left: 10px;
            margin-bottom: 30px;
        }

        label {
            font-weight: 500;
            color: #333;
        }

        .form-control, .form-control-file {
            margin-top: 5px;
        }

        .btn-primary {
            background-color: #022c9e;
            border-color: #022c9e;
        }

        .btn-primary:hover {
            background-color: #021b6f;
            border-color: #021b6f;
        }

        .btn-secondary {
            font-weight: 500;
        }

        img {
            margin-top: 10px;
            border-radius: 4px;
            max-width: 150px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Editar Post</h2>

        <form action="<?= site_url('posts/update/' . $post->id) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" class="form-control" value="<?= esc($post->title) ?>" required>
            </div>

            <div class="form-group">
                <label>Imagem Atual</label><br>
                <?php if ($post->image): ?>
                    <img src="<?= base_url('uploads/' . $post->image) ?>" alt="Imagem">
                <?php else: ?>
                    <p class="text-muted">Sem imagem</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Nova Imagem (se quiser alterar)</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label>Conteúdo</label>
                <textarea name="content" class="form-control" rows="6" required><?= esc($post->content) ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="<?= site_url('posts') ?>" class="btn btn-secondary ml-2">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>
