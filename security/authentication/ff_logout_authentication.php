<?php

session_start();//iniciando a sessao;
session_unset();//esvazindo as variaveis;
session_destroy();//destruindo a sessao;
header('location:../../index.php');//redirecionando a home;

?>