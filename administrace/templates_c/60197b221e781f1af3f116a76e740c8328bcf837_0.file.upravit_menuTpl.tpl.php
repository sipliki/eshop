<?php /* Smarty version 3.1.27, created on 2016-03-13 17:49:32
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\upravit_menuTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:391956e59a1cd03bd2_96779697%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60197b221e781f1af3f116a76e740c8328bcf837' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\upravit_menuTpl.tpl',
      1 => 1457887657,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '391956e59a1cd03bd2_96779697',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'admin' => 0,
    'kategorie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e59a1ce681d9_36154025',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e59a1ce681d9_36154025')) {
function content_56e59a1ce681d9_36154025 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '391956e59a1cd03bd2_96779697';
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
            <a href="vypis_objednavek.php" class="btn btn-warning" name="vypis-objednavek">Výpis všech objednávek</a>
            <?php }?>
        </div><br />
        <div class="container">
          <?php if (isset($_smarty_tpl->tpl_vars['kategorie']->value)) {?> 
          <div class="col-lg-12 text-left">
            <h3>Upravit položku menu</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="nazev" class="col-sm-2 control-label" >Název kategorie</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nazev" value="<?php echo $_smarty_tpl->tpl_vars['kategorie']->value['nazev'];?>
" name="nazev">
                </div>
              </div>
              <input type="hidden" name="id_radku" value="<?php echo $_smarty_tpl->tpl_vars['kategorie']->value['id'];?>
">
              <input type="submit" name="update" class="btn btn-primary" value="Uložit změny">
            </form>
            </div>

            <?php } else { ?>
            <div class="col-lg-12 text-left">
            <h3>Přidat položku menu</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="nazev" class="col-sm-2 control-label" >Název kategorie</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nazev" name="nazev">
                </div>
              </div>
              <input type="submit" name="add" class="btn btn-primary" value="Přidat kategorii">
            </form>
            </div>
            <?php }?>
          
        </div>
  </body>
</html>
<?php }
}
?>