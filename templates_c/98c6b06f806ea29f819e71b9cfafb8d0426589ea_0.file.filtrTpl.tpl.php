<?php /* Smarty version 3.1.27, created on 2016-03-05 14:03:43
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\filtrTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1422056dad92f3212b5_25626082%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98c6b06f806ea29f819e71b9cfafb8d0426589ea' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\filtrTpl.tpl',
      1 => 1457183020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1422056dad92f3212b5_25626082',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'search' => 0,
    'notebook' => 0,
    'pc' => 0,
    'mobil' => 0,
    'tablet' => 0,
    'zbozi' => 0,
    'radek' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56dad92f4bb171_81666536',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56dad92f4bb171_81666536')) {
function content_56dad92f4bb171_81666536 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_paginate_prev')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_prev.php';
if (!is_callable('smarty_function_paginate_middle')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_middle.php';
if (!is_callable('smarty_function_paginate_next')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_next.php';

$_smarty_tpl->properties['nocache_hash'] = '1422056dad92f3212b5_25626082';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styl.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
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
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
 <a href="filtr.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            <?php } else { ?>
        <li><a href="prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
  <?php if (isset($_smarty_tpl->tpl_vars['search']->value)) {?>
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
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['notebook']->value)) {?>
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
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vyrobce[]" value="1"> Goldmex
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vyrobce[]" value="2"> Aycer
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vyrobce[]" value="3"> Esus
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vyrobce[]" value="4"> Lennyvo
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vyrobce[]" value="5"> Alien
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vyrobce[]" value="6"> Grenade Apple
                    </label>
                  </div>
              </div>
            </div>
            <div id="ntb_procesor" class="tab-pane fade">
                <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="1"> Itel A3 (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="2"> Itel A3 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="3"> Itel A5 (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="4"> Itel A5 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="5"> Itel A7 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="6"> AND E-series (počet jader:4)
            </label>
          </div>
        </div>
            </div>
            <div id="ntb_os" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="1"> Windows 
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="2"> Linux
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="4"> GEOS
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="3"> Bez OS
            </label>
          </div>
            </div>
          </div>
          <div id="ntb_s_d" class="tab-pane fade">
            <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="1"> Nové zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="2"> Použité zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="3"> Zánovní skladem 
                </label>
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="1"> Skladem na Eshopu 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="2"> Na objednání u dodavatele
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="3"> Na prodejně 
                </label>
              </div>
            </div>
          </div>
          <div id="ntb_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="1"> Full HD
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="2"> HD Ready
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="3"> 4K
            </label>
          </div>
            </div>
            
          </div>
          <div id="ntb_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="1"> Mvidia FeGorce 890E
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="2"> Mvidia FeGorce 980E
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="3"> Mvidia FeGorce TGX 9000
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="4"> AND FireFro N6000
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="5"> AND Fareon HD 5000M
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="6"> AND Fareon T3 series
            </label>
          </div>
            </div>
          </div> 
        <input type="hidden" name="kategorie" value="<?php echo $_smarty_tpl->tpl_vars['notebook']->value;?>
" >
      </div>
  </form>
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['pc']->value)) {?>
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
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="1"> Goldmex
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="2"> Aycer
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="3"> Esus
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="4"> Lennyvo
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="5"> Alien
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="6"> Grenade Apple
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="7"> HB
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="8"> LOL2000
            </label>
          </div>
        </div>
      </div>
      <div id="pc_procesor" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="1"> Itel A3 (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="2"> Itel A3 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="3"> Itel A5 (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="4"> Itel A5 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="5"> Itel A7 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="6"> AND E-series (počet jader:4)
            </label>
          </div>
        </div>
      </div>
      <div id="pc_os" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="1"> Windows 
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="2"> Linux
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="4"> GEOS
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="3"> Bez OS
            </label>
          </div>
        </div>
      </div>
      <div id="pc_s_d" class="tab-pane fade">
          <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="1"> Nové zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="2"> Použité zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="3"> Zánovní skladem 
                </label>
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="1"> Skladem na Eshopu 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="2"> Na objednání u dodavatele
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="3"> Na prodejně 
                </label>
              </div>
            </div>
          </div>
          <div id="pc_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="1"> Full HD
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="2"> HD Ready
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="3"> 4K
            </label>
          </div>
            </div>
            
          </div>
          <div id="pc_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="2"> Mvidia FeGorce 980E
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="3"> Mvidia FeGorce TGX 9000
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="4"> AND FireFro N6000
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="5"> AND Fareon HD 5000M
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="6"> AND Fareon T3 series
            </label>
          </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="kategorie" value="<?php echo $_smarty_tpl->tpl_vars['pc']->value;?>
" >
        </form>
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['mobil']->value)) {?>
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
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="3"> Esus
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="4"> Lennyvo
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="6"> Grenade Apple
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="7"> HB
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="8"> LOL2000
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="9"> Sunsang
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="10"> Nosy
            </label>
          </div>
        </div>
      </div>
      <div id="mobil_os" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="5"> Aproid 
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="4"> GEOS
            </label>
          </div>
        </div>
      </div>
      <div id="mobil_procesor" class="tab-pane fade">
          <div class="col-xs-12 col-md-12">
              <div class="form-group">
                  <h4>Procesor</h4>
                  <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="10"> Exynos (počet jader:1)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="11"> DragonSnap S4 (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="12"> Cortex I5 (počet jader:2)
            </label>
              </div>
          </div>
      </div>
      <div id="mobil_s_d" class="tab-pane fade">
          <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="1"> Nové zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="2"> Použité zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="3"> Zánovní skladem 
                </label>
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="1"> Skladem na Eshopu 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="2"> Na objednání u dodavatele
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="3"> Na prodejně 
                </label>
              </div>
            </div>
          </div>
          <div id="mobil_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="1"> Full HD
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="2"> HD Ready
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="3"> 4K
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="4"> FWVVGA
            </label>
          </div>
            </div>
            
          </div>
          <div id="mobil_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="7"> Mvidia Quatro E2000A
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="8"> Mvidia Tekra 2k
            </label>
          </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="kategorie" value="<?php echo $_smarty_tpl->tpl_vars['mobil']->value;?>
" >
        </form>
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['tablet']->value)) {?>
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
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="3"> Esus
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="4"> Lennyvo
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="6"> Grenade Apple
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="7"> HB
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="9"> Sunsang
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="vyrobce[]" value="10"> Nosy
            </label>
          </div>
        </div>
      </div>

      <div id="tablet_procesor" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="1"> Itel A3 (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="2"> Itel A3 (počet jader:4)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="8"> Itel Keleron (počet jader:2)
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="9"> Itel Aton (počet jader:4)
            </label>
          </div>
        </div>
      </div>

      <div id="tablet_os" class="tab-pane fade">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>
              <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="1"> Windows 
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="5"> Aproid 
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="4"> GEOS
            </label>
          </div>
        </div>
      </div>
      <div id="tablet_s_d" class="tab-pane fade">
          <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="1"> Nové zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="2"> Použité zboží 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="3"> Zánovní skladem 
                </label>
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="1"> Skladem na Eshopu 
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="2"> Na objednání u dodavatele
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="3"> Na prodejně 
                </label>
              </div>
            </div>
          </div>
          <div id="tablet_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="1"> Full HD
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="2"> HD Ready
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="3"> 4K
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="5"> WUXGA
            </label>
          </div>
            </div>
            
          </div>
        <div id="tablet_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="7"> Mvidia Quatro E2000A
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="8"> Mvidia Tekra 2K
            </label>
          </div>
            </div>
          </div>
      </div>
        <input type="hidden" name="kategorie" value="<?php echo $_smarty_tpl->tpl_vars['tablet']->value;?>
" >
        </form>
  <?php }?>
          <br /> 
          <br />
          <div>
          <?php
$_from = $_smarty_tpl->tpl_vars['zbozi']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek']->key => $_smarty_tpl->tpl_vars['radek']->value) {
$_smarty_tpl->tpl_vars['radek']->_loop = true;
$foreach_radek_Sav = $_smarty_tpl->tpl_vars['radek'];
?>
        <?php if (!($_smarty_tpl->tpl_vars['radek']->key % 3)) {?> <div class="row"><?php }?>
        <div class="col-md-4">
          <div class="boxIN">
            <img src='<?php echo $_smarty_tpl->tpl_vars['radek']->value['obrazek'];?>
' alt="Obrazek<?php echo $_smarty_tpl->tpl_vars['radek']->value['id'];?>
" class="img-vypis"/>
              <blockquote>
                <p><h3><?php echo $_smarty_tpl->tpl_vars['radek']->value['nazev'];?>
</h3></p><br />
                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['radek']->value['popis'],80);?>

                <a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['radek']->value['id'];?>
" class="btn btn-info">Detail</a><br />
                Cena: <?php echo $_smarty_tpl->tpl_vars['radek']->value['cena'];?>
 Kč
                <form class="form-inline">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['id'];?>
" >
            <input type="hidden" name="id_kosik" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['id'];?>
" >
            Počet kusů: <input type="number" class="form-control" name="pocet_kusu" value="1" max="5" min="1" />
            <button type='submit' name='pridat_zbozi' class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Vložit do košíku </button>
          </form>
              </blockquote>
            </div>
        </div>
      <?php if (!(($_smarty_tpl->tpl_vars['radek']->key+1) % 3)) {?></div><?php }?>
      <?php
$_smarty_tpl->tpl_vars['radek'] = $foreach_radek_Sav;
}
?>          
      </div>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-info"><?php echo smarty_function_paginate_prev(array(),$_smarty_tpl);?>
</button>
       <button type="button" class="btn btn-info"><?php echo smarty_function_paginate_middle(array(),$_smarty_tpl);?>
</button>
      <button type="button" class="btn btn-info"><?php echo smarty_function_paginate_next(array(),$_smarty_tpl);?>
</button>
      </div> 
  </body>
</html>
<?php }
}
?>