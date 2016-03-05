<?php /* Smarty version 3.1.27, created on 2016-03-04 20:12:46
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\my portable files\e-shop\templates\detailTpl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:443156d9de2ee34a02_45066350%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06bc46ac01bacf9786d0cf72443e7e6063b8d28f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\my portable files\\e-shop\\templates\\detailTpl.tpl',
      1 => 1457118764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '443156d9de2ee34a02_45066350',
  'variables' => 
  array (
    'kosik' => 0,
    'session_user' => 0,
    'zbozi' => 0,
    'filtr' => 0,
    'dostupnost' => 0,
    'stav' => 0,
    'vyrobce' => 0,
    'os' => 0,
    'procesor' => 0,
    'rozliseni' => 0,
    'gpu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d9de2f02d921_13429539',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d9de2f02d921_13429539')) {
function content_56d9de2f02d921_13429539 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '443156d9de2ee34a02_45066350';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styl.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <link href="custom.css" rel="stylesheet">
  <meta charset="utf-8">
  <title>Detail</title>
  </head>
  <body>
  		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="vypis_zbozi.php">Zboží</a></li>
        <li><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_smarty_tpl->tpl_vars['kosik']->value)) {?>
              <li><a href="kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['session_user']->value)) {?>
            <li><p class="navbar-text">Přihlášen uživatel <?php echo $_smarty_tpl->tpl_vars['session_user']->value;?>
 <a href="vypis_zbozi.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            <?php } else { ?>
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         <?php }?>
      </ul>
    </div>
  </div>
  </nav>
  <div id="outline">
		<div class="container">
		 <img src="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['obrazek'];?>
" class="img-detail"><br /><br />
		 <ul class="nav nav-tabs">
		 <li class="active"><a data-toggle="pill" href="#popis">Popis</a><li>
		 <li><a  data-toggle="pill" href="#parametry">Parametry</a><li>
      <?php if (isset($_smarty_tpl->tpl_vars['filtr']->value)) {?>
        <li><a href="filtr.php?filtr=1" class="btn btn-primary">Zpět na výpis</a></li>
      <?php } else { ?>
        <li><a  href="vypis_zbozi.php" class="btn btn-primary">Zpět na výpis</a></li>
      <?php }?>
		 </ul>
		 <div class="tab-content">
			<div id="popis" class="tab-pane fade in active">
       <div class="col-xs-12 col-md-9">
          <h3><?php echo $_smarty_tpl->tpl_vars['zbozi']->value['nazev'];?>
</h3><br />
          <?php echo $_smarty_tpl->tpl_vars['zbozi']->value['popis'];?>
<br /><br />
          <strong>Dostupnost: </strong><?php echo $_smarty_tpl->tpl_vars['dostupnost']->value['nazev'];?>
<br /><br />
          <strong>Stav zboží: </strong><?php echo $_smarty_tpl->tpl_vars['stav']->value['nazev'];?>

          <h4>Cena:</h4> <strong><?php echo $_smarty_tpl->tpl_vars['zbozi']->value['cena'];?>
 Kč</strong><br /><br />
          <form class="form-inline">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['id'];?>
" >
            <input type="hidden" name="id_kosik" value="<?php echo $_smarty_tpl->tpl_vars['zbozi']->value['id'];?>
" >
            Počet kusů: <input type="number" class="form-control" name="pocet_kusu" value="1" max="5" min="1" />
            <button type='submit' name='pridat_zbozi' class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Vložit do košíku </button>
          </form>
       </div>
			</div>
			<div id="parametry" class="tab-pane fade">
        <div class="col-xs-12 col-md-6">
          <table class="table">
            <thead>
              <tr><td><h3>Parametry a specifikace</h3></td></tr>
            </thead>
            <tbody>
              <tr><td>Výrobce:</td><td><?php echo $_smarty_tpl->tpl_vars['vyrobce']->value['nazev_vyrobce'];?>
</td></tr>
              <tr><td>Operační systém:</td><td><?php echo $_smarty_tpl->tpl_vars['os']->value['nazev'];?>
</td></tr>
              <tr><td>Operační paměť:</td><td><?php echo $_smarty_tpl->tpl_vars['zbozi']->value['operacni_pamet'];?>
 GB</td></tr>
              <tr><td>Interní paměť:</td><td><?php echo $_smarty_tpl->tpl_vars['zbozi']->value['interni_pamet'];?>
 GB</td></tr>

              <tr class="info"><td><h4>Procesor</h4></td><td></td></tr>
              <tr><td>Typ procesoru:</td><td><?php echo $_smarty_tpl->tpl_vars['procesor']->value['nazev'];?>
</td></tr>
              <tr><td>Počet jader:</td><td><?php echo $_smarty_tpl->tpl_vars['procesor']->value['pocet_jader'];?>
</td></tr>

              <tr class="info"><td><h4>Displej</h4></td><td></td></tr>
              <tr><td>Úhlopříčka displeje</td><td><?php echo $_smarty_tpl->tpl_vars['zbozi']->value['uhlopricka'];?>
"</td></tr>
              <tr><td>Rozlišení:</td><td><?php echo $_smarty_tpl->tpl_vars['rozliseni']->value['nazev'];?>
</td></tr>
              <tr><td>Počet pixelů:</td><td><?php echo $_smarty_tpl->tpl_vars['rozliseni']->value['x'];?>
 x <?php echo $_smarty_tpl->tpl_vars['rozliseni']->value['y'];?>
</td></tr>

              <tr class="info"><td><h4>Grafická karta</h4></td><td></td></tr>
              <tr><td>Typ grafické karty:</td><td><?php echo $_smarty_tpl->tpl_vars['gpu']->value['nazev'];?>
</td></tr>
              <tr><td>Pamět grafické karty:</td><td><?php echo $_smarty_tpl->tpl_vars['gpu']->value['pamet'];?>
 GB</td></tr>
            </tbody>
          </table>
        </div>
			</div>
			</div>	
	 </div>
</div>
  </body>
</html><?php }
}
?>