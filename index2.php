<!DOCTYPE html>
<html>
    <head>

        <?php $xml=simplexml_load_file("allStops.xml"); ?>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <title>Bus Times</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class="container">

            <h1 style="text-align:center;text-decoration: underline">All Stops</h1>
            <div id="info">
            <button class="btn btn-primary"><a href="/bus-times"><span style="color:white">Realtime info</a></span></button>
                <table class='table table-striped table-hover table-responsive'>
                    <tbody>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Route</th>
                    <?php
                    foreach ($xml -> results -> result as $res) { ?>
                        <tr>
                            <td><?=$res -> stopid?></td>
                            <td><?=$res -> shortname?></td>
                            <td><?=$res -> operators -> operator -> routes -> route?></td>
                        </tr>
                    <?php } ?>
            </div>
        </div>
    </body>
</html>