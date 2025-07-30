<!DOCTYPE html>
<html>

<head>
    <title><?= esc($post->title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        
        body {
            background: linear-gradient(135deg, #1f1f1f, #2c2c2c);
            color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
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
            color: #222;
            font-size: 16px;
            line-height: 1.6;
        }

        .card-img-top {
            border-bottom: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #022c9eff;
            border-color: #022c9eff;
        }

        .btn-primary:hover {
            background-color: #021b6f;
            border-color: #021b6f;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #4e555b;
        }

        .container {
            max-width: 700px;
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

    </style>
</head>

<body>
    <div class="container">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <span><i class="fas fa-user"></i> <?= esc($post->user->username ?? 'Desconhecido') ?></span>
                <span><i class="far fa-calendar"></i> <?= date('d/m/Y H:i', strtotime($post->created_at)) ?></span>
            </div>

            <div class="card-header"><h5 class="card-title"><?= esc($post->title) ?></h5></div>

            <?php if ($post->image): ?>
                <img src="<?= base_url('uploads/' . $post->image) ?>" class="card-img-top" alt="Imagem do post">
            <?php endif; ?>

            <div class="card-body">
                <p class="card-text"><?= esc($post->content) ?></p>
            </div>
        </div>

        <a href="<?= site_url('blog') ?>" class="btn btn-primary mt-4">Voltar para o Blog</a>
    </div>
</body>

</html>