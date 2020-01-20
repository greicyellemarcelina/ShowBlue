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
                  
        <div class="well" id="conteudo-grande">               
            <h1>
                Cadastre-se
             </h1> 
               
            <form id="form" method="POST" action="novo.php" > 
                <div id="alerta" class="alert alert-danger hide" role="alert">...</div>
                <div class="col-md-12">
                    
                    <p id="group-nome">
                        <label>Nome</label> 
                        <input id="txt-nome" type="text" class="form-control" placeholder="Nome" name="nome">
                    </p>
                
                    <p id="group-email">
                        <label>E-mail</label> 
                        <input id="txt-email" type="text" class="form-control" placeholder="E-mail" name="email">
                    </p>
                    
                    <p id="group-senha">
                        <label>Senha</label> 
                        <input id="txt-senha" type="password" class="form-control" placeholder="Senha" name="senha">
                    </p>    
                            
                    <br>
                    <div class="pull-right">
                        <a href="../" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                            Voltar
                        </a>
                        <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i>
                            Enviar
                        </button>
                    </div>
                    
                </div>
            </form>
        </div>
        <script src="../js/usuario/cadastrar.js"></script>      
    </body>
</html>