<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: "Noto Sans", sans-serif;
        }
        .navbar {
            background: #ECE9E6;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #FFFFFF, #ECE9E6);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #FFFFFF, #ECE9E6);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* Credit for gradient: https://uigradients.com/#Clouds */
        }
    </style>
    <title>Zippy Used Autos</title>
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?action=list_vehicles">
                    <h1>Zippy Admin</h1>
                </a>
            </div>
        </nav>
    </header>
    <main class="container">
        <section class="mt-2 mb-2">
            <p class="text-warning"> <?php echo $login_message ?> </p>
            <form action="../admin/index.php" method="POST">
                <label for="username">
                    Username:
                </label>
                <input class="form-control m-1" type="text" name="username">
                <label for="password">
                    Password:
                </label>
                <input class="form-control m-1" type="text" name="password">
                <input type="hidden" name="action" value="login">
                <button class="btn btn-primary m-1">Sign In</button>
            </form>
        </section>
    </main>
</body>

</html>