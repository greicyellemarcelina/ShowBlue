<?php
    include "../db.php"; 
             
    $nome_usuario = $_POST['nome'];
    $email_usuario = $_POST['email'];
    $senha = $_POST['senha'];
      
    $sql = 'INSERT INTO usuario (nome_usuario, email_usuario, senha)
         VALUES ( :nome_usuario, :email_usuario, :senha)';   
    $sth = $db->prepare($sql);
    $sth->execute(array( "nome_usuario" => $nome_usuario,
                          "email_usuario" => $email_usuario,
                          "senha" => $senha,  
                          ));                         
?>  
<html>
    <head>
        <title>ShowBlue</title>
            <link rel="sortcut icon" href="../img/favicon2.png" type="image/png"/>
            <link rel="stylesheet" href="../css/bootstrap.css" />
            <link rel="stylesheet" href="../css/style.css" />
            <link rel="stylesheet" href="../css/font-awesome.css"/>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body>
           <div class="background-img"></div>
            <div class="modal show" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastro Realizado!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Seu cadastro foi realizao com sucesso!</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php" class="btn btn-primary"><i class="fa fa-chevron-left"></i>
                            Voltar
                        </a>
                    </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </body>
</html>