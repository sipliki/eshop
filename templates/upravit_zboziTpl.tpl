<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <title>E-SHOP</title>
  </head>
  <body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user}</p></li>
          {else}
        <li><a href="../prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
          <div class="col-lg-12 text-center"> 
            {if isset($update_fail)}
          <div class="alert alert-danger" role="alert">Nebylo definováno ID zboží, které chcete upravit.</div>
          {/if} 
          <h2>Administrace zboží</h2>
      <div class="btn-group">
        <a href="user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
            {if isset($admin)}
            <a href="upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit/Smazat zboží</a>
            <a href="pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            {/if}
        </div><br /><br />
        {if isset($pridano)}
        <div class="col-md-12 text-center">
          <div class="alert alert-success" role="alert">Zboží bylo úspěšně přidáno do databáze</div>
        </div>
        {/if}
        <div class="container">
          <div class="col-lg-12 text-left">
            <h3>Přihlašovací údaje</h3>
          </div>
          <div>
            <table class="table table-bordered">
    <thead>
     <tr>
     <th>ID</th><th>Název</th><th>Popis</th><th>Cena</th><th>Obrázek</th><th>Upravit</th><th>Smazat</th>
     </tr>
    </thead>
    <tbody>
      {foreach $zbozi as $radek}
        <tr>{foreach $radek as $bunka}
        <th>{$bunka}</th>
        {/foreach} </tr>
      {/foreach}
    </tbody>  
  </table>
          </div>
        </div>
  </body>
</html>
