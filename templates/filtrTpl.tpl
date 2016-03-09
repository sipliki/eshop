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
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="filtr.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            {else}
        <li><a href="prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
  {if isset($search)}
  <nav class="navbar navbar-light bg-faded">
  <button class="navbar-toggler hidden-sm-up btn btn-primary" type="button" data-toggle="collapse" data-target="#filtr_ntb">
    Filtrování
  </button>
  <div class="collapse navbar-toggleable-xs" id="filtr_ntb">
    <a class="navbar-brand" href="#">Kategorie</a>
    <ul class="nav navbar-nav">
      <li class="nav-item active">
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
      <input type="text" class="form-control" placeholder="Vyhledávání" name="ntb_search">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Vyhledej</button>
      </span>
    </div>
  </form>
  </div>
</nav>
  {/if}
  {if isset($fail_database)}
  <div class="alert alert-danger" role="alert">Pro zadané parametry neexistují žádné výrobky</div>
  {/if}
  {if isset($notebook)}
    <nav class="navbar navbar-light bg-faded">
  <button class="navbar-toggler hidden-sm-up btn btn-primary" type="button" data-toggle="collapse" data-target="#filtr_ntb">
    Filtrování
  </button>
  <div class="collapse navbar-toggleable-xs" id="filtr_ntb">
    <a class="navbar-brand" href="#">Kategorie</a>
    <ul class="nav navbar-nav">
      <li class="nav-item active">
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
      <input type="text" class="form-control" placeholder="Vyhledávání" name="ntb_search">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Vyhledej</button>
      </span>
    </div>
  </form>
  </div>
</nav>

  {*<div class="container-fluid">
    Zobrazení výpisu <a href="filtr.php?vypis=table"/><button type="button" class="btn btn-info">
    <span class="glyphicon glyphicon-th-list"></span> Tabulkou
  </button></a><br />*}
        <h3>Filtrování parametrů</h3>
        <form>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="pill" href="#vyrobce">Výrobce</a><li>
            <li><a  data-toggle="pill" href="#ntb_procesor">Procesor</a><li>
            <li><a  data-toggle="pill" href="#ntb_os">Operační systém</a></li>
            <li><a  data-toggle="pill" href="#ntb_s_d">Stav a dostupnost zboží</a></li>
            <li><a  data-toggle="pill" href="#ntb_displej">Displej</a></li>
            <li><a  data-toggle="pill" href="#ntb_grafika">Grafická karta</a></li>
            <li><input type="submit" class="btn btn-warning" name="filtruj_notebooky" value="Filtruj"></li>
          </ul>
          <div class="tab-content">
            <div id="vyrobce" class="tab-pane fade in active">
                <div class="col-xs-12 col-md-12">
                  <div class="form-group">
                    <h4>Výrobce</h4>

                    {foreach $vyrobce as $vyrobce_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="vyrobce[]" value="{$vyrobce_row.id}"> {$vyrobce_row.nazev}
                      </label>
                    {/foreach}

                  </div>
              </div>
            </div>
            <div id="ntb_procesor" class="tab-pane fade">
                <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>

            {foreach $procesor as $procesor_row}
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="{$procesor_row.id}"> {$procesor_row.nazev} (počet jader: {$procesor_row.pocet_jader})
            </label>
            {/foreach}

          </div>
        </div>
            </div>
            <div id="ntb_os" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>

              {foreach $os as $os_row}
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="{$os_row.id}"> {$os_row.nazev} 
            </label>
            {/foreach}
          
          </div>
            </div>
          </div>
          <div id="ntb_s_d" class="tab-pane fade">
            <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>

                {foreach $sz as $sz_row}
            <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="{$sz_row.id}"> {$sz_row.nazev} 
                </label>
            {/foreach}

              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>

                {foreach $dostupnost as $dostupnost_row}
            <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="{$dostupnost_row.id}"> {$dostupnost_row.nazev}
                </label>
            {/foreach}

              </div>
            </div>
          </div>
          <div id="ntb_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>

               {foreach $rozliseni as $rozliseni_row}
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="{$rozliseni_row.id}"> {$rozliseni_row.nazev}
            </label>
            {/foreach}

          </div>
            </div>
            {*<div class="col-xs-12 col-md-6">
            <div class="form-group">
              <h4>Úhlopříčka displeje</h4>
            
          </div>
            </div>*}
          </div>
          <div id="ntb_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>

              {foreach $gpu as $gpu_row}
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="{$gpu_row.id}"> {$gpu_row.nazev}
            </label>
            {/foreach}

          </div>
            </div>
          </div> 
        <input type="hidden" name="kategorie" value="{$notebook}" >
      </div>
  </form>
  {/if}
  {if isset($pc)}
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
      <li class="nav-item active">
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
      <input type="text" class="form-control" placeholder="Vyhledávání" name="pc_search">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Vyhledej</button>
      </span>
    </div>
  </form>
  </div>
</nav>
  {*<div class="container-fluid">
    <br /><div> Zobrazuji {$paginate.first} - {$paginate.last} z {$paginate.total} záznamů.</div>
    Zobrazení výpisu <a href="filtr.php?vypis=table"/><button type="button" class="btn btn-info">
    <span class="glyphicon glyphicon-th-list"></span> Tabulkou
  </button></a><br />*}
        <h3>Filtrování parametrů</h3>
        <form>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="pill" href="#pc_vyrobce">Výrobce</a><li>
            <li><a  data-toggle="pill" href="#pc_procesor">Procesor</a><li>
            <li><a  data-toggle="pill" href="#pc_os">Operační systém</a></li>
            <li><a  data-toggle="pill" href="#pc_s_d">Stav a dostupnost zboží</a></li>
            <li><a  data-toggle="pill" href="#pc_displej">Displej</a></li>
            <li><a  data-toggle="pill" href="#pc_grafika">Grafická karta</a></li>
            <li><input type="submit" class="btn btn-warning" name="filtruj_pc" value="Filtruj"></li>
          </ul>

          <div class="tab-content">
            <div id="pc_vyrobce" class="tab-pane fade in active">
          <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Výrobce</h4>

            {foreach $vyrobce as $vyrobce_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="vyrobce[]" value="{$vyrobce_row.id}"> {$vyrobce_row.nazev}
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>
      <div id="pc_procesor" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>
              {foreach $procesor as $procesor_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="procesor[]" value="{$procesor_row.id}"> {$procesor_row.nazev} (počet jader: {$procesor_row.pocet_jader})
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>
      <div id="pc_os" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
              {foreach $os as $os_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="os[]" value="{$os_row.id}"> {$os_row.nazev}
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>
      <div id="pc_s_d" class="tab-pane fade">
          <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                {foreach $sz as $sz_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="sz[]" value="{$sz_row.id}"> {$sz_row.nazev}
                      </label>
                    {/foreach}
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                {foreach $dostupnost as $dostupnost_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="dostupnost[]" value="{$dostupnost_row.id}"> {$dostupnost_row.nazev}
                      </label>
                    {/foreach}
              </div>
            </div>
          </div>
          <div id="pc_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
              {foreach $rozliseni as $rozliseni_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="rozliseni[]" value="{$rozliseni_row.id}"> {$rozliseni_row.nazev}
                      </label>
                    {/foreach}
          </div>
            </div>
            {*<div class="col-xs-12 col-md-6">
            <div class="form-group">
              <h4>Úhlopříčka displeje</h4>
            
          </div>
            </div>*}
          </div>
          <div id="pc_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
              {foreach $gpu as $gpu_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="gpu[]" value="{$gpu_row.id}"> {$gpu_row.nazev}
                      </label>
                    {/foreach}
          </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="kategorie" value="{$pc}" >
        </form>
  {/if}
  {if isset($mobil)}
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
      <li class="nav-item active">
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
      <input type="text" class="form-control" placeholder="Vyhledávání" name="mobil_search">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Vyhledej</button>
      </span>
    </div>
  </form>
  </div>
</nav>
  {*<div class="container-fluid">
    <br /><div> Zobrazuji {$paginate.first} - {$paginate.last} z {$paginate.total} záznamů.</div>
    Zobrazení výpisu <a href="filtr.php?vypis=table"/><button type="button" class="btn btn-info">
    <span class="glyphicon glyphicon-th-list"></span> Tabulkou
  </button></a><br />*}
        <h3>Filtrování parametrů</h3>
        <form>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="pill" href="#mobil_vyrobce">Výrobce</a><li>
            <li><a  data-toggle="pill" href="#mobil_procesor">Procesor</a><li>
            <li><a  data-toggle="pill" href="#mobil_os">Operační systém</a></li>
            <li><a  data-toggle="pill" href="#mobil_s_d">Stav a dostupnost zboží</a></li>
            <li><a  data-toggle="pill" href="#mobil_displej">Displej</a></li>
            <li><a  data-toggle="pill" href="#mobil_grafika">Grafická karta</a></li>
            <li><input type="submit" class="btn btn-warning" name="filtruj_mobil" value="Filtruj"></li>
          </ul>

          <div class="tab-content">
            <div id="mobil_vyrobce" class="tab-pane fade in active">
          <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Výrobce</h4>
               {foreach $vyrobce as $vyrobce_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="vyrobce[]" value="{$vyrobce_row.id}"> {$vyrobce_row.nazev}
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>
      <div id="mobil_os" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
             {foreach $os as $os_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="os[]" value="{$os_row.id}"> {$os_row.nazev}
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>
      <div id="mobil_procesor" class="tab-pane fade">
          <div class="col-xs-12 col-md-12">
              <div class="form-group">
                  <h4>Procesor</h4>
                   {foreach $procesor as $procesor_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="procesor[]" value="{$procesor_row.id}"> {$procesor_row.nazev} (počet jader: {$procesor_row.pocet_jader})
                      </label>
                    {/foreach}
                  
              </div>
          </div>
      </div>
      <div id="mobil_s_d" class="tab-pane fade">
          <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                {foreach $sz as $sz_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="sz[]" value="{$sz_row.id}"> {$sz_row.nazev}
                      </label>
                    {/foreach}
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                {foreach $dostupnost as $dostupnost_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="dostupnost[]" value="{$dostupnost_row.id}"> {$dostupnost_row.nazev}
                      </label>
                    {/foreach}
              </div>
            </div>
          </div>
          <div id="mobil_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
            {foreach $rozliseni as $rozliseni_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="rozliseni[]" value="{$sozliseni_row.id}"> {$rozliseni_row.nazev}
                      </label>
                    {/foreach}
          </div>
            </div>
            {*<div class="col-xs-12 col-md-6">
            <div class="form-group">
              <h4>Úhlopříčka displeje</h4>
            
          </div>
            </div>*}
          </div>
          <div id="mobil_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
            {foreach $gpu as $gpu_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="gpu[]" value="{$gpu_row.id}"> {$gpu_row.nazev}
                      </label>
                    {/foreach}
          </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="kategorie" value="{$mobil}" >
        </form>
  {/if}
  {if isset($tablet)}
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
      <li class="nav-item active">
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
      <input type="text" class="form-control" placeholder="Vyhledávání" name="tablet_search">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Vyhledej</button>
      </span>
    </div>
  </form>
  </div>
</nav>

  {*<div class="container-fluid">
    <br /><div> Zobrazuji {$paginate.first} - {$paginate.last} z {$paginate.total} záznamů.</div>
    Zobrazení výpisu <a href="filtr.php?vypis=table"/><button type="button" class="btn btn-info">
    <span class="glyphicon glyphicon-th-list"></span> Tabulkou
  </button></a><br />*}
        <h3>Filtrování parametrů</h3>
        <form>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="pill" href="#tablet_vyrobce">Výrobce</a><li>
            <li><a  data-toggle="pill" href="#tablet_procesor">Procesor</a><li>
            <li><a  data-toggle="pill" href="#tablet_os">Operační systém</a></li>
            <li><a  data-toggle="pill" href="#tablet_s_d">Stav a dostupnost zboží</a></li>
            <li><a  data-toggle="pill" href="#tablet_displej">Displej</a></li>
            <li><a  data-toggle="pill" href="#tablet_grafika">Grafická karta</a></li>
            <li><input type="submit" class="btn btn-warning" name="filtruj_tablet" value="Filtruj"></li>
          </ul>

          <div class="tab-content">

            <div id="tablet_vyrobce" class="tab-pane fade in active">
          <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Výrobce</h4>
              {foreach $vyrobce as $vyrobce_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="vyrobce[]" value="{$vyrobce_row.id}"> {$vyrobce_row.nazev}
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>

      <div id="tablet_procesor" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>
              {foreach $procesor as $procesor_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="procesor[]" value="{$procesor_row.id}"> {$procesor_row.nazev} (počet jader: {$procesor_row.pocet_jader})
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>

      <div id="tablet_os" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
              {foreach $os as $os_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="os[]" value="{$os_row.id}"> {$os_row.nazev}
                      </label>
                    {/foreach}
          </div>
        </div>
      </div>
      <div id="tablet_s_d" class="tab-pane fade">
          <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                {foreach $sz as $sz_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="sz[]" value="{$sz_row.id}"> {$sz_row.nazev}
                      </label>
                    {/foreach}
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                {foreach $dostupnost as $dostupnost_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="vyrobce[]" value="{$vyrobce_row.id}"> {$vyrobce_row.nazev}
                      </label>
                    {/foreach}
              </div>
            </div>
          </div>
          <div id="tablet_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
            {foreach $rozliseni as $rozliseni_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="rozliseni[]" value="{$rozliseni_row.id}"> {$rozliseni_row.nazev}
                      </label>
                    {/foreach}
          </div>
            </div>
            {*<div class="col-xs-12 col-md-6">
            <div class="form-group">
              <h4>Úhlopříčka displeje</h4>
            
          </div>
            </div>*}
          </div>
        <div id="tablet_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
            {foreach $gpu as $gpu_row}
                      <label class="checkbox-inline">
                        <input type="checkbox" name="gpu[]" value="{$gpu_row.id}"> {$gpu_row.nazev}
                      </label>
                    {/foreach}
          </div>
            </div>
          </div>
      </div>
        <input type="hidden" name="kategorie" value="{$tablet}" >
        </form>
  {/if}
          <br /> 
          <br />
          <div>
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
      </div>
      <div class="col-md-12">
        {paginate_prev}{paginate_middle}{paginate_next}
      </div>
  </body>
</html>
