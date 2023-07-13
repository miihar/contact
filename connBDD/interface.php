<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Liste des contact</h1>
    <main>


        <section class="card shadow">
            <h2 class="card-header enPlus">Voici toute les salle que nous disposons</h2>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Numero</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connexionbdd.php';
                    $uneDonnees = new MaConnexion("contact", "", "root", "localhost");
                    $portable = $uneDonnees->selectContact("contact");
                    foreach ($portable as $donee){

                        echo
                        '<tr>
                                <td>' . $donee['Nom'] . '</td>
                                <td>' . $donee['Prenom'] . '</td>
                                <td>' . $donee['Numero'] . '</td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">suppr contact</button></td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">modifier contact</button></td>
                               
                        <tr>';
                    }
                    ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ajouter un contact</button>

        </section>
        <!-- supprimer un contact -->
        <section>
            <?php
            include "modalUpdate.php";
            include "modalAdd.php";
            include "modalDelete.php";
            ?>


        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>