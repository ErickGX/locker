<?php

include 'controller/AlunoController.php';
include 'controller/FuncionarioController.php';
include 'controller/ArmarioController.php';
include 'controller/CursoController.php';
include 'controller/AuthenticationController.php';



$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url) {

    case '/':
        echo "Tela inicial";
    break;

    case '/login':
        AuthenticationController::authentication();
    break;


    case '/confirmaremail':
        include 'view/confirmaremail.php';
    break;    

    // case '/armarios':
    //     include 'view/armarios.php';;
    // break;    

    case '/cadastro':
        AlunoController::cadastrar();

    break;

    case '/meu-cadastro':
        AlunoController::alterar();
    break;

    case '/listar-aluno':
        //AlunoController::listar();
    break;

    case '/cadastro-funcionario':
        FuncionarioController::cadastrar();
    break;

    case '/listar-funcionario':
        FuncionarioController::listar();
    break;

    case '/alterar-funcionario':
        FuncionarioController::alterar();
    break;

    case '/excluir-funcionario':
        FuncionarioController::excluir();
    break;

    case '/cadastro-curso':
        CursoController::cadastrar();
    break;

    case '/listar-curso':
        CursoController::listar();
    break;

    case '/alterar-curso':
        CursoController::alterar();
    break;

    case '/excluir-curso':
        CursoController::excluir();
    break;

    case '/cadastro-armarios':
        ArmarioController::cadastrar();
    break;

    case '/listar-armarios':
        ArmarioController::listar();
    break;

     
    default:
        echo "Erro 404";       
    break;
    
}




?>