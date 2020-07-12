<?php
//  ------------------------------------------------------------------------ //
//            LEXIQUE - Module de gestion de lexiques pour XOOPS             //
//                    Copyright (c) 2006 JJ Delalandre                       //
//                       <http://kiolo.com>                                  //
//  ------------------------------------------------------------------------ //
/******************************************************************************

Module LEXIQUE version 1.6.2 pour XOOPS- Gestion multi-lexiques 
Copyright (C) 2007 Jean-Jacques DELALANDRE 
Ce programme est libre, vous pouvez le redistribuer et/ou le modifier selon les termes de la Licence Publique G�n�rale GNU publi�e par la Free Software Foundation (version 2 ou bien toute autre version ult�rieure choisie par vous). 

Ce programme est distribu� car potentiellement utile, mais SANS AUCUNE GARANTIE, ni explicite ni implicite, y compris les garanties de commercialisation ou d'adaptation dans un but sp�cifique. Reportez-vous � la Licence Publique G�n�rale GNU pour plus de d�tails. 

Vous devez avoir re�u une copie de la Licence Publique G�n�rale GNU en m�me temps que ce programme ; si ce n'est pas le cas, �crivez � la Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307, �tats-Unis. 

Derni�re modification : juin 2007 
******************************************************************************/



echo '<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Nouvelle page 1</title>
</head>
<body>';


$z1  = "&nbsp;=&iexcl;=&cent;=&pound;=&curren;=&yen;=&brvbar;=&sect;=&uml;=&copy;=&ordf;=&laquo;=&not;=&shy;=&reg;=&macr;=&deg;=&plusmn;=&sup2;=&sup3;=&acute;=&micro;=&para;=&middot;=&cedil;=&sup1;=&ordm;=&raquo;=&frac14;=&frac12;=&frac34;=&iquest;=&Agrave;=&Aacute;=&Acirc;=&Atilde;=&Auml;=&Aring;=&AElig;=&Ccedil;=&Egrave;=&Eacute;=&Ecirc;=&Euml;=&Igrave;=&Iacute;=&Icirc;=&Iuml;=&ETH;=&Ntilde;=&Ograve;=&Oacute;=&Ocirc;=&Otilde;=&Ouml;=&times;=&Oslash;=&Ugrave;=&Uacute;=&Ucirc;=&Uuml;=&Yacute;=&THORN;=&szlig;=&agrave;=&aacute;=&acirc;=&atilde;=&auml;=&aring;=&aelig;=&ccedil;=&egrave;=&eacute;=&ecirc;=&euml;=&igrave;=&iacute;=&icirc;=&iuml;=&eth;=&ntilde;=&ograve;=&oacute;=&ocirc;=&otilde;=&ouml;=&divide;=&oslash;=&ugrave;=&uacute;=&ucirc;=&uuml;=&yacute;=&thorn;=&yuml;=&quot;=&lt;=&gt;=&amp;";
$z2  = " �����������������������������������������������������������������������������������������������\"<>&";


/*************************************************************
 *
 *************************************************************/
function showEntite () {

  $list = get_html_translation_table(HTML_ENTITIES);
  $key = array_keys($list);
  
  
  for ($h=0; $h < count($list); $h++){
      
      $k = $key[$h];
      echo $key[$h];            
  }
  return;
}  

//----------------------------------------------------------
showEntite ();


echo '</body></html>';

?>
