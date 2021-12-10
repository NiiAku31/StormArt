<?php

session_start();

    include('database_connection.php');

    $orderid = $_GET['orderid'];
    $query = "DELETE FROM order_to_purchase WHERE orderid = '$orderid'";

    $run = mysqli_query($conn,$query);

    if($run == true){
        ?>
        <script type = "text/javascript">
            alert("Item Delete Success!");
            window.open('cart.php', 'self');
        </script>
    <?php
    }
?>
