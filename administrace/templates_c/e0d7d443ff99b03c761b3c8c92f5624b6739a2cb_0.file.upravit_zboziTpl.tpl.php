<?php /* Smarty version 3.1.27, created on 2016-03-13 17:50:41
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\upravit_zboziTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2557356e59a6188ac99_18641752%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0d7d443ff99b03c761b3c8c92f5624b6739a2cb' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\upravit_zboziTpl.tpl',
      1 => 1457887838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2557356e59a6188ac99_18641752',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'update_fail' => 0,
    'admin' => 0,
    'pridano' => 0,
    'zbozi' => 0,
    'radek' => 0,
    'bunka' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e59a61923336_89199621',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e59a61923336_89199621')) {
function content_56e59a61923336_89199621 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2557356e59a6188ac99_18641752';
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
        <li class="active"><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
</p></li>
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
            <?php if (isset($_smarty_tpl->tpl_vars['update_fail']->value)) {?>
          <div class="alert alert-danger" role="alert">Nebylo definováno ID zboží, které chcete upravit.</div>
          <?php }?> 
          <h2>Administrace zboží</h2>
      <div class="btn-group">
        <a href="user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
            <?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
            <a href="upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit/Smazat zboží</a>
            <a href="pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            <a href="update_menu.php" class="btn btn-primary" name="upravit_menu">Upravit menu</a>
            <a href="upravit_menu.php" class="btn btn-primary" name="pridat_menu">Přidat menu</a>
            <a href="vypis_objednavek.php" class="btn btn-warning" name="vypis-objednavek">Výpis všech objednávek</a>
            <?php }?>
        </div><br /><br />
        <?php if (isset($_smarty_tpl->tpl_vars['pridano']->value)) {?>
        <div class="col-md-12 text-center">
          <div class="alert alert-success" role="alert">Zboží bylo úspěšně přidáno do databáze</div>
        </div>
        <?php }?>
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
      <?php
$_from = $_smarty_tpl->tpl_vars['zbozi']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek']->value) {
$_smarty_tpl->tpl_vars['radek']->_loop = true;
$foreach_radek_Sav = $_smarty_tpl->tpl_vars['radek'];
?>
        <tr><?php
$_from = $_smarty_tpl->tpl_vars['radek']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['bunka'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['bunka']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bunka']->value) {
$_smarty_tpl->tpl_vars['bunka']->_loop = true;
$foreach_bunka_Sav = $_smarty_tpl->tpl_vars['bunka'];
?>
        <th><?php echo $_smarty_tpl->tpl_vars['bunka']->value;?>
</th>
        <?php
$_smarty_tpl->tpl_vars['bunka'] = $foreach_bunka_Sav;
}
?> </tr>
      <?php
$_smarty_tpl->tpl_vars['radek'] = $foreach_radek_Sav;
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