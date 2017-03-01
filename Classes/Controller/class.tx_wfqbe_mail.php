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

		$mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Mail\MailMessage');
		$mail->setFrom(array($this->conf['email.']['from_email'] => $this->conf['email.']['from']));
		$mail->setReplyTo(array($this->conf['email.']['from_email'] => $this->conf['email.']['from']));
		$mail->setReturnPath($this->conf['email.']['from_email']);
		$mail->setSubject($subject);
		$mail->setTo(array($to));
		if ($this->conf['email.']['bcc']!='')
			$mail->setBcc(explode(',',$this->conf['email.']['bcc']));
		$mail->setBody($content);
		$mail->send();
	    
	    if ($this->conf['email.']['debug']==1)	{
	    	\TYPO3\CMS\Core\Utility\DebugUtility::debug($Typo3_htmlmail);
	    }	else	{
	    	$sent = $Typo3_htmlmail->sendtheMail();
	    }
		return $sent;
	}
 	
 }
