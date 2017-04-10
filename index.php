<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <title>Bus Times</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center;text-decoration: underline">Bus Times</h1>
            <button class="btn btn-primary"><a href="allStops.php"><span style="color:white">All stops</a></span></button>
            <div id="info">
                <!-- CONTENT GOES HERE -->
            </div>
            <div class="row">
                <div class="col-md-6" id="display-msg">
                </div>
                <div class="col-md-6">
                    <form class="form-inline pull-right" id="stop_form" method="post" action="index.php">
                        <input type="text" id="stop" class="form-control mb-2 mr-sm-2 mb-sm-0" value="" name="stop_id" placeholder="Enter a stop number" autofocus>
                        <button type="submit" class="btn btn-primary" id="go">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        $('#stop_form').submit( function (e) {
            $('#info').slideUp('slow');
            e.preventDefault();
            $info = $(this).serializeArray();

            var request = $.ajax({
              url: "retrieve.php",
              method: "POST",
              data: $info,
              dataType: "html"
            });

            request.done(function( msg ) {
                $('#info').html(msg);
                $('#display-msg').html("<i>Displaying results for Stop number </i><i style='color:green'>"+$('#stop').val()+"</i>");
                $('#info').slideDown('slow');
            });
             
            request.fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
            });
        });
    </script>
</html>