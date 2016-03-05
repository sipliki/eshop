<?php /* Smarty version 3.1.27, created on 2016-03-01 20:34:14
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\zbozi2Tpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:488656d5eeb6521bf4_51455108%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0dc727b322ca54ef7b70e9a67488ace874f9089' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\zbozi2Tpl.tpl',
      1 => 1455484011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '488656d5eeb6521bf4_51455108',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'paginate' => 0,
    'zbozi' => 0,
    'radek' => 0,
    'bunka' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d5eeb660a0a7_82621651',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d5eeb660a0a7_82621651')) {
function content_56d5eeb660a0a7_82621651 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '488656d5eeb6521bf4_51455108';
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
  <title>Výpis zboží</title>
  </head>
  <body>
  	  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">E-shop</a>
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
        <div> Zobrazuji <?php echo $_smarty_tpl->tpl_vars['paginate']->value['first'];?>
 - <?php echo $_smarty_tpl->tpl_vars['paginate']->value['last'];?>
 z <?php echo $_smarty_tpl->tpl_vars['paginate']->value['total'];?>
 záznamů.
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
  </body>
</html>
<?php }
}
?>