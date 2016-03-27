<?php /* Smarty version 3.1.27, created on 2016-03-24 15:21:56
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\updateTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1278256f3f804308406_99342822%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6084483ebeffe61415a110896f1d4937acb05a9b' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\updateTpl.tpl',
      1 => 1457887653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1278256f3f804308406_99342822',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'admin' => 0,
    'zbozi' => 0,
    'dostupnost' => 0,
    'radek_dostupnost' => 0,
    'vyrobce' => 0,
    'radek_vyrobce' => 0,
    'stav' => 0,
    'radek_stav' => 0,
    'procesor' => 0,
    'radek_procesor' => 0,
    'rozliseni' => 0,
    'radek_rozliseni' => 0,
    'os' => 0,
    'radek_os' => 0,
    'gpu' => 0,
    'radek_gpu' => 0,
    'kategorie' => 0,
    'radek_kategorie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f3f804474261_94812493',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f3f804474261_94812493')) {
function content_56f3f804474261_94812493 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1278256f3f804308406_99342822';
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
        <li class="active"><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
</p></li>
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
          <h2>Administrace zboží</h2>
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
            <h3>Upravit zboží</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="nazev" class="col-sm-2 control-label" >Název zboží</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nazev" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['nazev'];?>
" name="nazev">
                </div>
              </div>
              <div class="form-group">
              <label for="popis" class="col-sm-2 control-label" >Popis zboží</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="popis" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['popis'];?>
" name="popis">
                </div>
              </div>
              <div class="form-group">
              <label for="cena" class="col-sm-2 control-label" >Cena zboží</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="cena" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['cena'];?>
" name="cena">
                </div>
              </div>
              <div class="form-group">
              <label for="obrazek" class="col-sm-2 control-label" >Obrázek zboží</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="obrazek" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['obrazek'];?>
" name="obrazek">
                </div>
              </div>

              <div class="form-group">
                <label for="dostupnost" class="col-sm-2 control-label">Dostupnost</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="dostupnost" name="dostupnost">
                      <?php
$_from = $_smarty_tpl->tpl_vars['dostupnost']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_dostupnost'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_dostupnost']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_dostupnost']->value) {
$_smarty_tpl->tpl_vars['radek_dostupnost']->_loop = true;
$foreach_radek_dostupnost_Sav = $_smarty_tpl->tpl_vars['radek_dostupnost'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_dostupnost']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_dostupnost'] = $foreach_radek_dostupnost_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="vyrobce" class="col-sm-2 control-label">Výrobce</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="vyrobce" name="vyrobce">
                     <?php
$_from = $_smarty_tpl->tpl_vars['vyrobce']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_vyrobce'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_vyrobce']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_vyrobce']->value) {
$_smarty_tpl->tpl_vars['radek_vyrobce']->_loop = true;
$foreach_radek_vyrobce_Sav = $_smarty_tpl->tpl_vars['radek_vyrobce'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_vyrobce']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_vyrobce'] = $foreach_radek_vyrobce_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="stav_zbozi" class="col-sm-2 control-label">Stav zboží</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="stav_zbozi" name="stav_zbozi">
                      <?php
$_from = $_smarty_tpl->tpl_vars['stav']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_stav'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_stav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_stav']->value) {
$_smarty_tpl->tpl_vars['radek_stav']->_loop = true;
$foreach_radek_stav_Sav = $_smarty_tpl->tpl_vars['radek_stav'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_stav']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_stav'] = $foreach_radek_stav_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="procesor" class="col-sm-2 control-label">Procesor</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="procesor" name="procesor" required>
                      <?php
$_from = $_smarty_tpl->tpl_vars['procesor']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_procesor'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_procesor']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_procesor']->value) {
$_smarty_tpl->tpl_vars['radek_procesor']->_loop = true;
$foreach_radek_procesor_Sav = $_smarty_tpl->tpl_vars['radek_procesor'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_procesor']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_procesor'] = $foreach_radek_procesor_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
              <label for="uhlopricka" class="col-sm-2 control-label" >Úhlopříčka displeje</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="uhlopricka" name="uhlopricka" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['uhlopricka'];?>
" required>
                </div>
              </div>

              <div class="form-group">
                <label for="rozliseni" class="col-sm-2 control-label">Rozlišení displeje</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="rozliseni" name="rozliseni" required>
                      <?php
$_from = $_smarty_tpl->tpl_vars['rozliseni']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_rozliseni'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_rozliseni']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_rozliseni']->value) {
$_smarty_tpl->tpl_vars['radek_rozliseni']->_loop = true;
$foreach_radek_rozliseni_Sav = $_smarty_tpl->tpl_vars['radek_rozliseni'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_rozliseni']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_rozliseni'] = $foreach_radek_rozliseni_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="os" class="col-sm-2 control-label">Operační systém</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="os" name="os" required>
                      <?php
$_from = $_smarty_tpl->tpl_vars['os']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_os'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_os']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_os']->value) {
$_smarty_tpl->tpl_vars['radek_os']->_loop = true;
$foreach_radek_os_Sav = $_smarty_tpl->tpl_vars['radek_os'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_os']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_os'] = $foreach_radek_os_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
              <label for="operacni_pamet" class="col-sm-2 control-label" >Operační paměť</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="operacni_pamet" name="operacni_pamet" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['operacni_pamet'];?>
" required>
                </div>
              </div>

              <div class="form-group">
              <label for="interni_pamet" class="col-sm-2 control-label" >Interní paměť</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="interni_pamet" name="interni_pamet" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['interni_pamet'];?>
" required>
                </div>
              </div>

              <div class="form-group">
                <label for="gpu" class="col-sm-2 control-label">Grafická karta</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="gpu" name="gpu" required>
                      <?php
$_from = $_smarty_tpl->tpl_vars['gpu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_gpu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_gpu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_gpu']->value) {
$_smarty_tpl->tpl_vars['radek_gpu']->_loop = true;
$foreach_radek_gpu_Sav = $_smarty_tpl->tpl_vars['radek_gpu'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_gpu']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_gpu'] = $foreach_radek_gpu_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="kategorie" class="col-sm-2 control-label">Kategorie</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="kategorie" name="kategorie" required>
                      <?php
$_from = $_smarty_tpl->tpl_vars['kategorie']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['radek_kategorie'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['radek_kategorie']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['radek_kategorie']->value) {
$_smarty_tpl->tpl_vars['radek_kategorie']->_loop = true;
$foreach_radek_kategorie_Sav = $_smarty_tpl->tpl_vars['radek_kategorie'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['radek_kategorie']->value['nazev'];?>

                      <?php
$_smarty_tpl->tpl_vars['radek_kategorie'] = $foreach_radek_kategorie_Sav;
}
?>
                    </select>
                  </div>
              </div>

              <input type="hidden" name="id_radku" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['id'];?>
">
              <input type="submit" name="update" class="btn btn-primary" value="Uložit změny">
            </form>
          </div>
        </div>
  </body>
</html>
<?php }
}
?>