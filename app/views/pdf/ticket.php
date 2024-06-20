<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1, h4 {
            text-align: center;
        }

        img {
            display: block;
            margin: auto;
            margin-top: 50px;
            max-width: 100%;
            height: auto;
        }

        .btn {
            margin-top: 50px;
            display: block;
            margin: auto;
            background-color: #008CBA;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #005B7F;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ticket Confirmation</h1>
        <h4>Thank you for purchasing tickets for The Festival. You can find attached to this email your tickets.</h4>

        <div class="card mt-5">
            <div class="card-body">
                <h3 class="card-title"><?php echo $product->getName()?></h3>
                <p class="card-text"><?php echo $product->getDescription()?></p>
           
     <img src="<?= $qrcodeImage ?>" class="qr-code">

            </div>
        </div>

    </div>  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
