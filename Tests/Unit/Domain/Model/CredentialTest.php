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
 * Test case for class \Barlian\Wfqbe\Domain\Model\Credential.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Davide Menegon <menedav@libero.it>
 * @author Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 * @author David Bruchmann <david.bruchmann@gmail.com>
 */
class CredentialTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Barlian\Wfqbe\Domain\Model\Credential
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Barlian\Wfqbe\Domain\Model\Credential();
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
	public function getHostReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getHost()
		);
	}

	/**
	 * @test
	 */
	public function setHostForStringSetsHost()
	{
		$this->subject->setHost('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'host',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDbmsReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setDbmsForIntSetsDbms()
	{	}

	/**
	 * @test
	 */
	public function getUsernameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUsername()
		);
	}

	/**
	 * @test
	 */
	public function setUsernameForStringSetsUsername()
	{
		$this->subject->setUsername('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'username',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPasswReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPassw()
		);
	}

	/**
	 * @test
	 */
	public function setPasswForStringSetsPassw()
	{
		$this->subject->setPassw('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'passw',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getConnTypeReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setConnTypeForIntSetsConnType()
	{	}

	/**
	 * @test
	 */
	public function getSetdbinitReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSetdbinit()
		);
	}

	/**
	 * @test
	 */
	public function setSetdbinitForStringSetsSetdbinit()
	{
		$this->subject->setSetdbinit('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'setdbinit',
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
	public function getConnectionModeReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setConnectionModeForIntSetsConnectionMode()
	{	}

	/**
	 * @test
	 */
	public function getConnectionUriReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getConnectionUri()
		);
	}

	/**
	 * @test
	 */
	public function setConnectionUriForStringSetsConnectionUri()
	{
		$this->subject->setConnectionUri('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'connectionUri',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getConnectionLocalconfReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getConnectionLocalconf()
		);
	}

	/**
	 * @test
	 */
	public function setConnectionLocalconfForStringSetsConnectionLocalconf()
	{
		$this->subject->setConnectionLocalconf('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'connectionLocalconf',
			$this->subject
		);
	}
}
