<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div id="headers"></div>
        <form id="loginForm" method="POST">
            <h1 class="text-center">Login Form</h1>
            <div class="form-group">
                <label for="agentCode">UserName:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="response"></div>
        <div id="content"></div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#loginForm").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'login.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    //console.log('response is', response);
                    if (response.uRole == 'admin' || response.uRole == 'user') {
                        // Load the content of admin.php into the #content div
                        $('#loginForm').load('indexOne.php');
                    } else {
                        // Display the error message
                        $('#response').text(response.message);
                    }
                },
                error: function() {
                //    alert('Error occurred while processing your request login.php.');
                }
            });

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
        })
    });
</script>

</html>