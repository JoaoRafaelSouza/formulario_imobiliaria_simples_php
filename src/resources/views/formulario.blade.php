<!-- resources/views/formulario.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1>Formulário de Contato</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contato.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="telefone" name="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mensagem</label>
            <textarea name="mensagem" class="form-control" required></textarea>
        </div>

        <button class="btn btn-primary">Enviar</button>
    </form>
</body>

</html>