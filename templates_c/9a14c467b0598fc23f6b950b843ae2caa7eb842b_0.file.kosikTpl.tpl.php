<?php /* Smarty version 3.1.27, created on 2016-03-17 17:53:55
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\kosikTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1763356eae123676553_20934175%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a14c467b0598fc23f6b950b843ae2caa7eb842b' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\kosikTpl.tpl',
      1 => 1458233631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1763356eae123676553_20934175',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'zbozi' => 0,
    'radek' => 0,
    'bunka' => 0,
    'id_zbozi' => 0,
    'id_radek' => 0,
    'id' => 0,
    'doprava' => 0,
    'radek_doprava' => 0,
    'platba' => 0,
    'radek_platba' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56eae1237b63a9_76599481',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56eae1237b63a9_76599481')) {
function content_56eae1237b63a9_76599481 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1763356eae123676553_20934175';
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
      <a class="navbar-brand" href="vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li><a href="vypis_zbozi.php">Zboží</a></li>
        <li><a href="administrace/user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
 <a href="kosik.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
    <div class="col-md-12 text-center"> 
      <h2>Dokončení objednávky</h2>
    </div>
    <div>
      <div class="col-md-12 text-center">
        <div class="col-md-12">
          <h3>Výpis zboží v košíku</h3>
          <div class="col-md-10">
          <table class="table table-hover">
            <thead>
              <tr><td>Název zboží</td><td>Cena</td><td>Množství</td></tr>
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
</th><?php
$_smarty_tpl->tpl_vars['bunka'] = $foreach_bunka_Sav;
}
?>
                <th>
                  <form>
                   <div class="col-md-8">
                      <input type="number" class="form-control" name="mnozstvi" value="1" max="5" min="1" disabled />
                      <input type="hidden" name="id_zbozi" value="{}">
                   </div>
                  </form>
                </th>
              </tr><?php
$_smarty_tpl->tpl_vars['radek'] = $foreach_radek_Sav;
}
?>
            </tbody>
            </table>
          </div>
          <div class="col-md-2">
            <table class="table table-hover">
              <thead>
                <tr><td>Odebrat položku</td></tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['id_zbozi']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['id_radek'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['id_radek']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['id_radek']->value) {
$_smarty_tpl->tpl_vars['id_radek']->_loop = true;
$foreach_id_radek_Sav = $_smarty_tpl->tpl_vars['id_radek'];
?>
                  <tr><?php
$_from = $_smarty_tpl->tpl_vars['id_radek']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['id']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value) {
$_smarty_tpl->tpl_vars['id']->_loop = true;
$foreach_id_Sav = $_smarty_tpl->tpl_vars['id'];
?>
                    <th>
                      <form>
                      <input type="hidden" name="id_zbozi" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                      <button type="submit" class="btn btn-info" name="odebrat"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    </form>
                    </th><?php
$_smarty_tpl->tpl_vars['id'] = $foreach_id_Sav;
}
?>
              </tr><?php
$_smarty_tpl->tpl_vars['id_radek'] = $foreach_id_radek_Sav;
}
?>
            </tbody>
          </table>
        </div>
        </div>
        <form>
        <div class="col-md-6 text-left">
          <h3 class="text-center">Doprava</h3>
          <table class="table table-hover">
               <?php
$_from = $_smarty_tpl->tpl_vars['doprava']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_doprava'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_doprava']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_doprava']->value) {
$_smarty_tpl->tpl_vars['radek_doprava']->_loop = true;
$foreach_radek_doprava_Sav = $_smarty_tpl->tpl_vars['radek_doprava'];
?>
                  <tr> <th><input type="radio" name="doprava" value="<?php echo $_smarty_tpl->tpl_vars['radek_doprava']->value['id'];?>
" required></th>
                    <th><?php echo $_smarty_tpl->tpl_vars['radek_doprava']->value['nazev'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['radek_doprava']->value['cena'];?>
</th></tr>
                <?php
$_smarty_tpl->tpl_vars['radek_doprava'] = $foreach_radek_doprava_Sav;
}
?>
          </table>
        </div>
        <div class="col-md-6">
          <h3>Způsob platby</h3>
          <table class="table table-hover">
              <?php
$_from = $_smarty_tpl->tpl_vars['platba']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_platba'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_platba']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_platba']->value) {
$_smarty_tpl->tpl_vars['radek_platba']->_loop = true;
$foreach_radek_platba_Sav = $_smarty_tpl->tpl_vars['radek_platba'];
?>
                  <tr> <th><input type="radio" name="platba" value="<?php echo $_smarty_tpl->tpl_vars['radek_platba']->value['id'];?>
" required></th>
                    <th><?php echo $_smarty_tpl->tpl_vars['radek_platba']->value['nazev'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['radek_platba']->value['cena'];?>
</th></tr>
                <?php
$_smarty_tpl->tpl_vars['radek_platba'] = $foreach_radek_platba_Sav;
}
?>
          </table>
        </div>
        <div class="col-md-12 text-right">
        <button type="submit" formaction="objednavka/shrnuti.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Shrnutí objednávky</button>
        </div>
      </form>
    </div>
  </div>
  </body>
</html>
<?php }
}
?>