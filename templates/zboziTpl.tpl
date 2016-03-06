<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styl.css">

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

  <nav class="navbar navbar-light bg-faded">
  <button class="navbar-toggler hidden-sm-up btn btn-primary" type="button" data-toggle="collapse" data-target="#filtr">
    Filtrování
  </button>
  <div class="collapse navbar-toggleable-xs" id="filtr">
    <a class="navbar-brand" href="#">Kategorie</a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="filtr.php?kategorie=notebook">Notebooky</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="filtr.php?kategorie=pc">Stolní počítače</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="filtr.php?kategorie=mobil">Mobily</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="filtr.php?kategorie=tablet">Tablety</a>
      </li>
    </ul>
    <form class="form-inline pull-right">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Vyhledávání" name="search">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit" name="hledat"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Vyhledej</button>
      </span>
    </div>
  </form>
  </div>
</nav>

  {if isset($prazdny_kosik)}
  <div class="alert alert-danger text-center" role="alert"><span class="glyphicon glyphicon-shopping-cart"></span> Váš košík je prázdný.</div>
  {/if}
  {if isset($fail_kategorie)}
  <div class="alert alert-danger text-center" role="alert"></span> Nebyla vybrána kategorie produktů</div>
  {/if}
          {*<div>
            Zobrazení výpisu <a href="vypis_zbozi.php?vypis=table"/><button type="button" class="btn btn-info">
    <span class="glyphicon glyphicon-th-list"></span> Tabulkou
  </button></a><br />
<br />*}

          {foreach $zbozi as $radek}
        {if $radek@key is div by 3} <div class="row">{/if}
        <div class="col-md-4">
        <div class="boxIN">
        <img src='{$radek.obrazek}' alt="Obrazek{$radek.id}" class="img-vypis"/>
        <blockquote>
        <p><h3>{$radek.nazev}</h3></p><br />
            {$radek.popis|truncate:80}
        <a href="detail.php?id={$radek.id}" class="btn btn-info">Detail</a><br />
          Cena: {$radek.cena} Kč
          <form class="form-inline">
            <input type="hidden" name="id" value="{$radek.id}" >
            <input type="hidden" name="id_kosik" value="{$radek.id}" >
            Počet kusů: <input type="number" class="form-control" name="pocet_kusu" value="1" max="5" min="1" />
            <button type='submit' name='pridat_zbozi' class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Vložit do košíku </button>
          </form>
        </blockquote>
        </div>
        </div>
      {if ($radek@key+1) is div by 3}</div>{/if}
      {/foreach}
      <div class="col-md-12">
        {paginate_prev}{paginate_middle}{paginate_next}
      </div>           
      
  </body>
</html>