<?php
session_start();

function cadastro_usuario()
{

    global $conexao;

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return [
            'status' => 404,
            'message' => 'Email ja existe.',
        ];
    }

    $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $password]);

    return [
        'status' => 200,
        'message' => 'Usário criado com sucesso.',
    ];
}


function login()
{   
 
    global $conexao;

    $email = $_POST['email'];
    $password = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return [
            'status' => 404,
            'message' => 'Usuário não encontrado.',
        ];
    }

    if (!($password == $user['senha'])) {
        return [
            'status' => 404,
            'message' => 'Senha incorreta.',
        ];
    }

    $_SESSION['idusuario'] = $user['idusuario'];
    $_SESSION['nome'] = $user['nome'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['logado'] = true;

    return [
        'status' => 200,
        'message' => 'Login realizado com sucesso.',
    ];
}

function lista_veiculos()
{
    global $conexao;
    //mudar nome da tabela para o que vc colocou nos carros
    $stmt = $conexao->prepare("SELECT * FROM carros");
    $stmt->execute();
    $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $veiculos;
}

function editar_veiculo()
{
    global $conexao;
    $id = $_POST['idcarros'];
    $nome = $_POST['modelo'];
    $fabricante = $_POST['idfabricante'];
    $tipo = $_POST['tipoveiculo'];
    $ano = $_POST['anofabricacao'];

    $stmt = $conexao->prepare("UPDATE carros SET modelo = ?, idfabricante = ?, tipoveiculo = ?, anofabricacao = ? WHERE idcarros = ?");
    $stmt->execute([$nome, $fabricante, $tipo, $ano, $id]);

    return [
        'status' => 200,
        'message' => 'Veículo editado com sucesso.',
    ];
}

function insere_veiculo()
{

    global $conexao;
    $nome = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $tipo = $_POST['tipo'];
    $ano = $_POST['ano'];

    $stmt = $conexao->prepare("INSERT INTO carros (modelo, idfabricante, tipoveiculo, anofabricacao) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $fabricante, $tipo, $ano]);

    return [
        'status' => 200,
        'message' => 'Veículo inserido com sucesso.',
    ];
}

function deleta_veiculo()
{
    global $conexao;
    $id = $_POST['idcarros'];
    $stmt = $conexao->prepare("DELETE FROM carros WHERE idcarros = ?");
    $stmt->execute([$id]);
}

function pega_um_veiculo()
{
    global $conexao;
    $id = $_POST['idcarros'];
    $stmt = $conexao->prepare("SELECT * FROM carros WHERE idcarros = ?");
    $stmt->execute([$id]);
    $veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $veiculo;
}