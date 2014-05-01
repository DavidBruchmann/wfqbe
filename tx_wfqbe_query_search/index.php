<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * wfqbe module tx_wfqbe_query_searchwiz0
 *
 * @author	Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 */



	// DEFAULT initialization of a module [BEGIN]
unset($MCONF);
require ('conf.php');
require ($BACK_PATH.'init.php');
if (intval(str_replace('.','',TYPO3_branch))<62) {
	require ($BACK_PATH.'template.php');
	require_once (PATH_t3lib.'class.t3lib_scbase.php');
}
$LANG->includeLLFile('EXT:wfqbe/tx_wfqbe_query_search/locallang.xml');
//includo il file form_generator.php. La prima parte dell'argomento mi d� il path della estensione
require_once(t3lib_extMgm::extPath('wfqbe')."tx_wfqbe_query_search/class.tx_wfqbe_searchform_generator.php");
require_once(t3lib_extMgm::extPath('wfqbe')."lib/class.tx_wfqbe_connect.php");
	// ....(But no access check here...)
	// DEFAULT initialization of a module [END]

			class tx_wfqbe_tx_wfqbe_query_searchwiz extends t3lib_SCbase {
			var $P;
			var $qbe;
			/**
 * Adds items to the ->MOD_MENU array. Used for the function menu selector.
 *
 * @return	[type]		...
 */
				function menuConfig()	{
					global $LANG;
					/* $this->MOD_MENU = Array (
						'function' => Array (
							'1' => $LANG->getLL('function1'),
							'2' => $LANG->getLL('function2'),
							'3' => $LANG->getLL('function3'),
						)
					); */
					parent::menuConfig();
				}

				/**
 * Main function of the module. Write the content to 
 *
 * @return	[type]		...
 */
				function main()	{
					global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
					$this->P = t3lib_div::_GP('P');

					$this->id = $this->P['pid'];
					$this->qbe = t3lib_div::makeInstance("tx_wfqbe_searchform_generator");
					$this->qbe->init();
						// Draw the header.
					$this->doc = t3lib_div::makeInstance('bigDoc');
					$this->doc->backPath = $BACK_PATH;
					$this->doc->form='<form action="" method="POST" style="width:113%;" name="insSearch" id="insSearch">';
					//$this->doc->styleSheetFile =$BACK_PATH.'typo3/stylesheet.css'; 
						// JavaScript
					$this->doc->loadJavascriptLib('contrib/prototype/prototype.js');
					$this->doc->loadJavascriptLib('js/common.js');
					$this->doc->JScode = '
						<script language="javascript" type="text/javascript">
							script_ended = 0;
							function jumpToUrl(URL)	{
								document.location = URL;
							}
							
							function insertwhere(i,j){
								document.getElementById(j).value=document.getElementById(i).value;
								
							}
							
							function insertField(i,j){
								str = document.getElementById(j).value;
								if(str.length>0){
									if(str.substring(str.length-1)=="(" && document.getElementById(i).value=="*")
										document.getElementById(j).value+=document.getElementById(i).value+")";
									else if(str=="*" || document.getElementById(i).value=="*")
											document.getElementById(j).value=document.getElementById(i).value;
									else if(str.substring(str.length-1)=="(" )
											document.getElementById(j).value+=document.getElementById(i).value+")";
										else if(str.substring(str.length-1)=="*" || str.substring(str.length-1)=="+" || str.substring(str.length-1)=="-" || str.substring(str.length-1)=="/")
												document.getElementById(j).value+=document.getElementById(i).value;
											else
												document.getElementById(j).value+=", "+document.getElementById(i).value;
										
								}else
									document.getElementById(j).value+=document.getElementById(i).value;
							}
							
							function insertAggregationFunction(i,j){
								str = document.getElementById(j).value;
								if(str.length>0){
									if(str.substring(str.length-1)=="*" || str.substring(str.length-1)=="+" || str.substring(str.length-1)=="-" || str.substring(str.length-1)=="/")
											document.getElementById(j).value+=document.getElementById(i).value+"(";
									else if(str=="*" || document.getElementById(i).value=="*")
										
										document.getElementById(j).value=document.getElementById(i).value+"(";
									else
										document.getElementById(j).value+=", "+document.getElementById(i).value+"(";
								}else
									document.getElementById(j).value+=document.getElementById(i).value+"(";
							}
							
													
							function insertRenamedFields(i,j){
								
									document.getElementById(j).value+=" AS "+document.getElementById(i).value;
							}
							
							function insertChangeValueAndOperator(i,j){
									str = document.getElementById(j).value;
									if(str.length>0){
										
										 if(str=="*" || document.getElementById(i).value=="*")
											document.getElementById(j).value=document.getElementById(i).value;
										else
											document.getElementById(j).value+=", "+document.getElementById(i).value;
									}else
										document.getElementById(j).value+=document.getElementById(i).value;
							}
							
							function invalidWfqbe(i){
								document.getElementById(i).value=1;
							}
							
							function cancelContentTextArea(i,j){
								document.getElementById(i).innerHTML="";
								document.getElementById(j).value=0;
							}
							
							function updateForm() {
								$(\'insSearch\').request({
								  method: \'post\',
								  onComplete: function(xhr, json) {
								        // display results, should be "The tree works"
								        document.getElementById(\'tx_wfqbe_searchform\').innerHTML = ""+xhr.responseText;
								    }.bind(this),
								    onT3Error: function(xhr, json) {
								        // display error message, will be "An error occurred" if an error occurred
								    }.bind(this)
								})
							}
							
							
						</script>
					';
					
					


					$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
					$access = is_array($this->pageinfo) ? 1 : 0;
					if (($this->id && $access) || ($BE_USER->user['admin'] && !$this->id))	{
						if ($BE_USER->user['admin'] && !$this->id)	{
							$this->pageinfo=array('title' => '[root-level]','uid'=>0,'pid'=>0);
						}
						

						//$headerSection = $this->doc->getHeader('pages',$this->pageinfo,$this->pageinfo['_thePath']).'<br>'.$LANG->sL('LLL:EXT:lang/locallang_core.xml:labels.path').': '.t3lib_div::fixed_lgd_pre($this->pageinfo['_thePath'],50);
						$headerSection = "";
						$this->content.="<div id=\"tx_wfqbe_searchform\">";
						$this->content.=$this->doc->startPage($LANG->getLL('title'));
						$this->content.=$this->doc->header($LANG->getLL('title'));
						$this->content.=$this->doc->spacer(5);
						$this->content.=$this->doc->section('',$this->doc->funcMenu($headerSection,t3lib_BEfunc::getFuncMenu($this->id,'SET[function]',$this->MOD_SETTINGS['function'],$this->MOD_MENU['function'])));
						$this->content.=$this->doc->divider(5);

						
						// Chiamata alla funzione che costruisce il contenuto del wizard
						$this->moduleContent();


						// ShortCut
						if ($BE_USER->mayMakeShortcut())	{
							$this->content.=$this->doc->spacer(20).$this->doc->section('',$this->doc->makeShortcutIcon('id',implode(',',array_keys($this->MOD_MENU)),$this->MCONF['name']));
						}
					}
					$this->content.=$this->doc->spacer(10).'</div>';
				}

	/**
	 * [Describe function...]
	 *
	 * @return	[type]		...
	 */
				function printContent()	{

					$this->content.=$this->doc->endPage();
					echo $this->content;
				}

	/**
	 * [Describe function...]
	 *
	 * @return	[type]		...
	 */
			function moduleContent()	{
				$content='';
					//switch((string)$this->MOD_SETTINGS['function'])	{
						//case 1:
								$var=t3lib_div::_GP('P');//P � l'array che contiene tutte le info passate dal plugin al wizard
								//t3lib_div::debug($this->P);
								$this->P=$var;
								//t3lib_div::debug($var);
								$where = 'tx_wfqbe_query.uid='.$var['uid'].' AND tx_wfqbe_query.deleted!=1 AND ';
								$CONN = t3lib_div::makeInstance("tx_wfqbe_connect");
								$connection_obj = $CONN->connect($where);

								if (!$connection_obj)	{
									$content.='<div id="wfqbe_form">';
									$content.= "Connection failed. Please check your credentials and the dbname.";
									$content.='</div>';
									$this->content.=$this->doc->section('',$content,0,1);
								}	else	{
									
									// Settaggio tag apertura form. Questo form � quello principale che contiene i vari tipi di campi per 
									//creare la query. La variabile $rUri contiene il path della pagina del wizard e viene utilizzata cona valore
									// dell'attributo action del form
									list($rUri) = explode('#',t3lib_div::getIndpEnv('REQUEST_URI'));
									
									//costruzione del form, posizionato in fondo alla pagina, per il salvataggio, chiusure e salvataggio-chiusura del documento.
									$content.= '<div id="c-saveButtonPanel">';
										$content.= '<input type="image" class="c-inputButton" name="savedok"'.t3lib_iconWorks::skinImg('','img/savedok.gif','').' title="Save document" />';
										$content.= '<input type="image" class="c-inputButton" name="saveandclosedok"'.t3lib_iconWorks::skinImg('','img/saveandclosedok.gif','').' title="Save and close document" />';
										$content.= '<a href="#" onclick="'.htmlspecialchars('jumpToUrl(unescape(\''.rawurlencode($this->P['returnUrl']).'\')); return false;').'">'.
													'<img'.t3lib_iconWorks::skinImg('','img/closedok.gif','width="21" height="16"').' class="c-inputButton" title="Close document" />'.
													'</a>';
										$content.= '<input type="image" class="c-inputButton" name="_refresh"'.t3lib_iconWorks::skinImg('','img/refresh_n.gif','').' title="refresh document" />';
										$content.= t3lib_BEfunc::cshItem('xMOD_csh_corebe', 'wizard_table_wiz_buttons', $GLOBALS['BACK_PATH'],'');
										$content.= '</div><br />';
									
									
									//$content.='<form action="'.htmlspecialchars($rUri).'" method="post" name="insSearch">';
									//inserisco tutto il form all'interno di un elemento div
									$content.='<div id="wfqbe_form">';
									$content.= $this->qbe->showForm($connection_obj['conn'], htmlspecialchars($rUri));
									$content.='</div>';
									//costruzione del form, posizionato in fondo alla pagina, per il salvataggio, chiusure e salvataggio-chiusura del documento.
									$content.= '<div id="c-saveButtonPanel">';
										$content.= '<input type="image" class="c-inputButton" name="savedok"'.t3lib_iconWorks::skinImg('','img/savedok.gif','').' title="Save document" />';
										$content.= '<input type="image" class="c-inputButton" name="saveandclosedok"'.t3lib_iconWorks::skinImg('','img/saveandclosedok.gif','').' title="Save and close document" />';
										$content.= '<a href="#" onclick="'.htmlspecialchars('jumpToUrl(unescape(\''.rawurlencode($this->P['returnUrl']).'\')); return false;').'">'.
													'<img'.t3lib_iconWorks::skinImg('','img/closedok.gif','width="21" height="16"').' class="c-inputButton" title="Close document" />'.
													'</a>';
										$content.= '<input type="image" class="c-inputButton" name="_refresh"'.t3lib_iconWorks::skinImg('','img/refresh_n.gif','').' title="refresh document" />';
										$content.= t3lib_BEfunc::cshItem('xMOD_csh_corebe', 'wizard_table_wiz_buttons', $GLOBALS['BACK_PATH'],'');
										$content.= '</div>';
										
									$content.='</form>';
	
										$content.='<hr>';
										
										// If save command found, include tcemain. t3lib_tcemain.php � una classe per la manipolazione del database.
										// Se i parametri savedoc_x e saveandclose_x sono passati tramite post allora includi la classe sopra specificata 
										// che servir� per fare dei salvataggi.
										if ($_POST['savedok_x'] || $_POST['saveandclosedok_x'])	{
											if (intval(str_replace('.','',TYPO3_branch))<62)
												require_once (PATH_t3lib.'class.t3lib_tcemain.php');
										}
							
							
										// Se i pulsanti di salvataggio e salvataggio/uscita son premuti allora
										if ($_POST['savedok_x'] || $_POST['saveandclosedok_x'])	{
	
											// creo una istanza della classe importata(viene salvata nella variabile tca)
											$tce = t3lib_div::makeInstance('t3lib_TCEmain');
											$tce->stripslashes_values=0;
	
											// Creo un array di nome data e inserisco la query che verr� salvata nella tabella table(query),nella
											//tupla con valore uid uguale a uid e nel campo query.
											//table,uid e field sono parametri passati dal plugin al wizard tramite la variabile P 
											$data=array();
											//$data[$this->P['table']][$this->P['uid']][$this->P['field']]=$this->qbe->createQuery();
											$data[$this->P['table']][$this->P['uid']][$this->P['field']]=$this->qbe->saveModule();
	
											// Richiamo due funzioni che permettono di fare l'aggiornamenti del campo della tupla nella tabella
											//definita nelle due righe sopra.
											//Queste due funzioni sono definite nel file tcemain.php
											$tce->start($data,array());
											$tce->process_datamap();
	
											// Se � stato premuto il tasto salvataggio/uscita ,oltre a fare tutto il lavoro che si f� per il pulsante
											//salvataggio, bisogna tornare nella pagina di inserimento nuovo record
											if ($_POST['saveandclosedok_x'])	{
												header('Location: '.t3lib_div::locationHeaderUrl($this->P['returnUrl']));
												exit;
											}
										}
									
										//$content.=$this->qbe->showQuery();
									
									$this->content.=$this->doc->section('',$content,0,1);
								}
				}
			}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/wfqbe/tx_wfqbe_query_search/index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/wfqbe/tx_wfqbe_query_search/index.php']);
}




// Make instance:
$SOBE = t3lib_div::makeInstance('tx_wfqbe_tx_wfqbe_query_searchwiz');
$SOBE->init();


$SOBE->main();
$SOBE->printContent();

?>