<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Score Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="m-20" id="headers"></div>
    <div>
        <button id='load_xml' class='btn btn-primary m-2'>Auto Play</button>
        <div id='xml_data' style='margin-bottom:50px'></div>
        <div id='xmlSummary_data'></div>
    </div>


    <script>
        $(document).ready(function() {
             $.ajax({
                url: 'setHeaders.php',
                type: 'GET',
                success: function(data) {
                    // Display the response from the server in the #headers element
                    $('#headers').html(data);
                },
                error: function() {
                    alert('Error occurred while processing your request.');
                }
            });
             
            $("#load_xml").click(function() {

                $.ajax({
                    url: 'getDataOne.php',
                    type: 'GET',
                    success: function(data) {
                        $('#xml_data').html(data);
                        console.log(data);

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                    }
                });

                $.ajax({
                    url: 'getDataSummary.php',
                    type: 'GET',
                    success: function(data) {
                        $('#xmlSummary_data').html(data);

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                    }
                });
            })
        });
    </script>

</body>

</html>
