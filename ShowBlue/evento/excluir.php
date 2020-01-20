<?php
    include "../db.php";

    $id_evento = $_GET['id_evento'];
    
    $stmt = $db->prepare('DELETE FROM evento WHERE id_evento = :id_evento'); 
    $stmt->execute(array( "id_evento" => $id_evento));   

?>
<html>
    <head>
        <title>ShowBlue</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                        Excluido com sucesso!            
                    </p>
                </div>
                <div class="modal-footer">
                    <a  class="btn btn-primary" href="../index.php">Voltar</a> 
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    </body>
</html>