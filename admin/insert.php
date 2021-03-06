<?php

require 'database.php';

$task = $state = "";

if (!empty($_POST)) {
    $task = checkInput($_POST['task']);
    $state = checkInput($_POST['state']);

    $db = Database::connect();
    $statement = $db->prepare('INSERT INTO task (id, task, state, creation_date) VALUES (NULL, ?, ?, NOW())');
    $statement->execute(array($task, $state));
    Database::disconnect();
    header('Location: ../index.php');
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
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
    <title>CREATE</title>
</head>

<body>
    <main>
        <div class="container">
            <h1 class="h1 text-center">Ajouter ma nouvelle tâche</h1>
            <form action="insert.php" method="POST">
                <div class="form-group">
                    <label for="task">Nouvelle tâche</label>
                    <textarea class="form-control" id="task" name="task" rows="1" value="<?php echo $task; ?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="state">Etat</label>
                    <select class="custom-select" id="state" name="state">
                        <option selected value="Nouveau">Nouveau</option>
                        <option value="En cours">En cours</option>
                        <option value="Terminé">Terminé</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                    <a class="btn btn-primary" href="../index.php">Retour</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>