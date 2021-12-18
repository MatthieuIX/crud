<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- GOOGLE ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>To do list</title>
</head>

<body>
    <main>
        <div class="container">
            <br />
            <header>
                <div class="card">
                    <h1 class="h1 text-center">Ma première application en PHP</h1>
                    <div class="card-body">
                        <p class="p">Ceci est ma première application en PHP qui a pour objectif :</p>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="bi bi-table"></i> Créer et maintenir une base de donnée</li>
                            <li class="list-group-item"><i class="bi bi-file-code-fill"></i> M'entraîner en HTML, PHP, SQL</li>
                            <li class="list-group-item"><i class="bi bi-file-code-fill"></i> Maitriser le framework Bootstrap</li>
                            <li class="list-group-item"><i class="bi bi-sliders"></i> Maîtriser le CRUD [Create, Read, Update, Delete]</li>
                        </ul><br />
                        <a class="btn btn-primary" href="admin/index.php">Aller au panneau d'administration</a>
                    </div>
                </div>
            </header>
            <br />

            <p class="h1 text-center">Liste de tâches</p>
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tâches</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'admin/database.php';
                    $db = Database::connect();
                    $statement = $db->query('SELECT * FROM task');
                    $task = $statement->fetchAll();

                    foreach ($task as $tasks) {
                        echo '<tr><td>' . $tasks['id'] . '</td>';
                        echo '<td>' . $tasks['task'] . '</td>';
                        echo '<td>' . $tasks['state'] . '</td>';
                        echo '<td>' . $tasks['creation_date'] . '</td>';
                    }

                    Database::disconnect();
                    ?>
                    <tr>
                        <td colspan="4"><a href="admin/insert.php"><i class="bi bi-plus-circle-fill"></i> Ajouter une nouvelle tâche</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>