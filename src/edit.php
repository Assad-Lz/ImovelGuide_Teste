<?php
include_once('conection.php');

$sql = "SELECT * FROM corretores ORDER BY id DESC";
$result_sql = $conn->query($sql);


if (!empty($_GET['id'])) {
    include_once('conection.php');

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM corretores WHERE id=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($userdata = mysqli_fetch_assoc($result)) {
            $cpf = $userdata['cpf'];
            $creci = $userdata['creci'];
            $nome = $userdata['nome'];
        }
    } else {
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Simples</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <main>
        <section>
            <div class="form__container">
                <h1>Cadastro de Corretor</h1>
                <form onchange="validateForm()" class="form__card" method="POST" action="saveEdit.php">
                    <input id="cpf_input" class="form__card_1" type="text" name="cpf" placeholder="Digite seu CPF" value="<?php echo isset($cpf) ? $cpf : ''; ?>">
                    <input id="creci_input" class="form__card_2" type="text" name="creci" placeholder="Digite seu Creci" value="<?php echo isset($creci) ? $creci : ''; ?>">
                    <br>
                    <input id="name_input" class="form__card_3" type="text" name="nome" placeholder="Digite seu Nome" value="<?php echo isset($nome) ? $nome : ''; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
                    <input class="button" type="submit" value="Salvar" id="salvar" name="salvar">
                </form>
            </div>

            <div style="margin: 50px 160px; background-color: #7a7d7b; border-radius: 15px 15px 0 0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Cpf</th>
                            <th scope="col">Creci</th>
                            <th scope="col">Nome</th>
                            <th scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($userdata = mysqli_fetch_assoc($result_sql)) {
                            echo "<tr>";
                            echo "<td>" . $userdata['id'] . "</td>";
                            echo "<td>" . $userdata['cpf'] . "</td>";
                            echo "<td>" . $userdata['creci'] . "</td>";
                            echo "<td>" . $userdata['nome'] . "</td>";
                            echo "<td>
                                <a class='btn btn-sm btn-primary' href='edit.php?id=" . $userdata['id'] . "'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                    </svg>
                                </a>
                                <a class='btn btn-sm btn-danger' href='delete.php?id=" . $userdata['id'] . "' style='margin-left: 5px'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fil'  viewBox='0 0 16 16'>
                                        <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                                    </svg>
                                </a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>