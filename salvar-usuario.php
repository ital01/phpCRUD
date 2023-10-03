<?php
    switch ($_REQUEST["acao"]) 
    {
        case 'cadastrar':
        $nome = $_POST["nome"];
        $email = strip_tags($_POST["email"]);
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];
        
        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) 
                VALUES('{$nome}' , '{$email}' , '{$senha}' , '{$data_nasc}')";

        $res = $conn->query($sql);

        if ($res == true) 
        {
?>
             <script>
                alert('Cadastro com sucesso');
                location.href = '?page=listar';
            </script>
<?php
        } 
        else 
        {
?>
            <script>
                alert('Não foi possível cadastrar');
                location.href = '?page=listar';
            </script>
<?php
        }
        break;

        case 'editar':
        $nome = $_POST["nome"];
        $email = strip_tags($_POST["email"]);
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];
        $id = $_REQUEST["id"];

        $sql = "UPDATE usuarios SET
                    nome='{$nome}',
                    email='{$email}',
                    senha='{$senha}',
                    data_nasc='{$data_nasc}'
                WHERE id={$id}";

        $res = $conn->query($sql);

        if ($res == true) 
        {
?>
            <script>
                alert('Editado com sucesso');
                location.href = '?page=listar';
            </script>
<?php
        } 
        else 
        {
?>
            <script>
                alert('Não foi possível editar');
                location.href = '?page=listar';
            </script>
<?php
        }
        break;

        case 'excluir':
        $id = $_REQUEST["id"];

        $sql = "DELETE FROM usuarios WHERE id={$id}";

        $res = $conn->query($sql);

        if ($res == true) 
        {
?>
            <script>
                alert('Excluído com sucesso');
                location.href = '?page=listar';
            </script>
<?php
        } 
        else 
        {
?>
            <script>
                alert('Não foi possível excluir');
                location.href = '?page=listar';
            </script>
<?php
        }
        break;
}
