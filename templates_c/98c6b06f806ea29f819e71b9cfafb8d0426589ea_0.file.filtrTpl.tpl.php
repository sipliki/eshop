<?php /* Smarty version 3.1.27, created on 2016-03-27 16:14:48
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\filtrTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:374656f7ead836abb1_47913612%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98c6b06f806ea29f819e71b9cfafb8d0426589ea' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\filtrTpl.tpl',
      1 => 1458853458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '374656f7ead836abb1_47913612',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'fail_database' => 0,
    'kategorie' => 0,
    'row_kategorie' => 0,
    'kategorie_id' => 0,
    'vyrobce' => 0,
    'vyrobce_row' => 0,
    'procesor' => 0,
    'procesor_row' => 0,
    'os' => 0,
    'os_row' => 0,
    'sz' => 0,
    'sz_row' => 0,
    'dostupnost' => 0,
    'dostupnost_row' => 0,
    'rozliseni' => 0,
    'rozliseni_row' => 0,
    'gpu' => 0,
    'gpu_row' => 0,
    'zbozi' => 0,
    'radek' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f7ead8a0c706_69686151',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f7ead8a0c706_69686151')) {
function content_56f7ead8a0c706_69686151 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_paginate_prev')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_prev.php';
if (!is_callable('smarty_function_paginate_middle')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_middle.php';
if (!is_callable('smarty_function_paginate_next')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_next.php';

$_smarty_tpl->properties['nocache_hash'] = '374656f7ead836abb1_47913612';
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

  <?php if (isset($_smarty_tpl->tpl_vars['fail_database']->value)) {?>
  <div class="alert alert-danger" role="alert">Pro zadané parametry neexistují žádné výrobky</div>
  <?php }?>


    <nav class="navbar navbar-light bg-faded">
  <button class="navbar-toggler hidden-sm-up btn btn-primary" type="button" data-toggle="collapse" data-target="#filtr">
    Filtrování
  </button>
  <div class="collapse navbar-toggleable-xs" id="filtr">
    <a class="navbar-brand" href="#">Kategorie</a>
    <ul class="nav navbar-nav">

      <?php
$_from = $_smarty_tpl->tpl_vars['kategorie']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row_kategorie'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row_kategorie']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row_kategorie']->value) {
$_smarty_tpl->tpl_vars['row_kategorie']->_loop = true;
$foreach_row_kategorie_Sav = $_smarty_tpl->tpl_vars['row_kategorie'];
?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['row_kategorie']->value['presmerovani'];?>
"><?php echo $_smarty_tpl->tpl_vars['row_kategorie']->value['nazev'];?>
</a>
      </li>
      <?php
$_smarty_tpl->tpl_vars['row_kategorie'] = $foreach_row_kategorie_Sav;
}
?>

    </ul>
    <form class="form-inline pull-right">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Vyhledávání" name="search">
      <input type="hidden" name="kategorie" value="<?php echo $_smarty_tpl->tpl_vars['kategorie_id']->value['id'];?>
" >
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
            <li><input type="submit" class="btn btn-warning" name="filtrovani" value="Filtruj"></li>
          </ul>
          <div class="tab-content">
            <div id="vyrobce" class="tab-pane fade in active">
                <div class="col-xs-12 col-md-12">
                  <div class="form-group">
                    <h4>Výrobce</h4>

                    <?php
$_from = $_smarty_tpl->tpl_vars['vyrobce']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vyrobce_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vyrobce_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vyrobce_row']->value) {
$_smarty_tpl->tpl_vars['vyrobce_row']->_loop = true;
$foreach_vyrobce_row_Sav = $_smarty_tpl->tpl_vars['vyrobce_row'];
?>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="vyrobce[]" value="<?php echo $_smarty_tpl->tpl_vars['vyrobce_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['vyrobce_row']->value['nazev'];?>

                      </label>
                    <?php
$_smarty_tpl->tpl_vars['vyrobce_row'] = $foreach_vyrobce_row_Sav;
}
?>

                  </div>
              </div>
            </div>
            <div id="ntb_procesor" class="tab-pane fade">
                <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Procesor</h4>

            <?php
$_from = $_smarty_tpl->tpl_vars['procesor']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['procesor_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['procesor_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['procesor_row']->value) {
$_smarty_tpl->tpl_vars['procesor_row']->_loop = true;
$foreach_procesor_row_Sav = $_smarty_tpl->tpl_vars['procesor_row'];
?>
            <label class="checkbox-inline">
              <input type="checkbox" name="procesor[]" value="<?php echo $_smarty_tpl->tpl_vars['procesor_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['procesor_row']->value['nazev'];?>
 (počet jader: <?php echo $_smarty_tpl->tpl_vars['procesor_row']->value['pocet_jader'];?>
)
            </label>
            <?php
$_smarty_tpl->tpl_vars['procesor_row'] = $foreach_procesor_row_Sav;
}
?>

          </div>
        </div>
            </div>
            <div id="ntb_os" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Operační systém</h4>

              <?php
$_from = $_smarty_tpl->tpl_vars['os']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['os_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['os_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['os_row']->value) {
$_smarty_tpl->tpl_vars['os_row']->_loop = true;
$foreach_os_row_Sav = $_smarty_tpl->tpl_vars['os_row'];
?>
            <label class="checkbox-inline">
              <input type="checkbox" name="os[]" value="<?php echo $_smarty_tpl->tpl_vars['os_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['os_row']->value['nazev'];?>
 
            </label>
            <?php
$_smarty_tpl->tpl_vars['os_row'] = $foreach_os_row_Sav;
}
?>
          
          </div>
            </div>
          </div>
          <div id="ntb_s_d" class="tab-pane fade">
            <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Stav zboží</h4>

                <?php
$_from = $_smarty_tpl->tpl_vars['sz']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sz_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sz_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sz_row']->value) {
$_smarty_tpl->tpl_vars['sz_row']->_loop = true;
$foreach_sz_row_Sav = $_smarty_tpl->tpl_vars['sz_row'];
?>
            <label class="checkbox-inline">
                  <input type="checkbox" name="sz[]" value="<?php echo $_smarty_tpl->tpl_vars['sz_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['sz_row']->value['nazev'];?>
 
                </label>
            <?php
$_smarty_tpl->tpl_vars['sz_row'] = $foreach_sz_row_Sav;
}
?>

              </div>
            </div>
              <div class="col-xs-12 col-md-6">
              <div class="form_group">
                <h4>Dostupnost zboží</h4>

                <?php
$_from = $_smarty_tpl->tpl_vars['dostupnost']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['dostupnost_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['dostupnost_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['dostupnost_row']->value) {
$_smarty_tpl->tpl_vars['dostupnost_row']->_loop = true;
$foreach_dostupnost_row_Sav = $_smarty_tpl->tpl_vars['dostupnost_row'];
?>
            <label class="checkbox-inline">
                  <input type="checkbox" name="dostupnost[]" value="<?php echo $_smarty_tpl->tpl_vars['dostupnost_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['dostupnost_row']->value['nazev'];?>

                </label>
            <?php
$_smarty_tpl->tpl_vars['dostupnost_row'] = $foreach_dostupnost_row_Sav;
}
?>

              </div>
            </div>
          </div>
          <div id="ntb_displej" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Rozlišení displeje</h4>

               <?php
$_from = $_smarty_tpl->tpl_vars['rozliseni']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['rozliseni_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['rozliseni_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rozliseni_row']->value) {
$_smarty_tpl->tpl_vars['rozliseni_row']->_loop = true;
$foreach_rozliseni_row_Sav = $_smarty_tpl->tpl_vars['rozliseni_row'];
?>
            <label class="checkbox-inline">
              <input type="checkbox" name="rozliseni[]" value="<?php echo $_smarty_tpl->tpl_vars['rozliseni_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['rozliseni_row']->value['nazev'];?>

            </label>
            <?php
$_smarty_tpl->tpl_vars['rozliseni_row'] = $foreach_rozliseni_row_Sav;
}
?>

          </div>
            </div>
            
          </div>
          <div id="ntb_grafika" class="tab-pane fade">
              <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <h4>Grafika</h4>

              <?php
$_from = $_smarty_tpl->tpl_vars['gpu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gpu_row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gpu_row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gpu_row']->value) {
$_smarty_tpl->tpl_vars['gpu_row']->_loop = true;
$foreach_gpu_row_Sav = $_smarty_tpl->tpl_vars['gpu_row'];
?>
            <label class="checkbox-inline">
              <input type="checkbox" name="gpu[]" value="<?php echo $_smarty_tpl->tpl_vars['gpu_row']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['gpu_row']->value['nazev'];?>

            </label>
            <?php
$_smarty_tpl->tpl_vars['gpu_row'] = $foreach_gpu_row_Sav;
}
?>

          </div>
            </div>
          </div> 
        <input type="hidden" name="kategorie" value="<?php echo $_smarty_tpl->tpl_vars['kategorie_id']->value['id'];?>
" >
      </div>
  </form>
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
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['radek']->value['id'];?>
" >
            <input type="hidden" name="id_kosik" value="<?php echo $_smarty_tpl->tpl_vars['radek']->value['id'];?>
" >
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
      <div class="col-md-12">
        <?php echo smarty_function_paginate_prev(array(),$_smarty_tpl);
echo smarty_function_paginate_middle(array(),$_smarty_tpl);
echo smarty_function_paginate_next(array(),$_smarty_tpl);?>

      </div>
  </body>
</html>
<?php }
}
?>