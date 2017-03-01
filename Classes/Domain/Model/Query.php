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
 * Query
 */
class Query extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     */
    protected $title = '';
    
    /**
     * description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * query
     * 
     * @var string
     */
    protected $query = '';
    
    /**
     * dbname
     * 
     * @var string
     */
    protected $dbname = '';
    
    /**
     * search
     * 
     * @var string
     */
    protected $search = '';
    
    /**
     * insertq
     * 
     * @var string
     */
    protected $insertq = '';
    
    /**
     * type
     * 
     * @var int
     */
    protected $type = '';
    
    /**
     * feGroup
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup>
     */
    protected $feGroup = null;
    
    /**
     * credentials
     * 
     * @var \Barlian\Wfqbe\Domain\Model\Credential
     */
    protected $credentials = null;
    
    /**
     * searchinquery
     * 
     * @var \Barlian\Wfqbe\Domain\Model\Query
     */
    protected $searchinquery = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->feGroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
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
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the query
     * 
     * @return string $query
     */
    public function getQuery()
    {
        return $this->query;
    }
    
    /**
     * Sets the query
     * 
     * @param string $query
     * @return void
     */
    public function setQuery($query)
    {
        $this->query = $query;
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
     * Returns the search
     * 
     * @return string $search
     */
    public function getSearch()
    {
        return $this->search;
    }
    
    /**
     * Sets the search
     * 
     * @param string $search
     * @return void
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }
    
    /**
     * Returns the insertq
     * 
     * @return string $insertq
     */
    public function getInsertq()
    {
        return $this->insertq;
    }
    
    /**
     * Sets the insertq
     * 
     * @param string $insertq
     * @return void
     */
    public function setInsertq($insertq)
    {
        $this->insertq = $insertq;
    }
    
    /**
     * Adds a FrontendUserGroup
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $feGroup
     * @return void
     */
    public function addFeGroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $feGroup)
    {
        $this->feGroup->attach($feGroup);
    }
    
    /**
     * Removes a FrontendUserGroup
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $feGroupToRemove The FrontendUserGroup to be removed
     * @return void
     */
    public function removeFeGroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $feGroupToRemove)
    {
        $this->feGroup->detach($feGroupToRemove);
    }
    
    /**
     * Returns the feGroup
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup> $feGroup
     */
    public function getFeGroup()
    {
        return $this->feGroup;
    }
    
    /**
     * Sets the feGroup
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup> $feGroup
     * @return void
     */
    public function setFeGroup(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $feGroup)
    {
        $this->feGroup = $feGroup;
    }
    
    /**
     * Returns the credentials
     * 
     * @return \Barlian\Wfqbe\Domain\Model\Credential $credentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
    
    /**
     * Sets the credentials
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Credential $credentials
     * @return void
     */
    public function setCredentials(\Barlian\Wfqbe\Domain\Model\Credential $credentials)
    {
        $this->credentials = $credentials;
    }
    
    /**
     * Returns the type
     * 
     * @return int type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Sets the type
     * 
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * Returns the searchinquery
     * 
     * @return \Barlian\Wfqbe\Domain\Model\Query $searchinquery
     */
    public function getSearchinquery()
    {
        return $this->searchinquery;
    }
    
    /**
     * Sets the searchinquery
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Query $searchinquery
     * @return void
     */
    public function setSearchinquery(\Barlian\Wfqbe\Domain\Model\Query $searchinquery)
    {
        $this->searchinquery = $searchinquery;
    }

}