<?php /* Smarty version 3.1.27, created on 2016-03-05 14:22:59
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\objednavkyTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2562456daddb35823a0_83092187%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a9e8db0df7b82fcd8674d9a435cd2a1795db9d7' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\objednavkyTpl.tpl',
      1 => 1457183093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2562456daddb35823a0_83092187',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'admin' => 0,
    'bez_objednavky' => 0,
    'zruseni' => 0,
    'objednavka' => 0,
    'radek_objednavka' => 0,
    'radek_zbozi' => 0,
    'bunka_zbozi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56daddb36c8755_64516618',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56daddb36c8755_64516618')) {
function content_56daddb36c8755_64516618 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2562456daddb35823a0_83092187';
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
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
 <a href="objednavky.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            <?php } else { ?>
        <li><a href="../prihlaseni/register.php?kosik=1"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php?kosik=1.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
<div class="container">
          <div class="col-lg-12 text-center"> 
          <h2>Moje objednávky</h2>
      <div class="btn-group">
        <a href="../administrace/user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
       <?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
            <a href="../administrace/upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit zboží</a>
            <a href="../administrace/pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            <?php }?>
        </div><br />
        <br />
        <?php if (isset($_smarty_tpl->tpl_vars['bez_objednavky']->value)) {?>
        <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Zatím jste si u nás nic neobjednal</div>

        <?php } else { ?>
          <?php if (isset($_smarty_tpl->tpl_vars['zruseni']->value)) {?>
          <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Objednávka byla úspěšně zrušena</div>
          <?php }?>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php
$_from = $_smarty_tpl->tpl_vars['objednavka']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_objednavka'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_objednavka']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_objednavka']->value) {
$_smarty_tpl->tpl_vars['radek_objednavka']->_loop = true;
$foreach_radek_objednavka_Sav = $_smarty_tpl->tpl_vars['radek_objednavka'];
?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
" aria-controls="collapse<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
" aria-expanded="false">
          Objednávka  #<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
 
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
">
      <div class="panel-body">
        <div class="text-left">
          <b>Datum vytvoření objednávky:</b> <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['datum'];?>
 
        </div>
        <div class="text-right">
          <form>
            <input type="hidden" name="id_objednavky" value="<?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['id'];?>
" />
          <button type="submit" name="zrusit" class="btn btn-primary">Zrušit objednávku</button>
          </form>
        </div>
        <div class="text-left">
          <h4>Objednané zboží</h4>
            <table class="table table-hover">
              <thead>
                <tr><th>Název</th><th>Cena</th></tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['radek_objednavka']->value['zbozi'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_zbozi'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_zbozi']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_zbozi']->value) {
$_smarty_tpl->tpl_vars['radek_zbozi']->_loop = true;
$foreach_radek_zbozi_Sav = $_smarty_tpl->tpl_vars['radek_zbozi'];
?>
                  <tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['radek_zbozi']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['bunka_zbozi'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['bunka_zbozi']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bunka_zbozi']->value) {
$_smarty_tpl->tpl_vars['bunka_zbozi']->_loop = true;
$foreach_bunka_zbozi_Sav = $_smarty_tpl->tpl_vars['bunka_zbozi'];
?>
                    <th><?php echo $_smarty_tpl->tpl_vars['bunka_zbozi']->value;?>
</th>
                    <?php
$_smarty_tpl->tpl_vars['bunka_zbozi'] = $foreach_bunka_zbozi_Sav;
}
?>
                  </tr>
                 <?php
$_smarty_tpl->tpl_vars['radek_zbozi'] = $foreach_radek_zbozi_Sav;
}
?>
                 <tr><th>Doprava: <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['nazev_doprava'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['cena_doprava'];?>
</th></tr>
                 <tr><th>Platba: <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['nazev_platba'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['cena_platba'];?>
</th></tr>
                 <tr><th>Celková cena:</th><th><?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['celkova_cena'];?>
</th></tr>
              </tbody>
            </table>
            <br />
            <h4>Doručovací a fakturační údaje</h4>
            <div class="text-left">
              <b>Jméno a příjmení:</b><br /> 
              <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['jmeno'];?>
 <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['prijmeni'];?>
<br />
              <b>Adresa:</b><br />
              <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['ulice'];?>
 <br />
              <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['psc'];?>
 <?php echo $_smarty_tpl->tpl_vars['radek_objednavka']->value['mesto'];?>

            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
$_smarty_tpl->tpl_vars['radek_objednavka'] = $foreach_radek_objednavka_Sav;
}
?>
</div>
<?php }?>
  </body>
</html>
<?php }
}
?>