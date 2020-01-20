<?php

        $id_evento = $_GET['id'];
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
                        
                        <a href="sair.php" class="btn btn-danger" style="position: absolute; z-index: 999999; right: 20px; top: 10px">
                            Sair
                        </a>
                    </ul>                
                </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
        </div>    
         <div class="background-img"></div>                  
         <div class="well" id="conteudo">               
            <h1>
                <i class="fa fa-shopping-cart"></i>
                Vender
             </h1> 
        <div class="col-md-12">
            <form id="form" method="POST" action="ticket.php">    
                <div id="alerta" class="alert alert-danger hide" role="alert">...</div>          
                <input type="hidden" class="form-control" placeholder="id" name="id_evento" value="<?=$id_evento?>"></p>                    
                <div class="group-form" id="group-nome">                        
                    <label>Nome</label> 
                        <input id="txt-nome" type="text" class="form-control" placeholder="Nome" name="nome"></p>
                    </div>
                    
                    <div class="group-form" id="group-cpf">
                    <label>Cpf</label>        
                        <input id="txt-cpf" type="number" class="form-control" placeholder="Cpf" name="cpf"></p>
                        <br>
                    </div>  
                                      
                    <div class="pull-right">
                        <a href="../" class="btn btn-default">
                        <i class="fa <fa-chevron></fa-chevron>-left"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i>
                            Gerar Ticket
                        </button>
                    </div>
            </form>
            <script src="../js/ticket/vender.js"></script>             
    </body>
</html>

