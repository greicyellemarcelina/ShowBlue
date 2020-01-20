<?php
    include "../phpqrcode/qrlib.php";
    include "../db.php";

    $id_ticket = $_GET['id_ticket'];

    $stmt = $db->prepare("SELECT ticket.id_ticket, ticket.token
                        FROM ticket
                        WHERE ticket.id_ticket = :id_ticket");
    $stmt->execute(array( "id_ticket" => $id_ticket));
    $ticket = $stmt->fetch( PDO::FETCH_OBJ );

    $token = $ticket->token;




   // $cpf = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})/i", "$1.$2.$3-$4", $cpf);

    //$phpdate = strtotime( $data );
    //$data = date( 'd/m/y', $phpdate );


    header("Content-Type: image/png");
    QRcode::png($token);

?>