<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CasaLinda - Painel</title>
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">

    <!-- CSS only -->
    <link rel="stylesheet" href="css/screen_style.css">
    <script src="https://kit.fontawesome.com/d5e6cd2fb5.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="header">
      <div class="logo_company">
          <img src="img/casaLinda_logo.svg" alt="Logo" id="logo_company">
      </div>
      <div class="software_name">
        Controle de Estoque
      </div>
    </div>
    <div class="sidebar">
      <ul class="navlist">
        <li>
          <a href="dashboard.php">
            <i class="fa-solid fa-house fa-xl"></i>
             <span class="links_name">Painel</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
        <li>
          <a href="products.php">
            <i class="fa-solid fa-tag fa-xl"></i>
            <span class="links_name">Produtos</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
        <li>
          <a href="transfer.php">
            <i class="fa-solid fa-arrow-right-arrow-left fa-xl"></i>
            <span class="links_name">Movimentação</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
        <li>
          <a href="storage.php">
            <i class="fa-solid fa-box-archive fa-xl"></i>
            <span class="links_name">Estoque</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
        <li>
          <a href="sales.php">
            <i class="fa-solid fa-sack-dollar fa-xl"></i>
            <span class="links_name">Vendas</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
        <li>
          <a href="reports.php">
            <i class="fa-solid fa-file-lines fa-xl"></i>
            <span class="links_name">Relatórios</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
        <li>
          <a href="settings.php">
            <i class="fa-solid fa-gear fa-xl"></i>
            <span class="links_name">Ajustes</span>
          </a>
          <!-- <span class="tooltip">Painel</span> -->
        </li>
      </ul>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
            <i class="fa-solid fa-user fa-2xl"></i>
            <div class="name_job">
              <div class="name">Livia</div>
              <div class="job">funcionário</div>
            </div>
          </div>
          <a href="login.php">
            <i class="fa-solid fa-right-from-bracket fa-2xl" style="color: #353434" id="log_out"></i>
          </a>
        </div>
      </div>
    </div>
    
    <!-- <div class="home_content">
      <div class="text">Home Content</div>
    </div> -->

    <script>
      let sidebar = document.querySelector(".sidebar");

      sidebar.onmouseover = function(){
        sidebar.classList.toggle("active");
      }
      sidebar.onmouseout = function(){
        sidebar.classList.toggle("active");
      }
    </script>

    <!-- JavaScript Bundle with Popper -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

