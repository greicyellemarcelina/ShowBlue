<?php
    include "../db.php"; 

    $id_evento = $_POST['id_evento'];   

    $stmt = $db->prepare("SELECT * FROM evento WHERE id_evento = :id_evento");
    $stmt->execute(array( "id_evento" => $id_evento));
    $evento = $stmt->fetch( PDO::FETCH_OBJ );

    $nome_evento= $evento->nome;
    $valor = $evento->valor;
    $descricao = $evento->descricao;
  
    //inserir
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $id_evento = $_POST['id_evento'];

    $phpdate = strtotime( $evento->data );
    $data = date( 'd/m/y', $phpdate );

    $token = md5(uniqid(rand(), true));

   
    $sql = 'INSERT INTO ticket (id_evento, nome, cpf, data, token)
         VALUES ( :id_evento, :nome, :cpf, :data, :token)';   
    $sth = $db->prepare($sql);
    $sth->execute(array( "id_evento" => $id_evento,
                          "nome" => $nome,
                          "cpf" => $cpf,
                          "data" => $data,
                          "token" => $token
                         ));      
              
         
                  
    $id_ticket = $db->lastInsertId();
    
        $nome = '';
        $cpf = '';
       // $data = '';
        
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];   
       // $data = $_POST['data'];                 
      
    $cpf = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})/i", "$1.$2.$3-$4", $cpf);
  
?>
<html>
    <head>
	    <title>ShowBlue</title>
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <link rel="sortcut icon" href="../img/favicon2.png" type="image/png"/>

        <link rel="stylesheet" href="../css/bootstrap.css" />
         <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/ticket.css" />
        <link rel="stylesheet" href="../css/font-awesome.css"/>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <div class="background-img"></div>
        <div class="modal show" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="width: 700px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ticket!</h4>
                </div>
                <div class="modal-body">
                    <p>Seu ticket foi gerado com sucesso!</p><br>   
                     <div class="ticket">
                        <div class="canhoto"> 
                        </div>
                        <div class="conteudo">
                            <div class="showblue">Show Blue</div>
                            <div class="titulo">
                                <h1>
                                    <?=$nome_evento?>                    
                                </h1>
                                <h2>
                                    <?=$descricao?>                    
                                </h2>
                            </div>
                            <div class="qrcode">
                                <img class="img-thumbnail" src="etiqueta.php?id_ticket=<?=$id_ticket?>" alt="">
                            </div>
                            <div class="info">
                                <div class="nome">
                                    <?=$nome?>
                                </div>
                                <div class="cpf">
                                    <?=$cpf?> 
                                </div>
                                <div class="date">
                                    <?=$data?>
                                </div>
                                <div class="date">
                                    R$ <?=$valor?>
                                </div>
                                <div class="logo">
                                    <img src="../img/logo-pequena.png" />    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="../index.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Voltar
                    </a>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </body>       
</html>
