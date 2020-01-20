<?php
    session_start();
    if(isset($_SESSION["id_usuario"])){ //verifica se o id está na session....
        //se não tiver... manda pra index...
        ?>
        <script>
            window.location.href = "index.php";
        </script>    
        <?php
        
        die(); //mata a execucao da pagina... pois não está logado
    }
    ?>
<html>
	<head>
	   <title>ShowBlue</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="sortcut icon" href="img/favicon2.png" type="image/png"/>
            <link rel="stylesheet" href="css/bootstrap.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/font-awesome.css"/>
            <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
	<body>  
       <div class="background-img"></div>             
           <a href="usuario/cadastrar.php " class="btn btn-default" style="position: absolute; z-index: 999999; right: 20px; top: 20px">
                Cadastre-se
            </a> 
            
            <div id="centralizar">
                <h1 style="font-family: font-family: 'Dosis', sans-serif;" id="t1">
                <div class="logo">
                    <img src="img/logo-media.png" width="150" height="100" />
                </div>
                <p>ShowBlue</p></h1>
                </div>
                
                <div class="well" id="conteudo-pequeno">                
                    <h1>
                    <p class="imagem">
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                    </p>              
                        Login
                    </h1> 
                
                <form id="form" method="POST" action="entrar.php">  
                    <div id="alerta" class="alert alert-danger hide" role="alert">...</div>
                    <div class="form-group">
                            <div id="group-email" class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input id="txt-email" type="text" class="form-control" placeholder="Usuario" name="email_usuario"></p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div id="group-senha" class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input id="txt-senha"type="password" class="form-control" placeholder="Senha" name="senha"></p>
                            </div>
                        </div>
                        
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-sign-in"></i>
                                Entrar
                            </button>
                        </div>
                        
                    </form>
            </div> 
       <script src="js/login.js"></script>     
    </body>
</html>