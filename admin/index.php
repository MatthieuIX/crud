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
                    <h1 class="h1 text-center">Mon tableau d'administration</h1>
                    <div class="card-body">
                        <p class="p">Ceci est ma page d'administration en PHP qui permet :</p>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="bi bi-eye-fill"></i></a> Voir une tâche</li>
                            <li class="list-group-item"><i class="bi bi-pencil-square"></i> Modifier une tâche</li>
                            <li class="list-group-item"><i class="bi bi-trash"></i> Supprimer une tâche</li>
                        </ul>
                        <br />
                        <a class="btn btn-primary" href="../index.php">Retourner à l'application</a>
                    </div>
                </div>
            </header>
            <br />
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tâches</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Date de création</th>
                        <th scope="col" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'database.php';
                    $db = Database::connect();
                    $statement = $db->query('SELECT * FROM task');
                    $task = $statement->fetchAll();

                    foreach ($task as $tasks) {
                        echo '<tr><td class="align-middle">' . $tasks['id'] . '</td>';
                        echo '<td class="align-middle">' . $tasks['task'] . '</td>';
                        echo '<td class="align-middle">' . $tasks['state'] . '</td>';
                        echo '<td class="align-middle">' . $tasks['creation_date'] . '</td>';
                        echo '<td class="align-middle"><a href="view.php?id=' . $tasks['id'] . '" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a> <a href="update.php?id=' . $tasks['id'] . '" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a> <a href="delete.php?id=' . $tasks['id'] . '" class="btn btn-danger"><i class="bi bi-trash"></i></td></tr>';
                    }

                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>