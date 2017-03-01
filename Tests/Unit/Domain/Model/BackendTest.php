<?php

namespace Barlian\Wfqbe\Tests\Unit\Domain\Model;

/***************************************************************
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
 * Test case for class \Barlian\Wfqbe\Domain\Model\Backend.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Davide Menegon <menedav@libero.it>
 * @author Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 * @author David Bruchmann <david.bruchmann@gmail.com>
 */
class BackendTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Barlian\Wfqbe\Domain\Model\Backend
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Barlian\Wfqbe\Domain\Model\Backend();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRecordsforpageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRecordsforpage()
		);
	}

	/**
	 * @test
	 */
	public function setRecordsforpageForStringSetsRecordsforpage()
	{
		$this->subject->setRecordsforpage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'recordsforpage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSearchqPositionReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setSearchqPositionForIntSetsSearchqPosition()
	{	}

	/**
	 * @test
	 */
	public function getTyposcriptReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTyposcript()
		);
	}

	/**
	 * @test
	 */
	public function setTyposcriptForStringSetsTyposcript()
	{
		$this->subject->setTyposcript('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'typoscript',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getExportModeReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setExportModeForIntSetsExportMode()
	{	}

	/**
	 * @test
	 */
	public function getListqReturnsInitialValueForQuery()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getListq()
		);
	}

	/**
	 * @test
	 */
	public function setListqForQuerySetsListq()
	{
		$listqFixture = new \Barlian\Wfqbe\Domain\Model\Query();
		$this->subject->setListq($listqFixture);

		$this->assertAttributeEquals(
			$listqFixture,
			'listq',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDetailsqReturnsInitialValueForQuery()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDetailsq()
		);
	}

	/**
	 * @test
	 */
	public function setDetailsqForObjectStorageContainingQuerySetsDetailsq()
	{
		$detailsq = new \Barlian\Wfqbe\Domain\Model\Query();
		$objectStorageHoldingExactlyOneDetailsq = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDetailsq->attach($detailsq);
		$this->subject->setDetailsq($objectStorageHoldingExactlyOneDetailsq);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDetailsq,
			'detailsq',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDetailsqToObjectStorageHoldingDetailsq()
	{
		$detailsq = new \Barlian\Wfqbe\Domain\Model\Query();
		$detailsqObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$detailsqObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($detailsq));
		$this->inject($this->subject, 'detailsq', $detailsqObjectStorageMock);

		$this->subject->addDetailsq($detailsq);
	}

	/**
	 * @test
	 */
	public function removeDetailsqFromObjectStorageHoldingDetailsq()
	{
		$detailsq = new \Barlian\Wfqbe\Domain\Model\Query();
		$detailsqObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$detailsqObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($detailsq));
		$this->inject($this->subject, 'detailsq', $detailsqObjectStorageMock);

		$this->subject->removeDetailsq($detailsq);

	}

	/**
	 * @test
	 */
	public function getSearchqReturnsInitialValueForQuery()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getSearchq()
		);
	}

	/**
	 * @test
	 */
	public function setSearchqForQuerySetsSearchq()
	{
		$searchqFixture = new \Barlian\Wfqbe\Domain\Model\Query();
		$this->subject->setSearchq($searchqFixture);

		$this->assertAttributeEquals(
			$searchqFixture,
			'searchq',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getInsertqReturnsInitialValueForQuery()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getInsertq()
		);
	}

	/**
	 * @test
	 */
	public function setInsertqForQuerySetsInsertq()
	{
		$insertqFixture = new \Barlian\Wfqbe\Domain\Model\Query();
		$this->subject->setInsertq($insertqFixture);

		$this->assertAttributeEquals(
			$insertqFixture,
			'insertq',
			$this->subject
		);
	}
}
