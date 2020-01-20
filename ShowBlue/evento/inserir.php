<?php
    include "../db.php"; 
             
    $nome = $_POST['evento'];
    $descricao = $_POST['descricao'];
    $id_tipo_evento = $_POST['tipo'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $responsavel = $_POST['responsavel'];
    $valor = $_POST['valor'];
   
    $sql = 'INSERT INTO evento (nome, descricao, id_tipo_evento, data, hora, responsavel, valor)
         VALUES ( :nome, :descricao, :id_tipo_evento, :data, :hora, :responsavel, :valor)';   
    $sth = $db->prepare($sql);
    $sth->execute(array( "nome" => $nome,
                          "descricao" => $descricao,
                          "id_tipo_evento" => $id_tipo_evento,  
                          "data" => $data,
                          "hora" => $hora,
                          "responsavel" => $responsavel,
                          "valor" => $valor+0
                         ));
                         
?>  
<html>
    <head>
	   <title>ShowBlue</title>
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
        <h4 class="modal-title">Evento cadastrado!</h4>
      </div>
      <div class="modal-body">
        <p>Seu evento foi criado com sucesso!</p>
      </div>
      <div class="modal-footer">
    <a href="../index.php" class="btn btn-primary">Voltar</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>