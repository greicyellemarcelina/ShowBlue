<?php
    include "../db.php";   

    $id_evento = $_GET['id'];            

    $stmt = $db->prepare("SELECT * FROM evento WHERE id_evento = :id_evento");
    $stmt->execute(array( "id_evento" => $id_evento));
    $eventos = $stmt->fetch( PDO::FETCH_OBJ );

    $nome = $eventos->nome;
    $descricao = $eventos->descricao;
    $tipo_evento = $eventos->id_tipo_evento;
    $data = $eventos->data;
    $hora = $eventos->hora;
    $responsavel = $eventos->responsavel;
    $valor = $eventos->valor;
?>

<html>
    <head>
	    <title>Show Blue</title>
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
            <h1><i class="fa fa-calendar-o"></i>
                Gerência de Eventos
            </h1> <br>     
        <div class="col-md-12">
                <form id="form" method="POST" action="alterar.php?id_evento=<?=$id_evento?>"> 
                    <div id="alerta" class="alert alert-danger hide" role="alert">...</div>          
                
                    <div class="group-form" id="group-nome">                    
                        <label>Titulo do Evento</label>
                        <input id="txt-nome" type="text" class="form-control" placeholder="Titulo"   name="nome"value="<?=$nome?>"><br>
                    </div>

                    <div class="group-form" id="group-descricao">
                        <label>Descrição</label>        
                        <input id="txt-descricao" type="text"class="form-control" placeholder="Descricao"  name="descricao"value="<?=$descricao?>"><br>
                    </div>

                    <div class="group-form" id="group-tipo">
                        <label>Tipo</label>
                        <select id="txt-tipo" name="tipo" class="form-control">
                
                            <?php 
                            $id_tipo = "";
                            $sth = $db->prepare("SELECT * FROM tipo_evento");
                            $sth->execute();
                            $tipos = $sth->fetchAll(PDO::FETCH_OBJ);

                            for($i = 0; $i < sizeof($tipos); $i++){
                                $tipo = $tipos[$i];

                                $id_tipo = $tipo->id;

                                if($id_tipo == $tipo_evento) { ?>
                                    <option value='<?=$id_tipo?>' selected>
                                    <?php }else{ ?>
                                    <option value='<?=$id_tipo?>'>
                                    <?php
                                    }  

                                    echo $tipo->descricao;
                                    }
                                    ?>
                        </select>
                        <div class="group-form" id="group-data">
                            <label>Data</label>
                            <input type="date" class="form-control" placeholder="Data" id="txt-data" name="data"value="<?=$data?>"><br>
                        </div>
                        
                        <div class="group-form" id="group-hora">
                            <label>Hora</label>
                            <input type="hour" class="form-control" placeholder="Hora" id="txt-hora" name="hora"value="<?=$hora?>"><br>
                        </div>
                        
                        <div class="group-form" id="group-responsavel">
                            <label>Responsavel</label>
                            <input type="text" class="form-control" placeholder="Responsavel" id="txt-responsavel" name="responsavel"value="<?=$responsavel?>"><br>
                        </div>
                        
                        <div class="group-form" id="group-valor">
                            <label>Valor do Ingresso</label>
                            <input type="number" class="form-control" placeholder="Valor" id="txt-valor" name="valor"value="<?=$valor?>"><br>
                        </div>

                        <div class="pull-right">
                            <a href="../" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i>
                                   Voltar
                            </a>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-floppy-o"></i>
                                    Salvar
                            </button>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <script src="../js/evento/novo.js"></script>  
    </body>
</html>