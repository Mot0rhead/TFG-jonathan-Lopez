<?php

    session_start();
    require_once "../model/acessoBD.php";

    if (!isset($_SESSION["username"])){
        header("Location: ../view/login.php");
        exit;
    }
    $user_id = $_SESSION["id"];
    $userList = AcessoBD::getUserList($user_id);
    //enviamos el parametro productList
    $_REQUEST['userList'] = $userList;

    include_once "../view/userList.php";

?>