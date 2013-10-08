<html> 
<head>
<title>Pizzerias y Lomiterias de Cordoba capital. Delivery de Pizzas Lomitos y Empanadas</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<META name="title" content="pizzerias y lomiterias en Cordoba capital">
<META name="description" content="Pizzas lomitos empanadas sandwiches comida mexicana tortas. Directorio con los locales en Cordoba capital">
<META name="keywords" content="delivery, comida rapida, fast-food, envios a domicilio, cordoba capital">
<meta HTTP-EQUIV="keywords" CONTENT="cordoba, pizza, pizzas, lomito, lomitos, empanada, empanadas, delivery, bebidas, comida, argentina">
<meta name="revisit" content="15 days">
<meta name="revisit-after" content="15 days">
<meta name="classification" content="Internet">
<meta name="robots" content="ALL">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="copyright" content="http://www.pizzasylomitos.com.ar">
<meta name="author" content="http://www.pizzasylomitos.com.ar">
<meta name="language" content="ES">
<meta name="Content-Language" CONTENT="ES-ES">
<meta name="doc-type" content="Web Page">
<meta name="doc-class" content="Completed">
<meta name="doc-rights" content="Public">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #CCFFFF;	
}
-->
</style></head>
<body>
<p align="center"><a href="http://www.bonuu.com/Lorenzo-Comidas-Bar"><img src="00000000008-site.jpg" width="214" height="214" alt="Lorenzo Logo"><img src="00000000008-banner.jpg" alt="Bonuu Premios en tus compras" longdesc="Bonuu premios en tus compras"></a></p>
<p align="center"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Bienvenido 
  a pizzas y lomitos! En esta pagina podes encontrar los tel&eacute;fonos de los 
  mas importantes locales de comida r&aacute;pida de Cordoba capital. </font></strong></p>
<p align="center"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Proximamente podras ordenar tu pedido online y recibirlo en la comodidad de tu hogar! Solo en los mejores locales. </font></strong></p>
<p align="center" class="titulopublicacion"><strong><font face="Geneva, Arial, Helvetica, sans-serif"><a href="http://www.pizzasylomitos.com.ar/formulario_carga.php">Agrega tu local GRATIS</a></font></strong> !!!
<p align="center">
<?php
include('establecer_conexion.php');
/*
aca comentamos todo 
el codigo que tenemos en php 
para probar esto de GIT
*/
include("real_ip.php");
require_once('searchkeys.class.php');

$keys = search_keywords::getInstance();
$keys = $keys->get_keys();

if (count($keys))
{
	//echo "Referring URL: $keys[0]<br />
	//echo "Keywords:".$keys[1];
	//<br />Search Engine: $keys[2]";
	if("Not available"!=$keys[1]){
	$palabras = $keys[1];
	$buscador = $keys[2];
	$tipo=2;
	//$sql = "SELECT *, MATCH ( Nombre, Productos, Direccion) AGAINST ('$palabras') as relevancia FROM locales  WHERE MATCH ( Nombre, Productos, Direccion) AGAINST ('$palabras')  ORDER BY  relevancia desc,`Url` DESC , Nombre ASC"  ;
	$sql = "SELECT * FROM locales ORDER BY  `Url` DESC , Nombre ASC  ";
	}
}

?>
<form name="form1" method="post" action="">
  <div align="center">
    <h1>Buscar:
      <input name="buscar_local" type="text" id="buscar_local" value="<?php if(""!=$_POST[buscar_local]){echo $_POST[buscar_local];} else {echo $palabras;} ?>" size="50" maxlength="50">
  <input type="submit" value="Buscar"></h1>
  </div>
</form>
  <?
if(""==$_POST[buscar_local] and ""==$palabras)
{
$sql = "SELECT * FROM locales ORDER BY  `Url` DESC , Nombre ASC  ";
}
elseif(""==$palabras)
{
$palabras=$_POST[buscar_local];
$tipo=1;
$sql = "SELECT *, MATCH ( Nombre, Productos, Direccion) AGAINST ('$palabras') as relevancia FROM locales  WHERE MATCH ( Nombre, Productos, Direccion) AGAINST ('$palabras')  ORDER BY  relevancia desc,`Url` DESC , Nombre ASC"  ;
}
$resultado = mysql_query($sql,$db);
while ($row = mysql_fetch_array($resultado)){
$d=$row[Delivery];
if ($d=="t")
{  $del="Envio sin cargo";}
else
{
  $del=$row[Notas];
}

?>
					<!---Anuncios--->
<div class="divisor">
                        <div class="barraanuncio">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="26%"><strong><font color='#FF0000' size='3'>
                                <?php if("" != $row[Url]){?><a href="<?=$row[Url]?>"><?php } ?><?=$row[Nombre]?><?php if("" != $row[Url]){?></a><?php } ?>
                              </font></strong></td>
                              <td width="26%"><a href="#"><strong><font color='#000000' size='3'>
                                <?=$row[Telefono]?>
                              </font></strong></a></td>
                              <td width="23%">&nbsp;</td>
                              <td width="25%"><a href="#"><strong>                                <?=$del?>
                              </strong></a></td>
                            </tr>
                          </table>
                        </div>
                        <div class="marcoClas">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            <?
                            if(0 != $row[Imagen])
							{
							$fuente="images/locales/".$row[Imagen].".jpg";
							}
							else
							{
							$fuente="images/imagen.png";
								}
							
							?>
                              <td width="80" align="left" valign="top"><?php if("" != $row[Url]){?><a href="<?=$row[Url]?>"><?php } ?><img src="<?php echo $fuente;?>" alt="imagen" width="70" height="70" /><?php if("" != $row[Url]){?></a><?php } ?></td>
                              <td align="left" valign="top" class="texto"><p><strong><font color='#000000' size='3'>
                              <?=$row[Direccion]?>
                              </font></strong></p>
                                <p><strong><font color='#000000' size='3'><font color='#000000'><strong><font size='3'>
                                <?=$row[Productos]?>
                              </font></strong></font></font></strong></p></td>
                            </tr>
                          </table>
                        </div>
</div>
                      <!----Fin Anuncios---->
<? } ?>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr valign="top" > 
    <td colspan="3"> <div align="center"><span class="style59"><strong>Copyright &copy; 2013</strong></span></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"> <div align="center">
      <p><span class="style59">Powered 
        by <a href="http://www.avisos-gratis.guia-ciudad.com.ar" target="_self"><strong>Avisos 
          Gratis</strong></a></span> - <a href="http://www.guia-ciudad.com.ar" target="_self"><strong>CLASIFICADOS GRATIS</strong></a></p>
      <p> <strong>Partners:&nbsp;</strong><a href="http://www.bonuu.com/Il-Caffetino-Espresso" target="_top">Il Caffetino Espresso</a> - <a href="http://www.bonuu.com/Lorenzo-Comidas-Bar">Lorenzo Comidas Bar</a> - <a href="http://saloesbeleza.com.br/">Salões de Beleza no Brasil</a>
    </div>
      <div align="center"></div></td>
  </tr>
</table>
</body> 
</html> 
<?php
if(""!=$palabras)
{

$ip=getRealIP();
include_once("libs/automaticbrowsersdetect.php");
include_once("libs/AgenteWeb.php");

$newbrow = new AutomaticBrowsersDetect();
$navegador = $newbrow->GetBrow($_SERVER['HTTP_USER_AGENT']);
 $agenteWeb = new AgenteWeb(); 
 $agenteWeb->setAgente($_SERVER['HTTP_USER_AGENT']); 
 $agenteWeb->parseaAgente(); 
 $so = $agenteWeb->getSO(); 

$sql="INSERT INTO  `Busquedas` (`Id`, `Busqueda`, `Fecha`, `Tipo`,Buscador, `Ip`, `Navegador`, `SO`)  
VALUES (null,  '".$palabras."', NOW( ) , ".$tipo.", '".$buscador."',  '".$ip."',  '".$navegador."',  '".$so."')";
mysql_query($sql,$db);
}

?>