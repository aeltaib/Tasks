<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EO Sample</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Minified Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
</br>
    <form method="POST">
    <div class="input-append date form_datetime">
        <input type="text" name="dt" size="16" readonly>
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div>

    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "dd/mm/yyyy HH:mm:ss",
            autoclose: true,
            todaybtn:true,
        });
    </script>
    </form>
</body>
</html>