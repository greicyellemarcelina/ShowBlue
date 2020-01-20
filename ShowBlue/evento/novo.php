<?php
    include "../db.php"; 

    session_start();
    if(!isset($_SESSION["id_usuario"])){ 
        //verifica se o id está na session....
        //se não tiver... manda pra index...
        ?>
        <script>
            window.location.href = "login.php";
        </script>    
        <?php
        
        die();
        //mata a execucao da pagina... pois não está logado
    }    

    $nome = $_SESSION["nome_usuario"];
    
    $stmt = $db->prepare('select * from tipo_evento');
    $stmt->execute();
    $tipos_evento = $stmt->fetchAll(PDO :: FETCH_OBJ);

  

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
        <div id="topo" style="position: absolute; z-index: 999999">  
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="height:80">
                    <div class="navbar-header">
                        <button 
                            type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        </button>                        
                        <a class="navbar-brand" href="../index.php">
                            <img src="../img/logo-media.png" style="width: 150px; padding:2px; margin-top:-15px">
                        </a>
                    </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <form method="GET" action="buscar.php" class="navbar-form navbar-left" role="search">
                        <div class="input-group" style="margin-top:1px">
                            <input name="busca" type="text" class="form-control" placeholder="Pesquisar" style="width:500px">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" style="width:60px; height:34px">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div> 
                    </div>
                   </form>  
                       
                   <ul class="nav navbar-nav navbar-right">
                        <span style="position: absolute; z-index: 999999; right: 120px; top: 20px ">
                            <b><?=$nome?>
                        </span>
                        <a href="sair.php" class="btn btn-danger" style="position: absolute; z-index: 999999; right: 20px; top: 10px">
                            Sair
                        </a>
                    </ul>                
                </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
        </div>    
         <div class="background-img"></div>	      
         <div class="well" id="conteudo-grande">             
            <h1>
                <i class="fa fa-calendar-plus-o"></i>
                    Cadastrar Eventos
            </h1>  
            
            <div class="col-md-12">
                <form id="form" method="POST" action="inserir.php"> 
                <div id="alerta" class="alert alert-danger hide" role="alert">...</div>          
                            
                <p id="group-nome">
                <label>Titulo do Evento</label> 
                    <input id="txt-nome" type="text" class="form-control" placeholder="Titulo" name="evento">
                </p>
                
                <p id="group-descricao">
                <label>Descrição</label>        
                    <input id="txt-descricao" type="text" class="form-control" placeholder="Descricao" name="descricao">
                </p>
                
                <p id="group-tipo">
                    <label>Tipo</label>
                    <select id="txt-tipo" name="tipo" class="form-control">
                            <option>Selecione...</option>                    
                            <?php                  
                                for ($i = 0; $i < sizeof($tipos_evento); $i++){
                                    $tipo_evento = $tipos_evento[$i]->descricao;
                                    $id_tipo_evento = $tipos_evento[$i]->id;
                                    echo "<option value='$id_tipo_evento'>$tipo_evento</option>";   
                                }                                                                
                            ?>
                        </select>
                </p>
            
                <p id="group-data">
                    <label>Data</label>
                    <input id="txt-data" type="date" class="form-control" placeholder="Data" name="data">
                </p>
            
                <p id="group-hora">
                    <label>Hora</label>
                    <input id="txt-hora" type="hour" class="form-control" placeholder="Hora" name="hora">
            
                <p id="group-responsavel">
                    <label>Responsavel</label>
                    <input id="txt-responsavel" type="text" class="form-control" placeholder="Responsavel" name="responsavel">
                </p>
            
                <p id="group-valor">
                    <label>Valor do Ingresso</label>
                    <input id="txt-valor" type="number" class="form-control" placeholder="Valor" name="valor">
                </p>
                <div class="pull-right">
                    <a href="../" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                         Voltar
                    </a>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-floppy-o"></i>
                            Salvar
                    </button>
                </div>
	       </form>
        </div> 
    </div> 
    <script src="../js/evento/novo.js"></script> 
    <body>
</html>