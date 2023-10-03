<?php

if (isset($_GET['termo_busca']) && isset($_GET['tipo_busca'])) 
{
    $termo_busca = $_GET['termo_busca'];
    $tipo_busca = $_GET['tipo_busca'];

    $sql = "SELECT * FROM usuarios WHERE $tipo_busca LIKE ?";
    $stmt = $conn->prepare($sql);
    $termo_busca = "%" . $termo_busca . "%";
    $stmt->bind_param("s", $termo_busca);
    $stmt->execute();
    $res = $stmt->get_result();
} 
else 
{

    $sql = "SELECT * FROM usuarios";
    $res = $conn->query($sql);
}
    
$qtd = $res->num_rows;

if ($qtd > 0) 
{
    ?>
    <h1>Resultados da Busca</h1>

    <table class='table table-hover table-striped table-bordered'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>

        <?php while ($row = $res->fetch_object()) 
        { ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->nome; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->data_nasc; ?></td>
                
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
{ ?>
    <h1>Nenhum Resultado Encontrado</h1>
<?php 
}
