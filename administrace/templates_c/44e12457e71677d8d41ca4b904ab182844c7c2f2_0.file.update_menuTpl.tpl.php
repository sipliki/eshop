<?php /* Smarty version 3.1.27, created on 2016-03-12 21:02:23
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\update_menuTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:817656e475cfad2232_37869413%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44e12457e71677d8d41ca4b904ab182844c7c2f2' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\update_menuTpl.tpl',
      1 => 1457812940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '817656e475cfad2232_37869413',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'admin' => 0,
    'delete_menu' => 0,
    'update_menu' => 0,
    'add_menu' => 0,
    'kategorie' => 0,
    'row_kategorie' => 0,
    'bunka_kategorie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e475cfc14659_98293069',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e475cfc14659_98293069')) {
function content_56e475cfc14659_98293069 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '817656e475cfad2232_37869413';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
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
        <li><a href="../vypis_zbozi.php">Zboží</a></li>
        <li class="active"><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
 <a href="user.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            <?php } else { ?>
        <li><a href="../prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
          <div class="col-lg-12 text-center">
          <h2>Upravit menu</h2>
      <div class="btn-group">
        <a href="user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
       <?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
            <a href="upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit/Smazat zboží</a>
            <a href="pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            <a href="update_menu.php" class="btn btn-primary" name="upravit_menu">Upravit menu</a>
            <a href="upravit_menu.php" class="btn btn-primary" name="pridat_menu">Přidat menu</a>
            <?php }?>
        </div><br />
        <div class="container">
          <?php if (isset($_smarty_tpl->tpl_vars['delete_menu']->value)) {?>
            <div class="alert alert-success" role="alert">Kategorie byla úspěšné smazána</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['update_menu']->value)) {?>
            <div class="alert alert-success" role="alert">Kategorie byla úspěšně změněna</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['add_menu']->value)) {?>
            <div class="alert alert-success" role="alert">Kategorie byla úspěšně přidána</div>
            <?php }?>
          <div class="col-lg-12 text-left">
            <h3>Upravit menu</h3>
          </div>
          <div> 
            <table class="table table-bordered">
    <thead>
     <tr>
     <th>ID</th><th>Název kategorie</th><th>Upravit</th><th>Smazat</th>
     </tr>
    </thead>
    <tbody>
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
        <tr><?php
$_from = $_smarty_tpl->tpl_vars['row_kategorie']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['bunka_kategorie'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['bunka_kategorie']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bunka_kategorie']->value) {
$_smarty_tpl->tpl_vars['bunka_kategorie']->_loop = true;
$foreach_bunka_kategorie_Sav = $_smarty_tpl->tpl_vars['bunka_kategorie'];
?>
        <th><?php echo $_smarty_tpl->tpl_vars['bunka_kategorie']->value;?>
</th>
        <?php
$_smarty_tpl->tpl_vars['bunka_kategorie'] = $foreach_bunka_kategorie_Sav;
}
?> </tr>
      <?php
$_smarty_tpl->tpl_vars['row_kategorie'] = $foreach_row_kategorie_Sav;
}
?>
    </tbody>  
  </table>
          </div>
        </div>
  </body>
</html>
<?php }
}
?>