<?php /* Smarty version 3.1.27, created on 2016-03-06 15:32:40
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\zboziTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1346356dc3f889a6d31_22198667%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd46e646a40aaeff044eef36a0a19a4ad8bad30cc' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\zboziTpl.tpl',
      1 => 1457274757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1346356dc3f889a6d31_22198667',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'prazdny_kosik' => 0,
    'fail_kategorie' => 0,
    'zbozi' => 0,
    'radek' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56dc3f88af5406_49218531',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56dc3f88af5406_49218531')) {
function content_56dc3f88af5406_49218531 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_paginate_prev')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_prev.php';
if (!is_callable('smarty_function_paginate_middle')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_middle.php';
if (!is_callable('smarty_function_paginate_next')) require_once 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\libs\\plugins\\function.paginate_next.php';

$_smarty_tpl->properties['nocache_hash'] = '1346356dc3f889a6d31_22198667';
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
 <a href="vypis_zbozi.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            <?php } else { ?>
        <li><a href="prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
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

  <?php if (isset($_smarty_tpl->tpl_vars['prazdny_kosik']->value)) {?>
  <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-shopping-cart"></span> Váš košík je prázdný.</div>
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['fail_kategorie']->value)) {?>
  <div class="alert alert-danger text-center" role="alert"></span> Nebyla vybrána kategorie produktů</div>
  <?php }?>
          

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
      <div class="col-md-12">
        <?php echo smarty_function_paginate_prev(array(),$_smarty_tpl);
echo smarty_function_paginate_middle(array(),$_smarty_tpl);
echo smarty_function_paginate_next(array(),$_smarty_tpl);?>

      </div>           
      
  </body>
</html><?php }
}
?>