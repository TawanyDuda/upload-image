</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\style.css">
</head>

<body>
    <div class="container">
        <h1>Envio de arquivos</h1>

        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="imagem" accept="image/*" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

</body>

</html>