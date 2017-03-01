<?php

namespace Barlian\Wfqbe\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Davide Menegon <menedav@libero.it>
 *           Mauro Lorenzutti <mauro.lorenzutti@webformat.com>, Webformat srl
 *           David Bruchmann <david.bruchmann@gmail.com>, Webdevelopment Barlian
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * CredentialController
 */
class CredentialController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * credentialRepository
     * 
     * @var \Barlian\Wfqbe\Domain\Repository\CredentialRepository
     * @inject
     */
    protected $credentialRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $credentials = $this->credentialRepository->findAll();
        $this->view->assign('credentials', $credentials);
    }
    
    /**
     * action show
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Credential $credential
     * @return void
     */
    public function showAction(\Barlian\Wfqbe\Domain\Model\Credential $credential)
    {
        $this->view->assign('credential', $credential);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Credential $newCredential
     * @return void
     */
    public function createAction(\Barlian\Wfqbe\Domain\Model\Credential $newCredential)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->credentialRepository->add($newCredential);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Credential $credential
     * @ignorevalidation $credential
     * @return void
     */
    public function editAction(\Barlian\Wfqbe\Domain\Model\Credential $credential)
    {
        $this->view->assign('credential', $credential);
    }
    
    /**
     * action update
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Credential $credential
     * @return void
     */
    public function updateAction(\Barlian\Wfqbe\Domain\Model\Credential $credential)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->credentialRepository->update($credential);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Credential $credential
     * @return void
     */
    public function deleteAction(\Barlian\Wfqbe\Domain\Model\Credential $credential)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->credentialRepository->remove($credential);
        $this->redirect('list');
    }

}