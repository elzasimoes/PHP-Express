<!doctype HTML>

<?php

require("conexao.php");
if (isset($_POST["enviado"])) {
    $id_categoria = $_POST["txt_id_categoria"];
    $produto = $_POST["produto"];
    $preco = $_POST["preco"];
    $ativo = $_POST["ativo_produto"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO produto (id_categoria, produto, preco, ativo_produto, descricao) VALUES ('$id_categoria', '$produto', '$preco', '$ativo', '$descricao')";
    $qry = mysqli_query($conexao, $sql);

    if ($qry)
        header("location:lista_produto.php");
    else
        echo "Não foi possível inserir os dados: " . mysqli_error($conexao);
} else if(isset($_GET["id"])){

    $sql = "SELECT * FROM produto WHERE id_produto = ". $_GET["id"];
    $qry = mysqli_query($conexão, $sql);
    $linha = mysqli_fetch_array($qry);

    $id_produto     = $linha["id_produto"];
    $id_categoria   = $linha["id_categoria"];
    $produto        = $linha["produto"];
    $preco          = $linha["preco"];
    $ativo          = $linha["ativo_produto"];
    $descricao      = $linha["descricao"];

}

?>

<html>

<head>
    <meta charset="utf-8">
    <title> Sistema de Produto</title>
</head>

<body>
    <h2>Editar Produto</h2>
    <form method="post">

        Categoria <select name="txt_id_categoria">
            <option value=""> Selecione uma opção: </option>
            <?php 
            $sql = "SELECT * FROM categoria";
            $qry = mysqli_query($conexao, $sql);
            while ($linha = mysqli_fetch_array($qry)){
                  echo "<option value=$linha[id_categoria]>$linha[categoria]</option>"; 
       
            }
            
            ?>
        
        
        </select><br>
        Produto <input type="text" name="produto" value="<?php echo $produto?>"><br>
        Preço <input type="text" name="preco" value="<?php echo $preco?>"><br>
        Ativo <input type="text" name="ativo" value="<?php echo $ativo?>"><br>
        Descrição <textarea name="descricao" <?php echo $descricao?>></textarea><br>

        <input type="hidden" name="enviado" value="ok">
        <input type="submit" value="Cadastrar">

    </form>

    <body>

        <body>

</html>