<?php
include("conexaoBD.php");
include("protect.php");
protect();

session_start();

$selectCupons = "SELECT * FROM tb_cupons WHERE id_cli2 = '$_SESSION[id_cli2]'";
$exec1 = sqlsrv_query($conn, $selectCupons);
if ($exec1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Cupons</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/icon" href="img/logo.ico" />
        <link rel="stylesheet" href="css/viewEstacionamento.css">
        <link rel="stylesheet" href="css/delmodal.css">
        <script src="js/JQuery.js" type="text/javascript"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        .sidebar .icone {
            position: relative;
            float: right;
            color: transparent;
        }
        
        .sidebar .icone:hover {
            background-color: transparent;
            color: transparent;
        }
        
        input[type="button"] {
            margin: 10px;
            background-color: #F7CE3E;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: .3s;
        }
        
        input[type="submit"] {
            margin: 10px;
            background-color: #F7CE3E;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: .3s;
        }
        
        button[type="button"] {
            background-color: #F7CE3E;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: .3s;
        }
        
        .content a {
            text-decoration: none;
            color: black;
            margin: 10px;
            background-color: #F7CE3E;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: .3s;
        }
        
        input[type="button"]:hover,
        .content a:hover,
        input[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: black;
            color: blanchedalmond;
        }
        
        @media screen and (max-width: 600px) {
            .sidebar a:not(:first-child) {
                display: none;
            }
            .sidebar a.icon {
                float: right;
                display: block;
            }
            .sidebar .icone {
                position: fixed;
                float: right;
                color: rgb(11, 19, 19);
            }
            .sidebar .icone:hover {
                background-color: #555;
                color: white;
            }
            input[type="button"] {
                width: 100%;
                margin-left: 0;
            }
            button[type="submit"] {
                width: 100%;
                margin: 5px;
                margin-left: 0;
            }
        }
        
        @media screen and (max-width: 600px) {
            .sidebar.responsive {
                position: relative;
            }
            .sidebar.responsive .icone {
                position: fixed;
                right: 0;
                top: 0;
            }
            .sidebar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>

    <body>

        <div class="sidebar" id="navzao">
            <a href="javascript:void(0);" class="icone" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="indexGerenciador.php">Início</a>
            <a href="viewEstacionamento.php">Estacionamento</a>
            <a href="viewFuncionario.php">Funcionário</a>
            <a href="viewVagas.php">Vagas</a>
            <a class="active" href="viewCupons.php">Cupons</a>
            <a href="viewControle.php">Controle de Entrada e Saída</a>
            <a href="viewReserva.php">Reserva</a>
            <a href="#">Sair</a>
        </div>

        <div class="content">
            <h2>Cupons</h2>
            Para editar ou excluir um cupom, marque o cupom desejado primeiro.
            <form method="POST" action="editCupons.php">
                <table id="customers">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                    </tr>
                    <?php while ($dado = sqlsrv_fetch_array($exec1)) { ?>
                    <tr>
                        <td><input type="radio" name="radioSelecaoCupom" value="<?php echo $dado['id_cupom'] ?>"></td>
                        <td>
                            <?php echo $dado['id_cupom'] ?>
                        </td>
                        <td>
                            <?php
                            if ($dado['status_cupons'] === 1) {
                                echo "Ativo";
                            } else {
                                echo "Inativo";
                            }

                            ?>
                        </td>
                        <td>R$
                            <?php echo number_format($dado['valor'], 2, ",", ".") ?>
                        </td>
                        <td>
                            <?php echo $dado['descricao'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <table>
                    <tr>
                        <td>
                            <a href="cadCupons.php">Cadastrar cupom novo</a></td>
                        <td><input type="submit" name="editar" value="Editar"></td>
                        <td><button type="button" name="excluir" id="button">Excluir</button></td>
                    </tr>
                </table>
            </form>

        </div>
        <div class="bg-modal">
            <div class="modal-content">
                <form action="">
                    <div class="close">+</div>
                    <h2>Deseja excluir o(s) item(s) selecionado(s)?</h2>
                    <button class="close" type="button">Cancelar</button>
                    <button type="button" onclick="idCupom()">Confirmar</button>
                </form>
            </div>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("navzao");
                if (x.className === "sidebar") {
                    x.className += " responsive";
                } else {
                    x.className = "sidebar";
                }
            }

            document.getElementById('button').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'flex';
            });

            document.querySelector('.close').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'none';
            });
            document.querySelector('button.close').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'none';
            });

            function idCupom() {
                var checkRadio = document.getElementsByName("radioSelecaoCupom");

                for (var i = 0 in checkRadio)
                    if (checkRadio[i].checked)
                        var idCupom = checkRadio[i].value;
                $.ajax({
                    url: "delCuponsModel.php",
                    type: "POST",
                    data: {
                        idCupom: idCupom
                    },
                    cache: false,
                    success: function(sucesso) {
                    alert('Excluido com sucesso');
                    location.reload();
                    }
                });
            }
        </script>
    </body>

    </html>