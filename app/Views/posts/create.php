<!DOCTYPE html>
<html>
<head>
    <title>Criar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            font-family: 'Roboto', sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
            min-height: 100vh;
            color: #e0e0e0;
        }

        .form-container {
            background-color: #f8f9fa;
            color: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
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

        .btn-primary {
            background-color: #0066cc;
            border-color: #005bb5;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2>Novo Post</h2>

        <form action="<?= site_url('posts/store') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Imagem</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label>Conteúdo</label>
                <textarea name="content" class="form-control" rows="6" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?= site_url('posts') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
