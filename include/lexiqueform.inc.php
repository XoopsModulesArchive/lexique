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



include_once (XOOPS_ROOT_PATH."/class/xoopsformloader.php");
include_once (XOOPS_ROOT_PATH."/class/wysiwyg/formwysiwygtextarea.php");

global $letter, $name, $shortDef, $definition1, $definition2, $definition3, $seeAlsoList,$libelle;


echo "<TABLE BORDER=0 CELLPADDING=2 CELLSPACING=3>";
  $wz = '100%'; //".$wz."
echo "<TR>
  <TD>".$libelle[_LEX_LANG_TERME2]." </TD>
  <TD><INPUT TYPE=\"text\" NAME=\"name\" SIZE=".$wz." VALUE=\"$name\"></TD>
</TR>
<TR>
  <TD>".$libelle[_LEX_LANG_SHORTDEF2]." </TD>
  <TD><INPUT TYPE=\"text\" NAME=\"name\" SIZE=".$wz." VALUE=\"$shortDef\"></TD>
</TR>
<TR>
  <TD>".$libelle[_LEX_LANG_SEEALSO2]." </TD>
  <TD><INPUT TYPE=\"text\" NAME=\"name\" SIZE=".$wz." VALUE=\"$seeAlsoList\"></TD>
</TR>
<TR>
  <TD>".$libelle[_LEX_LANG_DEF3]." </TD>
  <TD>";

$desc1  = getXME($definition1, 'definition1', '', $wz);
$desc2  = getXME($definition2, 'definition2', '', $wz);
$desc3  = getXME($definition3, 'definition3', '', $wz);

echo $desc1->render();
echo $desc2->render();
echo $desc3->render();

echo "</td>
</tr></table>
<TABLE BORDER=0 CELLPADDING=2 CELLSPACING=3>
<tr valign=\"top\">
  <td><input type=\"submit\" name=\"submit\" value=\""._ADD."\"></td>
  <td><input type=\"button\" name=\"cancel\" value=\""._CANCEL."\" onclick=\"javascript:history.go(-1);\">
  </form>";
?>
