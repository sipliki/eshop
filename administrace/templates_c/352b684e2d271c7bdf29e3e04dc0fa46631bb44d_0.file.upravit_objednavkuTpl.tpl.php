<?php /* Smarty version 3.1.27, created on 2016-03-15 20:49:48
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\upravit_objednavkuTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3248256e8675c46f471_51448798%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '352b684e2d271c7bdf29e3e04dc0fa46631bb44d' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\upravit_objednavkuTpl.tpl',
      1 => 1458070985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3248256e8675c46f471_51448798',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'admin' => 0,
    'objednavka' => 0,
    'radek_zbozi' => 0,
    'bunka_zbozi' => 0,
    'id_radek' => 0,
    'id' => 0,
    'doprava_vypis' => 0,
    'radek_doprava' => 0,
    'platba_vypis' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e8675c5bc1b1_69387867',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e8675c5bc1b1_69387867')) {
function content_56e8675c5bc1b1_69387867 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3248256e8675c46f471_51448798';
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
          <h2>Upravit objednávku</h2>
      <div class="btn-group">
        <a href="../administrace/user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednavky"> Moje objednávky</a>
       <?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
            <a href="../administrace/upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit zboží</a>
            <a href="../administrace/pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            <a href="update_menu.php" class="btn btn-primary" name="upravit_menu">Upravit menu</a>
            <a href="upravit_menu.php" class="btn btn-primary" name="pridat_menu">Přidat menu</a>
            <a href="vypis_objednavek.php" class="btn btn-warning" name="vypis-objednavek">Výpis všech objednávek</a>
            <?php }?>
        </div><br />
        <br />
        <div class="col-md-12">
          <div class="col-md-10 text-center">
            <h3>Objednávka  #<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['id'];?>
 </h3>
          </div>
          <div class="col-md-2 text-right">
          <form>
            <input type="hidden" name="id_objednavky" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['id'];?>
" />
          <button type="submit" name="zrusit" class="btn btn-danger">Zrušit objednávku</button>
          </form>
        </div> 
        </div>
          
        <div class="text-left">
          <b>Datum vytvoření objednávky:</b> <?php echo $_smarty_tpl->tpl_vars['objednavka']->value['datum'];?>
 
        </div>
        
       
        <div class="text-left">
          <h4>Objednané zboží</h4>
          <div class="col-md-10">
            <table class="table table-hover">
              <thead>
                <tr><th>Název</th><th>Cena</th></tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['objednavka']->value['zbozi'];
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
                 <tr><th>Celková cena:</th><th><?php echo $_smarty_tpl->tpl_vars['objednavka']->value['celkova_cena'];?>
</th></tr>
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
$_from = $_smarty_tpl->tpl_vars['objednavka']->value['id_zbozi'];
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
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['id'];?>
">
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
        <br />
        <form>
          <h4>Doprava a platba</h4>
          <div class="form-group col-md-12">
                <label for="doprava" class="col-sm-2 control-label">Doprava</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="doprava" name="doprava">
                      <?php
$_from = $_smarty_tpl->tpl_vars['doprava_vypis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_doprava'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_doprava']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_doprava']->value) {
$_smarty_tpl->tpl_vars['radek_doprava']->_loop = true;
$foreach_radek_doprava_Sav = $_smarty_tpl->tpl_vars['radek_doprava'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_doprava']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_doprava'] = $foreach_radek_doprava_Sav;
}
?>
                    </select>
                  </div>
              </div>
          <div class="form-group col-md-12">
                <label for="platba" class="col-sm-2 control-label">Platba</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="platba" name="platba">
                      <?php
$_from = $_smarty_tpl->tpl_vars['platba_vypis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_doprava'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_doprava']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_doprava']->value) {
$_smarty_tpl->tpl_vars['radek_doprava']->_loop = true;
$foreach_radek_doprava_Sav = $_smarty_tpl->tpl_vars['radek_doprava'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_doprava']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_doprava'] = $foreach_radek_doprava_Sav;
}
?>
                    </select>
                  </div>
              </div>
          <div class="col-md-12">
            <h4>Doručovací a fakturační údaje</h4>
          </div>
      <div class="form-group">
        <label for="jmeno">Jméno</label>
        <input type="text" class="form-control" id="jmeno" name="jmeno" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['jmeno'];?>
">
  </div>
  <div class="form-group">
    <label for="prijmeni">Příjmení</label>
    <input type="text" class="form-control" id="prijmeni" name="prijmeni" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['prijmeni'];?>
">
  </div>
  <div class="form-group">
    <label for="ulice">Ulice</label>
    <input type="text" class="form-control" id="ulice" name="ulice" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['ulice'];?>
">
  </div>
  <div class="form-group">
    <label for="mesto">Město</label>
    <input type="text" class="form-control" id="mesto" name="mesto" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['mesto'];?>
">
  </div>
  <div class="form-group">
    <label for="psc">PSČ</label>
    <input type="text" class="form-control" id="psc" name="psc" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['psc'];?>
">
  </div>
  <div class="col-md-6">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['objednavka']->value['id'];?>
"> 
    <button type="submit" class="btn btn-primary" name="update">Uložit změny</button>
  </div>
  
</form>           
      </div>
    </div>
  </body>
</html>
<?php }
}
?>