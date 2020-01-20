<?php
    include "db.php";

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
    
?>

<html>
	<head>
	   <title>ShowBlue</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="sortcut icon" href="img/favicon2.png" type="image/png"/>
            <link rel="stylesheet" href="css/bootstrap.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/font-awesome.css"/>
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
                        <a class="navbar-brand" href="index.php">
                            <img src="img/logo-media.png" style="width: 150px; padding:2px; margin-top:-15px">
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
            <h1><i class="fa fa-calendar-check-o"></i>
                Eventos
            </h1><br>
            <!-- quando está em position absolute, vc pode posicionar usando right, top, left, bottom... -->
            <a href="evento/novo.php" class="btn btn-primary "><i class="fa fa-plus"></i> Cadastrar</a>  
            <a href="ticket/" class="btn btn-primary "><i class="fa fa-ticket"></i> Tickets</a> <br> 
           
            <?php 
                $rs =  $db->query("SELECT evento.*, tipo_evento.descricao AS tipo_evento
                FROM evento 
                INNER JOIN tipo_evento on evento.id_tipo_evento = tipo_evento.id
                ");
            ?>
            <div class="table-responsive">
            <table class="table table-striped talbe-hover">
               <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Responsável</th>
                        <th>Valor</th>
                        <th></th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $rs->fetch(PDO::FETCH_OBJ))
                        {
                        ?>
                        <tr>
                            <td><?php     
                                    echo $row->nome;?>
                            </td>
                            <td><?php 
                                    echo $row->descricao;?>
                            </td>
                            <td><?php
                                    echo $row->tipo_evento;?>
                            </td>
                            <td><?php
                                    echo $row->data;?>
                            </td>
                            <td><?php 
                                    echo $row->hora;?>
                            </td>
                            <td><?php
                                    echo $row->responsavel;?>
                            </td>
                            <td><?php 
                                    echo $row->valor."<br>";?>
                            </td> 
                            <td>
                                <a href="ticket/vender.php?id=<?=$row->id_evento?>"class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>                                
                                <a href="evento/editar.php?id=<?=$row->id_evento?>"class="btn btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>                                     
                                <a href="evento/deletar.php?id=<?=$row->id_evento?>"class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                </div>  
                </div>         
            <?php
            }        
            ?>
            </tbody>            
       </table>

   </body>
</html>