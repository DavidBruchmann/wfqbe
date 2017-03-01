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
 * Test case for class Barlian\Wfqbe\Controller\BackendController.
 *
 * @author Davide Menegon <menedav@libero.it>
 * @author Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 * @author David Bruchmann <david.bruchmann@gmail.com>
 */
class BackendControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Barlian\Wfqbe\Controller\BackendController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Barlian\\Wfqbe\\Controller\\BackendController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBackendsFromRepositoryAndAssignsThemToView()
	{

		$allBackends = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$backendRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\BackendRepository', array('findAll'), array(), '', FALSE);
		$backendRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBackends));
		$this->inject($this->subject, 'backendRepository', $backendRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('backends', $allBackends);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenBackendToView()
	{
		$backend = new \Barlian\Wfqbe\Domain\Model\Backend();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('backend', $backend);

		$this->subject->showAction($backend);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenBackendToBackendRepository()
	{
		$backend = new \Barlian\Wfqbe\Domain\Model\Backend();

		$backendRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\BackendRepository', array('add'), array(), '', FALSE);
		$backendRepository->expects($this->once())->method('add')->with($backend);
		$this->inject($this->subject, 'backendRepository', $backendRepository);

		$this->subject->createAction($backend);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenBackendToView()
	{
		$backend = new \Barlian\Wfqbe\Domain\Model\Backend();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('backend', $backend);

		$this->subject->editAction($backend);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenBackendInBackendRepository()
	{
		$backend = new \Barlian\Wfqbe\Domain\Model\Backend();

		$backendRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\BackendRepository', array('update'), array(), '', FALSE);
		$backendRepository->expects($this->once())->method('update')->with($backend);
		$this->inject($this->subject, 'backendRepository', $backendRepository);

		$this->subject->updateAction($backend);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenBackendFromBackendRepository()
	{
		$backend = new \Barlian\Wfqbe\Domain\Model\Backend();

		$backendRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\BackendRepository', array('remove'), array(), '', FALSE);
		$backendRepository->expects($this->once())->method('remove')->with($backend);
		$this->inject($this->subject, 'backendRepository', $backendRepository);

		$this->subject->deleteAction($backend);
	}
}
