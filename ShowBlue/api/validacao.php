<?php
    include "../db.php";

    $token = $_GET['token'];
    $resposta = array();
    //esta resposta ira para o android com a seguinte informação: 
    //sucesso - indica se deu certo
    //ticket - dados do ticket
    //mensagem - mensagem de erro se houver
    

    $sql = 
    "SELECT 
        ticket.utilizado, 
        ticket.nome,
        ticket.cpf,
        evento.nome AS evento,
        evento.valor,
        evento.responsavel,
        evento.data AS data_evento,
        evento.hora AS hora_evento 
    FROM ticket 
    INNER JOIN evento ON ticket.id_evento = evento.id_evento 
    WHERE token = :token";

    $rs = $db->prepare($sql);
    $rs->execute(array( "token" => $token));
    $tokens = $rs->fetch( PDO::FETCH_OBJ );

    if ($tokens){    

        if ($tokens->utilizado == 0) {
            
        $sql = "UPDATE ticket SET
            utilizado = 1
        WHERE
            token = :token
        ";         

        $stmt = $db->prepare($sql);
        $stmt->execute(array( 
                            "token" => $token
                           ));

        $resposta["sucesso"] = true;
        $resposta["ticket"] = $tokens;
        echo json_encode($resposta); 

        } else {

             $resposta["sucesso"] = false;
             $resposta["ticket"] = $tokens;
             $resposta["mensagem"] = "Ticket já foi usado!";
             echo json_encode($resposta); 
            
        }
    } else {

        $resposta["sucesso"] = false;
        $resposta["mensagem"] = "Ticket inexistente!";
        echo json_encode($resposta); 
    }

?>

