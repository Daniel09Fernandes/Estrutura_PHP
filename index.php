<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Produto</title>
    <!-- Required styles for Material Web -->
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>


<nav class="navbar navbar-dark justify-content-between  bg-dark">
  <a id="hm" class="navbar-brand" href="."> <img width="40px" src="img/logo.png"/></a>
 <form action="" class="form-inline" method="post" >
 <input class="form-control mr-sm-2" type="text" hidden name="lg" value="s" >
  <button type="submit" class=" btn btn-dark " > Painel Administrativo  </button>
</form>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar produto" aria-label="Search">
    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1></h1>
    <p class="lead"></p>
  
    <?php
if ($_POST['lg'] == 's') {
    include 'view/vUser.php';
} else {

echo '
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Piccadilly - </h5>
        <div>
          <video width="420" height="540" controls="controls" autoplay="autoplay" controls loop >
            <source src="midia/piccadilly.mp4" type="video/mp4">
            <object data="" width="320" height="840">
            <embed width="320" height="240" src="Yes Bank Advertisment.mp4">
          </object>

        </div>
           <p> MAXI coloca seu corpo ao seu favor

            Os calçados MAXI tem uma manta especial tecnológica localizada abaixo da palmilha. 
            Ela impede o acúmulo de umidade e garante conforto e bem-estar prolongados. 
            Seus pés merecem o máximo de cuidado! </p>

      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Umbro - </h5>
           
        <div>
          <video width="460" height="490" controls="controls" autoplay="autoplay"  controls loop >
            <source src="midia/umbro.mp4" type="video/mp4">
            <object data="" width="320" height="840">
            <embed width="320" height="240" src="Yes Bank Advertisment.mp4">
          </object>
        </div>
         <p> Seja o astro das quadras com o tênis Indoor Umbro Pro 5 Club. 

          O cabedal em material sintético apresenta dupla costura programada. 
          O solado em borracha conta com blaque de costura e EVA em toda a extensão da sola.
          Seu design moderno e estiloso apresenta cores vibrantes para você se destacar nas partidas.</p>
       
      </div>
    </div>
  </div>
</div>
';

}

if ($_POST['emailHTN'] != '') {
    require 'controller/cUser.php';
    $cUser = new Controller_usuario();
    //criar uma pagina de AMD e dar include casso getUser não seja erro
    echo ($cUser->getUsers($_POST['emailHTN'], $_POST['passwdHTN'], 'nome'));
}

?>

</main>

<br>


<blockquote class="blockquote text-white  bg-dark ">
  <p class="mb-0 bg-dark text-white  "> Fim pagina </p>
  <footer class="blockquote-footer"> © Copyright 2020 - Desenvolvido por
    <cite title="Source Title">Humanitarian calçados </cite>
  </footer>
</blockquote>