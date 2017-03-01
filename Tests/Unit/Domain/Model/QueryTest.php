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
 * Test case for class \Barlian\Wfqbe\Domain\Model\Query.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Davide Menegon <menedav@libero.it>
 * @author Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 * @author David Bruchmann <david.bruchmann@gmail.com>
 */
class QueryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Barlian\Wfqbe\Domain\Model\Query
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Barlian\Wfqbe\Domain\Model\Query();
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
	public function getQueryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getQuery()
		);
	}

	/**
	 * @test
	 */
	public function setQueryForStringSetsQuery()
	{
		$this->subject->setQuery('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'query',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDbnameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDbname()
		);
	}

	/**
	 * @test
	 */
	public function setDbnameForStringSetsDbname()
	{
		$this->subject->setDbname('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dbname',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSearchReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSearch()
		);
	}

	/**
	 * @test
	 */
	public function setSearchForStringSetsSearch()
	{
		$this->subject->setSearch('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'search',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getInsertqReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getInsertq()
		);
	}

	/**
	 * @test
	 */
	public function setInsertqForStringSetsInsertq()
	{
		$this->subject->setInsertq('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'insertq',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setTypeForIntSetsType()
	{	}

	/**
	 * @test
	 */
	public function getFeGroupReturnsInitialValueForFrontendUserGroup()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getFeGroup()
		);
	}

	/**
	 * @test
	 */
	public function setFeGroupForObjectStorageContainingFrontendUserGroupSetsFeGroup()
	{
		$feGroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup();
		$objectStorageHoldingExactlyOneFeGroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneFeGroup->attach($feGroup);
		$this->subject->setFeGroup($objectStorageHoldingExactlyOneFeGroup);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneFeGroup,
			'feGroup',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addFeGroupToObjectStorageHoldingFeGroup()
	{
		$feGroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup();
		$feGroupObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$feGroupObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($feGroup));
		$this->inject($this->subject, 'feGroup', $feGroupObjectStorageMock);

		$this->subject->addFeGroup($feGroup);
	}

	/**
	 * @test
	 */
	public function removeFeGroupFromObjectStorageHoldingFeGroup()
	{
		$feGroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup();
		$feGroupObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$feGroupObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($feGroup));
		$this->inject($this->subject, 'feGroup', $feGroupObjectStorageMock);

		$this->subject->removeFeGroup($feGroup);

	}

	/**
	 * @test
	 */
	public function getCredentialsReturnsInitialValueForCredential()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCredentials()
		);
	}

	/**
	 * @test
	 */
	public function setCredentialsForCredentialSetsCredentials()
	{
		$credentialsFixture = new \Barlian\Wfqbe\Domain\Model\Credential();
		$this->subject->setCredentials($credentialsFixture);

		$this->assertAttributeEquals(
			$credentialsFixture,
			'credentials',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSearchinqueryReturnsInitialValueForQuery()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getSearchinquery()
		);
	}

	/**
	 * @test
	 */
	public function setSearchinqueryForQuerySetsSearchinquery()
	{
		$searchinqueryFixture = new \Barlian\Wfqbe\Domain\Model\Query();
		$this->subject->setSearchinquery($searchinqueryFixture);

		$this->assertAttributeEquals(
			$searchinqueryFixture,
			'searchinquery',
			$this->subject
		);
	}
}
