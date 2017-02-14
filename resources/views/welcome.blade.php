
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mes bonbons</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container">
    <h1>Mon stock de bonbons</h1>

    <table id="list" class="table">
        <th>Nom</th>
        <th>Stock</th>
        <th>Ajouter</th>
        <th>Supprimer</th>
    </table>


    <form action="">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input id="nameInput" type="text">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input id="stockInput" type="number">
        </div>
        <div class="form-group">
            <button class="btnCreateCandy" type="submit">Ajouter un nouveau bonbon dans la réserve</button>
        </div>
    </form>
  <script> window.Laravel = { csrfToken : "{{csrf_token()}}"}; </script>
  <script src="js/app.js"></script>

</div>
</body>
</html>