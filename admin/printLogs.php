<?php



session_start();

require 'connection.php';
require 'Store_data.php';

if (isset($_SESSION['a_id'])) {

    $q = mysqli_query($Conn, "SELECT * FROM `Log`");


?>

    <html>
<body>

                                         
    <thead>
        <tr align="center">
            <th>DATE</th>
            <th>Time</th>
            <th>Name</th>
            <th>Authority</th>
            <th>Contact</th>
            <th>Action</th>
            <th>Status</th>
            <th>IP Address</th>
            <th>Device</th>
            <th>State</th>
            <th>Country</th>
        </tr>
    </thead>
    <?php


    while ($data = mysqli_fetch_assoc($q)) {
        echo "<tr align='center'>";
        foreach ($data as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
}
    ?>

    </body>

    </html>
