<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload de arquivos em PHP</title>
  <style>
    .container {
      margin: 24px;
      display: flex;
      flex-direction: column;
      max-width: 400px;
      gap: 18px;
    }
  </style>
</head>
<body>
  
  <form action="upload.php" method="post" enctype="multipart/form-data" class='container'>
    <h2>Selecione a imagem para enviar:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Enviar Imagem" name="submit">
  </form>

</body>
</html>