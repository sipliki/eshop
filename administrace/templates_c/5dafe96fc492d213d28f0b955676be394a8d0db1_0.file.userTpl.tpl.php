<?php /* Smarty version 3.1.27, created on 2016-03-13 17:48:51
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\userTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2449656e599f312bd10_13056987%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dafe96fc492d213d28f0b955676be394a8d0db1' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\userTpl.tpl',
      1 => 1457887671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2449656e599f312bd10_13056987',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'admin' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e599f3202637_48364716',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e599f3202637_48364716')) {
function content_56e599f3202637_48364716 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2449656e599f312bd10_13056987';
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
          <h2>Můj účet</h2>
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
        </div><br />
        <div class="container">
          <div class="col-lg-12 text-left">
            <h3>Přihlašovací údaje</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="uzivatelske_jmeno" class="col-sm-2 control-label" >Uživatelské jméno</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="uzivatelske_jmeno" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['uzivatelske_jmeno'];?>
" name="uzivatelske_jmeno">
                </div>
              </div>
                <div class="form-group">
                <label for="heslo" class="col-sm-2 control-label">Heslo</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" id="heslo" name="heslo">
                </div>
              </div>
              <div class="form-group">
                <label for="nove_heslo" class="col-sm-2 control-label">Nové heslo</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" id="nove_heslo"  name="nove_heslo">
                </div>
              </div>
              <div class="col-lg-12 text-left">
                <h3>Fakturační a doručovací údaje</h3>
              </div>
              <div class="form-group">
                <label for="jmeno" class="col-sm-2 control-label">Jméno</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="jmeno" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['jmeno'];?>
" name="jmeno">
                </div>
              </div>
              <div class="form-group">
                <label for="prijmeni" class="col-sm-2 control-label">Příjmení</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="prijmeni" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['prijmeni'];?>
" name="prijmeni">
                </div>
              </div>
              <div class="form-group">
                <label for="ulice" class="col-sm-2 control-label">Ulice</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="ulice" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['ulice'];?>
" name="ulice">
                </div>
              </div>
              <div class="form-group">
                <label for="mesto" class="col-sm-2 control-label">Město</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="mesto" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mesto'];?>
" name="mesto">
                </div>
              </div>
              <div class="form-group">
                <label for="psc" class="col-sm-2 control-label">PSČ</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="psc" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['psc'];?>
" name="psc">
                </div>
              </div>
              <input type="hidden" name="id_radku" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['ID'];?>
">
              <input type="submit" name="update_uzivatele" class="btn btn-primary" value="Uložit změny">
            </form>
          </div>
        </div>
  </body>
</html>
<?php }
}
?>