<?php /* Smarty version 3.1.27, created on 2016-03-17 17:36:55
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\prijatoTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2416456eadd274a2ae5_70496908%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '925c92b2bccb82ae2e6c602758d8e0573abb1551' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\prijatoTpl.tpl',
      1 => 1457183115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2416456eadd274a2ae5_70496908',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56eadd27767370_25506453',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56eadd27767370_25506453')) {
function content_56eadd27767370_25506453 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2416456eadd274a2ae5_70496908';
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
      <a class="navbar-brand" href="../vypis_zbozi.php">E-shop</a>>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="../administrace/user.php">Můj účet</a></li> 
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
    <div class="col-md-12 text-center"> 
      <h3>Vaše objednávka byla přijata</h3>
    </div>
    <div class="col-md-6 text-center">
        <a href="../vypis_zbozi.php" class="btn btn-primary btn-lg">Zpět na výpis zboží</a>
    </div>
    <div class="col-md-6 text-center">
      <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
      <a href="../objednavka/objednavky.php" class="btn btn-primary btn-lg">Moje objednávky</a>
      <?php }?>
    </div>
</div>
  </body>
</html>
<?php }
}
?>