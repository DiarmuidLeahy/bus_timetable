<?php

    if(isset($_POST['stop_id'])) {
        $xml=simplexml_load_file("https://data.dublinked.ie/cgi-bin/rtpi/realtimebusinformation?stopid=".$_POST['stop_id']."&format=xml") or die("Error: Cannot create object");
    }

    $message = "<table class='table table-striped table-hover table-responsive'>
		            <tbody>
		                <th>Due Time</th>
		                <th>Route #</th>
		                <th>Destination</th>
		                <th>Origin</th>
		                <th>Operator</th>";

        foreach ($xml->results[0] as $res) {
            $row = ($res -> duetime == 'Due' ? "<tr class='danger'><td>" : "<tr>
                        <td>").$res -> duetime.($res -> duetime == 'Due' ? " now</td><td>" : " minutes</td>
                        <td>").$res -> route."</td>
                        <td>".$res -> destination."</td>
                        <td>".$res -> origin."</td>
                        <td>".$res -> operator."</td>
                    </tr>";
            $message .= $row;
        }
        $message .= "</tbody></table>";

echo $message;