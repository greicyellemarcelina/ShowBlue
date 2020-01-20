<?php 
session_start();

$email_usuario = '';
$senha = '';

$email_usuario = $_POST['email_usuario'];
$senha = $_POST['senha'];

include "db.php"; 

      $stmt = $db->prepare("SELECT * FROM usuario WHERE email_usuario = :email_usuario AND senha = :senha");
      $stmt->execute(array( "email_usuario" => $email_usuario,  
                            "senha" => $senha));
      $usuario = $stmt->fetch( PDO::FETCH_OBJ);
 
      if(! $usuario ){
     ?>
         <script>
              window.location.href = "erro-login.php";
         </script>
     <?php
     session_destroy();  
      
     }else{
         //aqui vc poe na session o id do usuario, e o nome ... é mais interessante
         $_SESSION["id_usuario"] = $usuario->id_usuario;
         $_SESSION["nome_usuario"] = $usuario->nome_usuario;
         $_SESSION["email_usuario"] = $usuario->email_usuario;
        //$_SESSION["senha"] = $usuario->senha; //senha nao...
         
        ?>
        <script> 
            window.location.href = "index.php";
        </script>
        <?php
        
    }
    ?>