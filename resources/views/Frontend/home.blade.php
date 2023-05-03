<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Ecommerce</title>
</head>

<body>
    <p>Esta es la vista HOME de Ecommerce</p>

    <p>El usuario es: <span> {{ Auth::guard('client')->user()->nombres }} {{ Auth::guard('client')->user()->apellidos }}
        </span></p>
</body>

</html>
