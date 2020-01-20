<?php
    include "../db.php";
 
    $id_evento = $_GET['id'];
    

    $sth = $db->prepare("select * from evento where id_evento = :id_evento");
    $sth->execute(array( "id_evento" => $id_evento));
    $evento = $sth->fetch(PDO::FETCH_OBJ);
             
?>      
<html>
    <head>
	   <title>ShowBlue</title>
                   <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Excluir Evento</h4>
            </div>
            <div class="modal-body">
                <p>
                    Tem certeza que deseja excluir o evento <strong>"<?= $evento->nome ?>"</strong>         
                </p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" href="../index.php"> 
                    <i class="fa fa-ban"></i>
                    Cancelar
                </a> 
                <a class="btn btn-danger" href="excluir.php?id_evento=<?=$evento->id_evento?>">
                    <i class="fa fa-trash"></i>
                    Excluir
                </a> 
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </body>
</html>