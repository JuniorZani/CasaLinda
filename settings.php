<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Linda - Ajustes</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/settings_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
</head>

<body>
    <?php
    include_once("screen.php");
    ?>

    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%; padding: 20px 14px;">
            <div class="col-3 d-flex align-items-center">
                <h4 class="title" style="padding-top: 13px;">Ajustes</h4>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="height: 85%">
            <div class="col-6">
                <div class="div h-100 content">
                    <div class="row justify-content-center">
                        <div class="col-1">
                            <a class="btn add-prod text-center" style="padding: 12px 14px" href="#" data-toggle="tooltip" data-placement="top" title="Alterar Senha">
                                <i class="fa-solid fa-unlock fa-2xl"></i>
                            </a>
                        </div>
                        <div class="col-2" style="padding-left: 25px">
                            <p>Alterar Senha</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-1">
                            <a class="btn add-prod text-center" style="padding: 12px 8px" href="#" data-toggle="tooltip" data-placement="top" title="Adicionar Funcionarios">
                                <i class="fa-solid fa-user-group fa-2xl"></i>
                            </a>
                        </div>
                        <div class="col-2" style="padding-left: 25px">
                            <p>Adicionar Funcionários</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <img class="macaware" src="img/macaware_logo.svg">
            </div>
        </div>
        <div class="row" style="height: 5%">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p>© 2022 - Powered by Macaware</p>
            </div>
        </div>
    </div>
</body>

</html>