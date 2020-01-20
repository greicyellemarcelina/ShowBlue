<?php
include "../db.php";
        $id_ticket = $_GET['id_evento'];        
         
        $stmt = $db->prepare("SELECT 
                            ticket.nome, ticket.cpf, ticket.data, evento.nome AS evento, evento.descricao, evento.valor
                            FROM ticket
                            INNER JOIN evento ON ticket.id_evento = evento.id_evento
                            WHERE ticket.id_ticket = :id_ticket");
        $stmt->execute(array( "id_ticket" => $id_ticket));
        $ticket = $stmt->fetch( PDO::FETCH_OBJ );

        $nome = $ticket->nome;
        $cpf = $ticket->cpf;
        $descricao= $ticket->descricao;
        $evento =$ticket->evento;
        $data =$ticket->data;   
        $valor =$ticket->valor;            
                      
        $cpf = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})/i", "$1.$2.$3-$4", $cpf);
        
        $phpdate = strtotime( $data );
        $data = date( 'd/m/y', $phpdate );
        
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body>
        <div class="background-img"></div>
            <div class="modal show" tabindex="-1" role="dialog">
                <div class="modal-dialog" style="width: 700px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                Ticket!
                            </h4>
                        </div>
                        <div class="modal-body">                    
                            <p>
                                Seu ticket foi gerado com sucesso!
                            </p><br> 
                            <div class="ticket">
                                <div class="canhoto"> 
                                </div>
                            <div class="conteudo">
                                <div class="showblue">
                                Show Blue
                            </div>
                            <div class="titulo">
                                <h1>
                                    <?=$evento?>                    
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