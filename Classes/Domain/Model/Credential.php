<?php
namespace Barlian\Wfqbe\Domain\Model;

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
 * Credential
 */
class Credential extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     */
    protected $title = '';
    
    /**
     * host
     * 
     * @var string
     */
    protected $host = '';
    
    /**
     * DBMS type
     * 
     * @var int
     */
    protected $dbms = 0;
    
    /**
     * username
     * 
     * @var string
     */
    protected $username = '';
    
    /**
     * passw
     * 
     * @var string
     */
    protected $passw = '';
    
    /**
     * connType
     * 
     * @var int
     */
    protected $connType = 0;
    
    /**
     * setdbinit
     * 
     * @var string
     */
    protected $setdbinit = '';
    
    /**
     * dbname
     * 
     * @var string
     */
    protected $dbname = '';
    
    /**
    * Connection Mode
    Was simply "type"
    * 
    * @var int
    */
    protected $connectionMode = 0;
    
    /**
     * connectionUri
     * 
     * @var string
     */
    protected $connectionUri = '';
    
    /**
     * connectionLocalconf
     * 
     * @var string
     */
    protected $connectionLocalconf = '';
    
    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the host
     * 
     * @return string $host
     */
    public function getHost()
    {
        return $this->host;
    }
    
    /**
     * Sets the host
     * 
     * @param string $host
     * @return void
     */
    public function setHost($host)
    {
        $this->host = $host;
    }
    
    /**
     * Returns the dbms
     * 
     * @return int $dbms
     */
    public function getDbms()
    {
        return $this->dbms;
    }
    
    /**
     * Sets the dbms
     * 
     * @param int $dbms
     * @return void
     */
    public function setDbms($dbms)
    {
        $this->dbms = $dbms;
    }
    
    /**
     * Returns the username
     * 
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * Sets the username
     * 
     * @param string $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    /**
     * Returns the passw
     * 
     * @return string $passw
     */
    public function getPassw()
    {
        return $this->passw;
    }
    
    /**
     * Sets the passw
     * 
     * @param string $passw
     * @return void
     */
    public function setPassw($passw)
    {
        $this->passw = $passw;
    }
    
    /**
     * Returns the connType
     * 
     * @return int $connType
     */
    public function getConnType()
    {
        return $this->connType;
    }
    
    /**
     * Sets the connType
     * 
     * @param int $connType
     * @return void
     */
    public function setConnType($connType)
    {
        $this->connType = $connType;
    }
    
    /**
     * Returns the setdbinit
     * 
     * @return string $setdbinit
     */
    public function getSetdbinit()
    {
        return $this->setdbinit;
    }
    
    /**
     * Sets the setdbinit
     * 
     * @param string $setdbinit
     * @return void
     */
    public function setSetdbinit($setdbinit)
    {
        $this->setdbinit = $setdbinit;
    }
    
    /**
     * Returns the dbname
     * 
     * @return string $dbname
     */
    public function getDbname()
    {
        return $this->dbname;
    }
    
    /**
     * Sets the dbname
     * 
     * @param string $dbname
     * @return void
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }
    
    /**
     * Returns the connectionMode
     * 
     * @return int $connectionMode
     */
    public function getConnectionMode()
    {
        return $this->connectionMode;
    }
    
    /**
     * Sets the connectionMode
     * 
     * @param int $connectionMode
     * @return void
     */
    public function setConnectionMode($connectionMode)
    {
        $this->connectionMode = $connectionMode;
    }
    
    /**
     * Returns the connectionUri
     * 
     * @return string $connectionUri
     */
    public function getConnectionUri()
    {
        return $this->connectionUri;
    }
    
    /**
     * Sets the connectionUri
     * 
     * @param string $connectionUri
     * @return void
     */
    public function setConnectionUri($connectionUri)
    {
        $this->connectionUri = $connectionUri;
    }
    
    /**
     * Returns the connectionLocalconf
     * 
     * @return string $connectionLocalconf
     */
    public function getConnectionLocalconf()
    {
        return $this->connectionLocalconf;
    }
    
    /**
     * Sets the connectionLocalconf
     * 
     * @param string $connectionLocalconf
     * @return void
     */
    public function setConnectionLocalconf($connectionLocalconf)
    {
        $this->connectionLocalconf = $connectionLocalconf;
    }

}