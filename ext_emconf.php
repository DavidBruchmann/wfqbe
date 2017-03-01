<?php

########################################################################
# Extension Manager/Repository config file for ext "wfqbe".
#
# Auto generated 19-04-2012 12:26
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'DB Integration',
	'description' => 'This extension allows to generate queries (with a little sql knowledge), search forms and insert forms to generic databases through a wizard. The results visualization is template-based and fully configurable via TS. The extension uses ADOdb and supports XAJAX. Upgrade to TYPO3 7.6.2 by Ronald Wopereis.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '7.6.2',
	'dependencies' => 'adodb',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => 'tx_wfqbe_query_query,tx_wfqbe_query_search,tx_wfqbe_query_insert',
	'state' => 'beta',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Mauro Lorenzutti',
	'author_email' => 'mauro.lorenzutti@webformat.com',
	'author_company' => 'Webformat srl',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'adodb' => '',
			'php' => '5.2.0-0.0.0',
			'typo3' => '7.6.2-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:92:{s:9:"ChangeLog";s:4:"b9c3";s:10:"README.txt";s:4:"ee2d";s:8:"TODO.txt";s:4:"6560";s:21:"ext_conf_template.txt";s:4:"08e2";s:12:"ext_icon.gif";s:4:"c1a2";s:17:"ext_localconf.php";s:4:"2569";s:14:"ext_tables.php";s:4:"1669";s:14:"ext_tables.sql";s:4:"12f4";s:15:"flexform_ds.xml";s:4:"5e1f";s:29:"icon_tx_wfqbe_credentials.gif";s:4:"0bb0";s:23:"icon_tx_wfqbe_query.gif";s:4:"c1a2";s:13:"locallang.xml";s:4:"3dc2";s:16:"locallang_db.xml";s:4:"024a";s:7:"tca.php";s:4:"540e";s:14:"doc/manual.sxw";s:4:"3e07";s:36:"lib/class.tx_wfqbe_api_array2xml.php";s:4:"7f78";s:32:"lib/class.tx_wfqbe_api_query.php";s:4:"863c";s:36:"lib/class.tx_wfqbe_api_xml2array.php";s:4:"2944";s:45:"lib/class.tx_wfqbe_api_xml2data_structure.php";s:4:"0616";s:30:"lib/class.tx_wfqbe_connect.php";s:4:"6823";s:27:"lib/class.tx_wfqbe_mail.php";s:4:"e8ea";s:28:"lib/class.tx_wfqbe_utils.php";s:4:"2840";s:33:"mod1/class.tx_wfqbe_mod1_ajax.php";s:4:"2ccf";s:14:"mod1/clear.gif";s:4:"cc11";s:13:"mod1/conf.php";s:4:"3ee6";s:14:"mod1/index.php";s:4:"a8f4";s:18:"mod1/locallang.xml";s:4:"5511";s:22:"mod1/locallang_mod.xml";s:4:"0ac4";s:19:"mod1/moduleicon.gif";s:4:"c1a2";s:29:"mod2/class.tx_wfqbe_belib.php";s:4:"fdbc";s:14:"mod2/clear.gif";s:4:"cc11";s:13:"mod2/conf.php";s:4:"107c";s:14:"mod2/index.php";s:4:"e23c";s:18:"mod2/locallang.xml";s:4:"b3f0";s:22:"mod2/locallang_mod.xml";s:4:"36df";s:19:"mod2/moduleicon.gif";s:4:"c1a2";s:14:"pi1/ce_wiz.gif";s:4:"09c6";s:29:"pi1/class.tx_wfqbe_insert.php";s:4:"8276";s:15:"Classes/Pi1.php";s:4:"8119";s:30:"pi1/class.tx_wfqbe_results.php";s:4:"7944";s:29:"pi1/class.tx_wfqbe_search.php";s:4:"33fc";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"3929";s:13:"pi1/stile.css";s:4:"afb9";s:27:"pi1/wfqbe_csv_template.html";s:4:"b104";s:23:"pi1/wfqbe_template.html";s:4:"a4db";s:27:"pi1/wfqbe_xls_template.html";s:4:"3fc5";s:41:"pi1/static/class.tx_wfqbe_pi1_wizicon.php";s:4:"3f05";s:24:"pi1/static/editorcfg.txt";s:4:"44df";s:20:"pi1/static/setup.txt";s:4:"fcfc";s:11:"res/add.gif";s:4:"408a";s:33:"res/backend_default_template.html";s:4:"6ef6";s:24:"res/custom_template.html";s:4:"dd0b";s:24:"res/default_template.xml";s:4:"a8af";s:28:"res/default_template_v2.html";s:4:"8e8b";s:14:"res/delete.gif";s:4:"90c6";s:12:"res/edit.gif";s:4:"3248";s:35:"res/example_be_custom_template.html";s:4:"9842";s:16:"res/functions.js";s:4:"1639";s:22:"res/mail_template.html";s:4:"199a";s:12:"res/open.gif";s:4:"b1f4";s:24:"res/postgres64_patch.txt";s:4:"1457";s:61:"tx_wfqbe_query_insert/class.tx_wfqbe_insertform_generator.php";s:4:"7a1c";s:31:"tx_wfqbe_query_insert/clear.gif";s:4:"cc11";s:30:"tx_wfqbe_query_insert/conf.php";s:4:"4a7b";s:31:"tx_wfqbe_query_insert/index.php";s:4:"78f6";s:35:"tx_wfqbe_query_insert/locallang.xml";s:4:"09bf";s:37:"tx_wfqbe_query_insert/wizard_icon.gif";s:4:"2c3f";s:38:"tx_wfqbe_query_insert/img/closedok.gif";s:4:"1443";s:39:"tx_wfqbe_query_insert/img/refresh_n.gif";s:4:"8706";s:45:"tx_wfqbe_query_insert/img/saveandclosedok.gif";s:4:"2c9f";s:37:"tx_wfqbe_query_insert/img/savedok.gif";s:4:"933e";s:59:"tx_wfqbe_query_query/class.tx_wfqbe_queryform_generator.php";s:4:"3fe8";s:30:"tx_wfqbe_query_query/clear.gif";s:4:"cc11";s:29:"tx_wfqbe_query_query/conf.php";s:4:"5173";s:30:"tx_wfqbe_query_query/index.php";s:4:"79e1";s:34:"tx_wfqbe_query_query/locallang.xml";s:4:"5c16";s:36:"tx_wfqbe_query_query/wizard_icon.gif";s:4:"1ef1";s:37:"tx_wfqbe_query_query/img/closedok.gif";s:4:"1443";s:38:"tx_wfqbe_query_query/img/refresh_n.gif";s:4:"8706";s:44:"tx_wfqbe_query_query/img/saveandclosedok.gif";s:4:"2c9f";s:36:"tx_wfqbe_query_query/img/savedok.gif";s:4:"933e";s:61:"tx_wfqbe_query_search/class.tx_wfqbe_searchform_generator.php";s:4:"8654";s:31:"tx_wfqbe_query_search/clear.gif";s:4:"cc11";s:30:"tx_wfqbe_query_search/conf.php";s:4:"5cd8";s:31:"tx_wfqbe_query_search/index.php";s:4:"6e83";s:35:"tx_wfqbe_query_search/locallang.xml";s:4:"1f41";s:37:"tx_wfqbe_query_search/wizard_icon.gif";s:4:"3edd";s:38:"tx_wfqbe_query_search/img/closedok.gif";s:4:"1443";s:39:"tx_wfqbe_query_search/img/refresh_n.gif";s:4:"8706";s:45:"tx_wfqbe_query_search/img/saveandclosedok.gif";s:4:"2c9f";s:37:"tx_wfqbe_query_search/img/savedok.gif";s:4:"933e";}',
	'suggests' => array(
	),
);

?>
