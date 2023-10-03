<h1>Editar Usuario</h1>

<?php 
    $sql = "SELECT * FROM usuarios WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST" onsubmit="return validateForm();">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo $row->email; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" value="<?php echo $row->data_nasc; ?>" class="form-control">
    </div>

    <div class="mb-3">
       <button type="submit" class="btn btn-primary">Enviar</button>
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
