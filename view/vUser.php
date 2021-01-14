



<?php
//  require 'controller/cUser.php';
//  $cUser = new Controller_usuario();
// if ($_POST['emailHTN'] != '') {
//     echo ($cUser->getUsers('daniel.fernandesd@htn.com.br', '54321', 'nome'));
// }

// echo ($cUser->getUsers('daniel.fernandes@htn.com.br', '54321', 'nome'));
//ajustar essa parte, pois é a view que tem que consumir da controler e mandar para index

echo $_POST['emailHTN']; 
echo $_POST['passwdHTN'];
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
  <div class="form-group">
    <label for="InputEmail1">E-mail</label>
    <input name="emailHTN" type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Informe seu email">
    <small id="emailHelp" class="form-text text-muted">Já mas forneça seu email para outra pessoa!</small>
  </div>
  <div class="form-group">
    <label for="InputPassword1">Senha</label>
    <input type="password" name="passwdHTN" class="form-control" id="InputPassword1" placeholder="Informe sua Senha">
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>




</body>
</html>