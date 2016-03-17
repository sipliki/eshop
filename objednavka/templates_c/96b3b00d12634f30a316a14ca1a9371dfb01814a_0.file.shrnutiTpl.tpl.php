<?php /* Smarty version 3.1.27, created on 2016-03-17 17:57:32
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\shrnutiTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:461456eae1fcec9ea6_87417708%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96b3b00d12634f30a316a14ca1a9371dfb01814a' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\shrnutiTpl.tpl',
      1 => 1458233790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '461456eae1fcec9ea6_87417708',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'zbozi' => 0,
    'radek' => 0,
    'bunka' => 0,
    'doprava' => 0,
    'platba' => 0,
    'celkova_cena' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56eae1fd0bc758_36043449',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56eae1fd0bc758_36043449')) {
function content_56eae1fd0bc758_36043449 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '461456eae1fcec9ea6_87417708';
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
 <a href="shrnuti.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            <?php } else { ?>
        <li><a href="../prihlaseni/register.php?kosik=1"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php?kosik=1"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
    <div class="col-md-12 text-center"> 
      <h2>Shrnutí objednávky</h2>
    </div>
      <div class="col-md-12 text-center">
        <div class="col-md-12">
          <h3>Výpis zboží v košíku</h3>
          <table class="table">
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
              </tr><?php
$_smarty_tpl->tpl_vars['radek'] = $foreach_radek_Sav;
}
?>
            </tbody>
            <thead>
              <tr><td>Doprava: <?php echo $_smarty_tpl->tpl_vars['doprava']->value['nazev'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['doprava']->value['cena'];?>
 Kč</td></tr>
              <tr><td>Platba: <?php echo $_smarty_tpl->tpl_vars['platba']->value['nazev'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['platba']->value['cena'];?>
 Kč</td></tr>
              <tbody>
              <tr class="info"><td>Celková cena:</td><td><?php echo $_smarty_tpl->tpl_vars['celkova_cena']->value;?>
 Kč</td></tr>
            </tbody>
            </thead>
          </table>
        </div>
    </div>
    <div class="col-md-12 text-left">
      <form class="form-horizontal">
        <?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
        Přihlášen jako uživatel <b><?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
</b>.
        Nejste to vy? <a href="shrnuti.php?logout=1" class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a><br />
          <h3>Fakturační a dodací údaje</h3><br />
            <div class="form-group">
              <label for="id_jmeno" class="col-sm-2 control-label">Jméno:</label>
                <div class="col-sm-10">
                  <input type="text" name="jmeno" id="id_jmeno" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['jmeno'];?>
" />
                </div>
            </div>
            <div class="form-group">
              <label for="id_prijmeni" class="col-sm-2 control-label">Příjmení:</label>
                <div class="col-sm-10">
                  <input type="text" name="prijmeni" id="id_prijmeni" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['prijmeni'];?>
" />
                </div>
              </div>
                <div class="form-group">
              <label for="id_ulice" class="col-sm-2 control-label">Ulice:</label>
                <div class="col-sm-10">
                  <input type="text" name="ulice" id="id_ulice" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['ulice'];?>
" />
                </div>
            </div>
            <div class="form-group">
              <label for="id_mesto" class="col-sm-2 control-label">Město:</label>
                <div class="col-sm-10">
                  <input type="text" name="mesto" id="id_mesto" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mesto'];?>
" />
                </div>
            </div>
            <div class="form-group">
              <label for="id_psc" class="col-sm-2 control-label">PSČ:</label>
                <div class="col-sm-10">
                  <input type="number" name="psc" id="id_psc" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['psc'];?>
" min="00000" max="99999"/>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
            <input type="hidden" name="cena" value="<?php echo $_smarty_tpl->tpl_vars['celkova_cena']->value;?>
">
            <input type="hidden" name="doprava" value="<?php echo $_smarty_tpl->tpl_vars['doprava']->value['id'];?>
">
            <input type="hidden" name="platba" value="<?php echo $_smarty_tpl->tpl_vars['platba']->value['id'];?>
">
        <?php } else { ?>
        Nejste přihlášeni. Pokud máte účet přihlašte se. <a href="../prihlaseni/login.php?shrnuti=1" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a><br />
        Nakupujete u nás často a nemáte účet. Vytvořte si ho zdarma. <a href="../prihlaseni/register.php?kosik=1" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Vytvořit účet</a><br />
        <h3>Fakturační a dodací údaje</h3><br />
            <div class="form-group">
              <label for="id_jmeno" class="col-sm-2 control-label">Jméno:</label>
                <div class="col-sm-10">
                  <input type="text" name="jmeno" id="id_jmeno" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
              <label for="id_prijmeni" class="col-sm-2 control-label">Příjmení:</label>
                <div class="col-sm-10">
                  <input type="text" name="prijmeni" id="id_prijmeni" class="form-control" required/>
                </div>
              </div>
                <div class="form-group">
              <label for="id_ulice" class="col-sm-2 control-label">Ulice:</label>
                <div class="col-sm-10">
                  <input type="text" name="ulice" id="id_ulice" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
              <label for="id_mesto" class="col-sm-2 control-label">Město:</label>
                <div class="col-sm-10">
                  <input type="text" name="mesto" id="id_mesto" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
              <label for="id_psc" class="col-sm-2 control-label">PSČ:</label>
                <div class="col-sm-10">
                  <input type="number" name="psc" id="id_psc" class="form-control" min="00000" max="99999" required/>
                </div>
            </div>
            <input type="hidden" name="cena" value="<?php echo $_smarty_tpl->tpl_vars['celkova_cena']->value;?>
">
        <?php }?>
      <div class="col-md-12">
        <div class="col-md-6 text-left">
          <a href="../kosik.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Zpět k výpisu zboží </a> 
        </div>
    <div class="col-md-6 text-right">
      <button type="submit" class="btn btn-primary btn-lg" name="objednat">Objednat zboží <span class="glyphicon glyphicon-chevron-right"></span></button>
    </div>
  </div>
      </form>
      </div>
  </body>
</html>
<?php }
}
?>