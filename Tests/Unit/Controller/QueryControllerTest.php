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
 * Test case for class Barlian\Wfqbe\Controller\QueryController.
 *
 * @author Davide Menegon <menedav@libero.it>
 * @author Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 * @author David Bruchmann <david.bruchmann@gmail.com>
 */
class QueryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Barlian\Wfqbe\Controller\QueryController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Barlian\\Wfqbe\\Controller\\QueryController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllQueriesFromRepositoryAndAssignsThemToView()
	{

		$allQueries = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$queryRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\QueryRepository', array('findAll'), array(), '', FALSE);
		$queryRepository->expects($this->once())->method('findAll')->will($this->returnValue($allQueries));
		$this->inject($this->subject, 'queryRepository', $queryRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('queries', $allQueries);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenQueryToView()
	{
		$query = new \Barlian\Wfqbe\Domain\Model\Query();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('query', $query);

		$this->subject->showAction($query);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenQueryToQueryRepository()
	{
		$query = new \Barlian\Wfqbe\Domain\Model\Query();

		$queryRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\QueryRepository', array('add'), array(), '', FALSE);
		$queryRepository->expects($this->once())->method('add')->with($query);
		$this->inject($this->subject, 'queryRepository', $queryRepository);

		$this->subject->createAction($query);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenQueryToView()
	{
		$query = new \Barlian\Wfqbe\Domain\Model\Query();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('query', $query);

		$this->subject->editAction($query);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenQueryInQueryRepository()
	{
		$query = new \Barlian\Wfqbe\Domain\Model\Query();

		$queryRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\QueryRepository', array('update'), array(), '', FALSE);
		$queryRepository->expects($this->once())->method('update')->with($query);
		$this->inject($this->subject, 'queryRepository', $queryRepository);

		$this->subject->updateAction($query);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenQueryFromQueryRepository()
	{
		$query = new \Barlian\Wfqbe\Domain\Model\Query();

		$queryRepository = $this->getMock('Barlian\\Wfqbe\\Domain\\Repository\\QueryRepository', array('remove'), array(), '', FALSE);
		$queryRepository->expects($this->once())->method('remove')->with($query);
		$this->inject($this->subject, 'queryRepository', $queryRepository);

		$this->subject->deleteAction($query);
	}
}
