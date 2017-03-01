<?php
namespace Barlian\Wfqbe\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Davide Menegon <menedav@libero.it>
 *  			Mauro Lorenzutti <mauro.lorenzutti@webformat.com>, Webformat srl
 *  			David Bruchmann <david.bruchmann@gmail.com>, Webdevelopment Barlian
 *  			
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
 * Test case for class Barlian\Wfqbe\Controller\CredentialController.
 *
 * @author Davide Menegon <menedav@libero.it>
 * @author Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 * @author David Bruchmann <david.bruchmann@gmail.com>
 */
class CredentialControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Barlian\Wfqbe\Controller\CredentialController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Barlian\\Wfqbe\\Controller\\CredentialController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCredentialsFromRepositoryAndAssignsThemToView()
	{

		$allCredentials = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$credentialRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\CredentialRepository', array('findAll'), array(), '', FALSE);
		$credentialRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCredentials));
		$this->inject($this->subject, 'credentialRepository', $credentialRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('credentials', $allCredentials);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCredentialToView()
	{
		$credential = new \Barlian\Wfqbe\Domain\Model\Credential();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('credential', $credential);

		$this->subject->showAction($credential);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCredentialToCredentialRepository()
	{
		$credential = new \Barlian\Wfqbe\Domain\Model\Credential();

		$credentialRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\CredentialRepository', array('add'), array(), '', FALSE);
		$credentialRepository->expects($this->once())->method('add')->with($credential);
		$this->inject($this->subject, 'credentialRepository', $credentialRepository);

		$this->subject->createAction($credential);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCredentialToView()
	{
		$credential = new \Barlian\Wfqbe\Domain\Model\Credential();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('credential', $credential);

		$this->subject->editAction($credential);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCredentialInCredentialRepository()
	{
		$credential = new \Barlian\Wfqbe\Domain\Model\Credential();

		$credentialRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\CredentialRepository', array('update'), array(), '', FALSE);
		$credentialRepository->expects($this->once())->method('update')->with($credential);
		$this->inject($this->subject, 'credentialRepository', $credentialRepository);

		$this->subject->updateAction($credential);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCredentialFromCredentialRepository()
	{
		$credential = new \Barlian\Wfqbe\Domain\Model\Credential();

		$credentialRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\CredentialRepository', array('remove'), array(), '', FALSE);
		$credentialRepository->expects($this->once())->method('remove')->with($credential);
		$this->inject($this->subject, 'credentialRepository', $credentialRepository);

		$this->subject->deleteAction($credential);
	}
}
