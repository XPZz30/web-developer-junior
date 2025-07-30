<!DOCTYPE html>
<html>

<head>
    <title class="">Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            font-family: 'Roboto', sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        h2 {
            color: #ffffffff;
            font-weight: 600;
            border-left: 4px solid #022c9e;
            padding-left: 10px;
            margin-bottom: 30px;
        }

        .form-inline input {
            width: 300px;
        }

        .btn-primary {
            background-color: #022c9e;
            border-color: #022c9e;
        }

        .btn-primary:hover {
            background-color: #021b6f;
            border-color: #021b6f;
        }

        .btn-success,
        .btn-secondary {
            font-weight: 500;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 30px;
            transition: transform 0.2s ease;
        }

        .card-header {
            background-color: #2c2c2c;
            border-bottom: 1px solid #444;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header span:first-child {
            font-weight: 600;
            color: #f1fdffff;
            /* Azul ciano para destacar o autor */
            font-size: 1.5rem;
        }

        .card-header span:last-child {
            font-size: 0.9rem;
            color: #cccccc;
            font-style: italic;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #ebebebff;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #080000ff;
            line-height: 1.6;
            background-color: #dfdfdfdf;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }


        .btn-outline-primary {
            border-color: #022c9e;
            color: #022c9e;
        }

        .btn-outline-primary:hover {
            background-color: #022c9e;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Blog</h2>

        <form method="get" class="form-inline mb-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="text" name="q" value="<?= esc($termo) ?>" class="form-control mr-2" placeholder="Buscar posts...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <?php if ($posts->isEmpty()): ?>
            <div class="alert alert-warning">Nenhum post encontrado.</div>
        <?php endif; ?>

        <?php foreach ($posts as $post): ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span><i class="fas fa-user"></i> <?= esc($post->user->username ?? 'Desconhecido') ?></span>
                    <span><i class="far fa-calendar"></i> <?= date('d/m/Y H:i', strtotime($post->created_at)) ?></span>
                </div>
                 <div class="card-header"><h5 class="card-title"><?= esc($post->title) ?></h5></div>

                <?php if ($post->image): ?>
                    <img src="<?= base_url('uploads/' . $post->image) ?>" class="card-img-top" alt="Imagem do post">
                <?php endif; ?>

                <div class="card-body">
                    <p class="card-text"><?= word_limiter(strip_tags($post->content), 20) ?></p>
                    <a href="<?= site_url('posts/' . $post->id) ?>" class="btn btn-sm btn-outline-primary">Ver mais</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>