<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <title>Přihlášení</title>
  </head>
  <body>
  		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="../administrace/user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
         {if isset($kosik)}
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user}</p></li>
          {else}
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
<div class="container">
    <div class="col-lg-12 text-center"> 
          <h2>Přihlášení</h2>
      </div><br />
      <form class="form-inline" role="form">
        <div class="form-group">
    <label for="nick">Uživatelské jméno</label>
    <input type="text" class="form-control" id="nick" name="nick" placeholder="Zadejte uživatelské jméno">
  </div>
  <div class="form-group">
    <label for="pwd">Heslo:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Zadejte heslo">
  </div>
  <input type="submit" name="login" class="btn btn-primary" value="Přihlásit se">
   </form>
   {if isset ($error)}
   <div class="alert alert-danger" role="alert">Nedhoduje se uživatelské jméno a heslo</div>
   {/if}
  </div>
  </body>
</html>
