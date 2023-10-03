<!DOCTYPE html>
<html>
<head>
    <title>Novo Usuário</title>
</head>
<body>
    <h1>Novo Usuário</h1>
    <form action="?page=salvar" method="POST" onsubmit="return validateForm()">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control">
        </div>

        <div class="mb-3">
            <label>E-mail</label>
            <input type="Email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>

        <div class="mb-3">
            <label>Data de Nascimento</label>
            <input type="Date" name="data_nasc" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
        </div>
    </form>

    <script>
        function validateForm() 
        {
            var nome = document.getElementsByName("nome")[0].value;
            var email = document.getElementsByName("email")[0].value;
            var senha = document.getElementsByName("senha")[0].value;
            var dataNasc = document.getElementsByName("data_nasc")[0].value;

            if (nome === "" || email === "" || senha === "" || dataNasc === "") 
            {
                alert("Preencha todos os campos");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
