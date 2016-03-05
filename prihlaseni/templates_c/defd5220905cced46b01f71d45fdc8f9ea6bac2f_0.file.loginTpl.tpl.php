<?php /* Smarty version 3.1.27, created on 2016-03-05 14:12:48
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\loginTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:725056dadb508b3400_57164782%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'defd5220905cced46b01f71d45fdc8f9ea6bac2f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\loginTpl.tpl',
      1 => 1457183098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '725056dadb508b3400_57164782',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56dadb509c62f3_65135640',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56dadb509c62f3_65135640')) {
function content_56dadb509c62f3_65135640 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '725056dadb508b3400_57164782';
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
  <title>Přihlášení</title>
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
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
<div class="container">
    <div class="col-lg-12 text-center"> 
          <h2>Přihlášení</h2>
      </div><br />
      <form class="form-inline" role="form">
        <div class="form-group">
    <label for="nick">Uživatelské jméno</label>
    <input type="text" class="form-control" id="nick" name="nick" placeholder="Zadejte uživatelské jméno">
  </div>
  <div class="form-group">
    <label for="pwd">Heslo:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Zadejte heslo">
  </div>
  <input type="submit" name="login" class="btn btn-primary" value="Přihlásit se">
   </form>
   <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
   <div class="alert alert-danger" role="alert">Nedhoduje se uživatelské jméno a heslo</div>
   <?php }?>
  </div>
  </body>
</html>
<?php }
}
?>