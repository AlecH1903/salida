<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f5e9; /* Verde claro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h3 class="text-center">Login</h3>
    <?php if(session()->has('error')): ?>
    <span> <?php echo session()->getFlashdata('error');?> </span>
    <?php endif ?>
    <form action="<?= site_url('responsavels/responsaveis') ?>" method="post">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="11111111111">
            <span> <?php echo session()->getFlashdata('errors')['cpf'] ?? '';?> </span>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="123456">
            <span> <?php echo session()->getFlashdata('errors')['senha'] ?? '';?> </span>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de Acesso</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="moderador" name="tipo[]" value="moderador">
                <label class="form-check-label" for="moderador">Moderador</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="responsavel" name="tipo[]" value="responsavel">
                <label class="form-check-label" for="responsavel">Responsável</label>
            </div>
        </div>

        <button type="submit" class="btn btn-success w-100">Entrar</button>
    </form>
</div>

</body>
</html>
