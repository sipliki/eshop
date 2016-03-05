<?php /* Smarty version 3.1.27, created on 2016-03-05 14:12:59
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\registraceTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1513956dadb5b9c28e0_17581919%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f6437b3f8b2765908cec7b9197ab6e0e54f2ccd' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\registraceTpl.tpl',
      1 => 1457183122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1513956dadb5b9c28e0_17581919',
  'variables' => 
  array (
    'error' => 0,
    'vice_uzivatelu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56dadb5ba1bda8_78991670',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56dadb5ba1bda8_78991670')) {
function content_56dadb5ba1bda8_78991670 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1513956dadb5b9c28e0_17581919';
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
        <li><a href="../administrace/user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
          <div class="col-lg-12 text-center"> 
          <h2>Registrace</h2>
          <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
            <div class="alert alert-danger" role="alert">Hesla se neschodují</div>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['vice_uzivatelu']->value)) {?>
            <div class="alert alert-danger" role="alert">Zvolené uživatelské jméno je již registrováno</div>
          <?php }?>
        <div class="container">
          <div class="col-lg-12 text-left">
            <h3>Přihlašovací údaje</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="uzivatelske_jmeno" class="col-sm-2 control-label">Uživatelské jméno</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="uzivatelske_jmeno" name="uzivatelske_jmeno" required>
                </div>
              </div>
                <div class="form-group">
                <label for="heslo" class="col-sm-2 control-label">Heslo</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" id="heslo" name="heslo1" required>
                </div>
              </div>
              <div class="form-group">
                <label for="heslo2" class="col-sm-2 control-label">Opakujte heslo</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" id="heslo2"  name="heslo2" required>
                </div>
              </div>
              <div class="col-lg-12 text-left">
                <h3>Fakturační a doručovací údaje</h3>
              </div>
              <div class="form-group">
                <label for="jmeno" class="col-sm-2 control-label">Jméno</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="jmeno" name="jmeno">
                </div>
              </div>
              <div class="form-group">
                <label for="prijmeni" class="col-sm-2 control-label">Příjmení</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="prijmeni" name="prijmeni">
                </div>
              </div>
              <div class="form-group">
                <label for="ulice" class="col-sm-2 control-label">Ulice</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="ulice" name="ulice">
                </div>
              </div>
              <div class="form-group">
                <label for="mesto" class="col-sm-2 control-label">Město</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="mesto" name="mesto">
                </div>
              </div>
              <div class="form-group">
                <label for="psc" class="col-sm-2 control-label">PSČ</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="psc" name="psc">
                </div>
              </div>
              <input type="submit" name="registrace" class="btn btn-primary" value="Zaregistrovat se">
            </form>
          </div>
        </div>
  </body>
</html>
<?php }
}
?>