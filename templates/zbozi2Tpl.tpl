<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <title>Výpis zboží</title>
  </head>
  <body>
  	  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="vypis_zbozi.php">Zboží</a></li>
        <li><a href="administrace/user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="vypis_zbozi.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            {else}
        <li><a href="prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
        <div> Zobrazuji {$paginate.first} - {$paginate.last} z {$paginate.total} záznamů.
          </div>
          <div>
             Zobrazení výpisu <a href="vypis_zbozi.php?vypis=img"/><button type="button" class="btn btn-info">
    <span class="glyphicon glyphicon-th-large"></span> Obrázkově
  </button></a>
          <div class="container">
  <table class="table table-bordered">
    <thead>
     <tr>
     <th>ID</th><th>Název</th><th>Popis</th><th>Cena</th><th>Obrázek</th>
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
  </body>
</html>
