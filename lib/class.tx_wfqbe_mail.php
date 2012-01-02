<?php
/*
 * Created on 27/gen/09
 * Author mauro
 * 
 */
 
 class tx_wfqbe_mail {
 	
 	var $cObj;
 	var $conf;
 	var $piVars;
 	var $parent;
 	
 	function tx_wfqbe_mail()	{}
 	
 	
 	function init($cObj, $conf, $piVars, $parent)	{
 		$this->cObj = $cObj;
 		$this->conf = $conf;
 		$this->piVars = $piVars;
 		$this->parent = $parent;
 	}
 	
 	
 	function sendEmail($to, $subject, $results, $mode='ADMIN')	{
		$file = $this->cObj->fileResource($this->conf['email.']['template']);
		$content = $this->cObj->getSubpart($file, '###MAIL_'.$mode.'_INSERT###');
		$mA = array();
		$sent = 0;
		
		foreach ($results['insert_data'] as $k => $v)	{
			$mA['###WFQBE_DB_'.$k.'###'] = $v;
			$mA['###DB_'.$k.'###'] = $v;
		}
		
		foreach ($this->piVars as $k => $v)	{
			$field_name = $this->parent->blocks['fields'][$k]['field'];
			if (is_array($v))	{
				foreach ($v as $sub_k => $sub_v)	{
					$mA['###WFQBE_FIELD_'.$field_name.'_'.$sub_k.'###'] = $sub_v;
					$mA['###FIELD_'.$field_name.'_'.$sub_k.'###'] = $sub_v;
					$mA['###WFQBE_FIELD_'.$k.'_'.$sub_k.'###'] = $sub_v;
					$mA['###FIELD_'.$k.'_'.$sub_k.'###'] = $sub_v;
				}
			}	else	{
				$mA['###WFQBE_FIELD_'.$field_name.'###'] = $v;
				$mA['###FIELD_'.$field_name.'###'] = $v;
				$mA['###WFQBE_FIELD_'.$k.'###'] = $v;
				$mA['###FIELD_'.$k.'###'] = $v;
			}
		}
		
		$content = $this->cObj->substituteMarkerArray($content, $mA);

		$Typo3_htmlmail = t3lib_div::makeInstance('t3lib_htmlmail');
	    $Typo3_htmlmail->start();
	    $Typo3_htmlmail->mailer = 'TYPO3 HTMLMail';
	    $Typo3_htmlmail->subject = $subject;
	    $Typo3_htmlmail->from_email = $this->conf['email.']['from_email'];
	    $Typo3_htmlmail->returnPath = $this->conf['email.']['from_email'];
	    $Typo3_htmlmail->from_name = $this->conf['email.']['from'];
	    $Typo3_htmlmail->replyto_email = $this->conf['email.']['from_email'];
	    $Typo3_htmlmail->replyto_name = $this->conf['email.']['from'];
	    $Typo3_htmlmail->organisation = '';
	    $Typo3_htmlmail->priority = 3;
		//$Typo3_htmlmail->addPlain(strip_tags($content));
		$Typo3_htmlmail->setHTML($content);
		$Typo3_htmlmail->setHeaders();
	    $Typo3_htmlmail->setContent();
	    $Typo3_htmlmail->setRecipient(explode(',',$to));
	    $Typo3_htmlmail->add_header('Bcc: '.$this->conf['email.']['bcc']);
	    
	    if ($this->conf['email.']['debug']==1)	{
	    	t3lib_div::debug($Typo3_htmlmail);
	    }	else	{
	    	$sent = $Typo3_htmlmail->sendtheMail();
	    }
		return $sent;
	}
 	
 }
 
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/wfqbe/lib/class.tx_wfqbe_mail.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/wfqbe/lib/class.tx_wfqbe_mail.php']);
}
 
?>