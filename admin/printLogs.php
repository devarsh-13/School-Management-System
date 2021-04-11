<?php



session_start();

require 'connection.php';
require 'Store_data.php';

if (isset($_SESSION['a_id'])) {

    $q = mysqli_query($Conn, "SELECT * FROM `Log`");


?>

    <html>

    <body>

        <tr align="center">
            <td>DATE</td>
            <td>Time</td>
            <td>Name</td>
            <td>Authority</td>
            <td>Contact</td>
            <td>Action</td>
            <td>Status</td>
            <td>IP Address</td>
            <td>Device</td>
            <td>State</td>
            <td>Country</td>
        </tr>
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