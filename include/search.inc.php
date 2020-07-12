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

//-----------------------------------------------------------------------------------
global $xoopsModule;
//include_once (XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar('dirname')."/include/constantes.php");
include_once (dirname(__FILE__)."/../include/constantes.php");
//include_once (dirname(__FILE__)."/../include/fonctions.php");
//-----------------------------------------------------------------------------------
include_once (_LEX_JJD_PATH."include/functions.php");


//********************************************************************
function lex_search($queryarray, $andor, $limit, $offset, $userid){ 
global $xoopsDB; 
  
  //if (count($queryarray) == 0) return '';
  //-------------------------------------------
  $ret = array();  
  $fields = array('name','shortDef','definition1','definition2','definition3','tempCategory');
  //displayArray($queryarray,"-------fields-------");
  //recherche de la liste des lexique et recupe des zones dans lesqulles charcher
  //pour chaque lexqie, au passage on r�cupere aussi le nom ca eviterra ne jointure
  //sur les requetes suivantes
  $sql = "SELECT idLexique, name, xoopsSearch, icone FROM "
        .$xoopsDB->prefix(_LEX_TBL_LEXIQUE)  
        ." WHERE actif = 1 "
        ." ORDER BY name";

  $lexResult = $xoopsDB->query($sql);
  //-----------------------------------------------
  while($lexique = $xoopsDB->fetchArray($lexResult)){
        //displayArray($lexique,"------------------------");
        // cr�ation de la clause where  
        $t = array();
        if (is_array($queryarray)){
          
          while (list($key,$item) = each($queryarray)){          
            $f = array();
            for ($i = 0; $i < count($fields); $i++){
              if (isBitOk($i, $lexique['xoopsSearch']) == 1){
                $f[] = "{$fields[$i]} LIKE '%{$item}%'";
              }
            }
            $t[] ="(".implode(' OR ', $f).")";
          
          }
          
          $clauseWhere = implode (' '.$andor.' ', $t);
        
        }else{
          $clauseWhere = 'true=false';        
        }


      	//$sql = "SELECT idTerme, name, shortDef, definition1, definition2, definition3, tempCategory  "
        // cr�ation de la requite
      	$sql = "SELECT idTerme, name, shortDef, dateModification , DATE_FORMAT(dateModification, '%d %m %y') AS `dateModif` FROM "
              .$xoopsDB->prefix(_LEX_TBL_TERME)
              ." WHERE idLexique = {$lexique['idLexique']}" 
              ."   AND ({$clauseWhere})" 
              ." ORDER BY name";
         $result = $xoopsDB->query($sql,$limit,$offset);  
  //echo "<hr>{$sql}<hr>";
        //--------------------------------------------------------
        $i = 0; 
        $ret = array();
        
        while($myrow = $xoopsDB->fetchArray($result)){ 
          // cr�ation du tableau des r�sultats 
          $r = array();
          $r['image'] = 'images/lexIcones/'.$lexique['icone'];     
          $r['link']  = "popup.php?op=popup&id={$myrow['idTerme']}&idLexique={$lexique['idLexique']}";
          
          
          
          $r['title'] = "-".$lexique['name'].' : '.$myrow['name'].'-'.$myrow['shortDef'] ; 
          $r['time']  = strtotime($myrow['dateModification']); //$myrow['created']; 
          $r['uid']   = $userid;  //$myrow['idTerme'];

          $ret[] = $r ;

         
        } 
  
  
  }
  
  //-------------------------------------------------
//displayArray($ret,"------------------------------");    
  return $ret; 
 


 
} 


//********************************************************************
function lex_search2($queryarray, $andor, $limit, $offset, $userid){ 
global $xoopsDB; 

  // cr�ation de la clause where
  $t = array();
  for ($h= 0; $h<count($queryarray); $h++){
    $t[] = " (terme.name LIKE '%{$queryarray[$h]}%' OR shortDef LIKE '%{$queryarray[$h]}%' )";
  }
  $clauseWhere = implode (' '.$andor.' ', $t);
  // cr�ation de la requite
	$sql = "SELECT lexique.name as lexName, lexique.idLexique as idLexique, lexique.icone as icone,"
        ."terme.idTerme as idTerme, terme.name as termeName, terme.shortDef as shortDef   "
        ." FROM "
        .$xoopsDB->prefix(_LEX_TBL_TERME).' as terme,'
        .$xoopsDB->prefix(_LEX_TBL_LEXIQUE).' as lexique'        
        ." WHERE terme.idLexique = lexique.idLexique" 
        ."   AND actif=1 "
        ."   AND ({$clauseWhere})" 
        ." ORDER BY lexique.name, terme.name";


  $result = $xoopsDB->query($sql,$limit,$offset); 

// cr�ation du tableau des r�sultats
  $ret = array(); 
  $i = 0; 
  while($myrow = $xoopsDB->fetchArray($result)){ 
    //$ret[$i]['image'] = _LEX_URL_LEXICONES.$myrow['icone']     ; 
    $ret[$i]['image'] = 'images/lexIcones/'.$myrow['icone']     ;   
    
    // lien sur la page qui affichera le texte    
    //$ret[$i]['link'] = "detail.php?id={$myrow['idTerme']}&idLexique={$myrow['idLexique']}"; 
    $ret[$i]['link'] = "popup.php?id={$myrow['idTerme']}&idLexique={$myrow['idLexique']}";
    
    
    
    
    
    
//$ret[$i]['link'] =  "javascript:openWithSelfMain(\"popup.php?mode=2&id={$idTerme}&idLexique={$idLexique}\",\"\",{$info['intlinkswidth']},{$info['intlinksheight']});";            
//$ret[$i]['link'] =  "javascript:openWithSelfMain(\"popup.php?mode=2&id={$idTerme}&idLexique={$idLexique}\",\"\",450,600);";    
    
    
    
    
    $ret[$i]['title'] = $myrow['termeName'].'-'.$myrow['lexName'] ; 
    $ret[$i]['time'] = ''; //$myrow['created']; 
    $ret[$i]['uid'] = $myrow['lexName']; $i++; 
  } return $ret; 
} 

?>
