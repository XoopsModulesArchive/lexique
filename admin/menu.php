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

Vous devez avoir re�u une copie de la Licence Publique G�n�rale GNU en m�me temps que ce programme ; si ce n'est pas le cas, �crivez � la Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307, +tats-Unis. 

Derni�re modification : juin 2007 
******************************************************************************/


$i = 0;
$adminmenu[$i]['title'] =_MI_LEX_ADMENU1;
$adminmenu[$i]['link'] = "admin/index.php";

$i++;
$adminmenu[$i]['title'] =_MI_LEX_LEXIQUES;
$adminmenu[$i]['link'] = "admin/admin_lexique.php";

$i++;
$adminmenu[$i]['title'] =_MI_LEX_SELECTEURS;
$adminmenu[$i]['link'] = "admin/admin_selecteur.php";

$i++;
$adminmenu[$i]['title'] =_MI_LEX_CATEGORYS;
$adminmenu[$i]['link'] = "admin/admin_family.php";

$i++;
$adminmenu[$i]['title'] =_MI_LEX_CAPTIONS;
$adminmenu[$i]['link'] = "admin/admin_caption.php";

$i++;
$adminmenu[$i]['title'] =_MI_LEX_PROPERTYS;
$adminmenu[$i]['link'] = "admin/admin_property.php";

$i++;
$adminmenu[$i]['title'] =_MI_LEX_LIST;
$adminmenu[$i]['link'] = "admin/admin_list.php";


$adminmenu[++$i]['title'] = _MI_LEX_DOCUMENTATION;
$adminmenu[$i]['link'] = "admin/admin_doc.php?op=readDoc&numDoc=0";
//$adminmenu[$i]['link'] = "doc/admin_doc.php?op=readDoc&numDoc=0";

$adminmenu[++$i]['title'] = _MI_LEX_LICENCE;
$adminmenu[$i]['link'] = "admin/admin_doc.php?op=readDoc&numDoc=1";
//$adminmenu[$i]['link'] = "doc/admin_doc.php?op=readDoc&numDoc=1";

//---------------------------------------------
//a placer en dernier
//$adminmenu[++$i]['title'] = "JJD";
//$adminmenu[$i]['link'] = "admin/admin_jjd.php";




?>
