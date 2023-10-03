<h1>Lista de Usuarios
    &nbsp
    &nbsp
    <form method="GET" action="index.php" style="display: inline-block;">
        <select name="page" style="display: none;">
            <option value="buscar"></option>
        </select>
        <select name="tipo_busca" style="width: 100px; height: 40px; font-size: 25px;">
            <option value="id">ID</option>
            <option value="nome">Nome</option>
            <option value="email">Email</option>
        </select>
        <input type="text" name="termo_busca" placeholder="Digite o termo de busca" style="width: 400px; height: 40px; font-size: 25px;" value="<?php echo isset($_GET['termo_busca']) ? htmlspecialchars($_GET['termo_busca']) : ''; ?>">
        <button type="submit" class="btn btn-info">Buscar</button>
    </form>
    &nbsp
    &nbsp
    <a href='gerar-pdf.php' class='btn btn-primary' target='_blank'>Gerar PDF</a>
</h1>

<br>

<?php
if (isset($_GET['termo_busca']) && isset($_GET['tipo_busca'])) 
{
    $termo_busca = $_GET['termo_busca'];
    $tipo_busca = $_GET['tipo_busca'];

    $sql = "SELECT * FROM usuarios WHERE $tipo_busca LIKE '%$termo_busca%'";
} 
else 
{
    $sql = "SELECT * FROM usuarios";
}

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) 
{
    ?>
    <table class='table table-hover table-striped table-bordered'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>

        <?php while ($row = $res->fetch_object()) 
        { 
            $data = date('d/m/Y', strtotime($row->data_nasc));
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->nome; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $data; ?></td>
                
                <td>
                    <a href='?page=editar&id=<?php echo $row->id; ?>' class='btn btn-success'>Editar</a>
                    <a href="?page=salvar&acao=excluir&id=<?php echo $row->id; ?>" class='btn btn-danger'>Excluir</a>
                </td>
            </tr>
            <?php  
        } 
        ?>
    </table>
<?php 
} 
else 
{ 
?>
  <p class='alert alert-danger'>Não encontrou resultados</p>
<?php 
}
