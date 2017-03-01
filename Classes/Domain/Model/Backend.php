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
 * Backend
 */
class Backend extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * recordsforpage
     * 
     * @var string
     */
    protected $recordsforpage = '';
    
    /**
     * searchqPosition
     * 
     * @var int
     */
    protected $searchqPosition = 0;
    
    /**
     * typoscript
     * 
     * @var string
     */
    protected $typoscript = '';
    
    /**
     * exportMode
     * 
     * @var int
     */
    protected $exportMode = 0;
    
    /**
     * listq
     * 
     * @var \Barlian\Wfqbe\Domain\Model\Query
     */
    protected $listq = null;
    
    /**
     * detailsq
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Barlian\Wfqbe\Domain\Model\Query>
     */
    protected $detailsq = null;
    
    /**
     * searchq
     * 
     * @var \Barlian\Wfqbe\Domain\Model\Query
     */
    protected $searchq = null;
    
    /**
     * insertq
     * 
     * @var \Barlian\Wfqbe\Domain\Model\Query
     */
    protected $insertq = null;
    
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
        $this->detailsq = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the recordsforpage
     * 
     * @return string $recordsforpage
     */
    public function getRecordsforpage()
    {
        return $this->recordsforpage;
    }
    
    /**
     * Sets the recordsforpage
     * 
     * @param string $recordsforpage
     * @return void
     */
    public function setRecordsforpage($recordsforpage)
    {
        $this->recordsforpage = $recordsforpage;
    }
    
    /**
     * Returns the searchqPosition
     * 
     * @return int $searchqPosition
     */
    public function getSearchqPosition()
    {
        return $this->searchqPosition;
    }
    
    /**
     * Sets the searchqPosition
     * 
     * @param int $searchqPosition
     * @return void
     */
    public function setSearchqPosition($searchqPosition)
    {
        $this->searchqPosition = $searchqPosition;
    }
    
    /**
     * Returns the typoscript
     * 
     * @return string $typoscript
     */
    public function getTyposcript()
    {
        return $this->typoscript;
    }
    
    /**
     * Sets the typoscript
     * 
     * @param string $typoscript
     * @return void
     */
    public function setTyposcript($typoscript)
    {
        $this->typoscript = $typoscript;
    }
    
    /**
     * Returns the exportMode
     * 
     * @return int $exportMode
     */
    public function getExportMode()
    {
        return $this->exportMode;
    }
    
    /**
     * Sets the exportMode
     * 
     * @param int $exportMode
     * @return void
     */
    public function setExportMode($exportMode)
    {
        $this->exportMode = $exportMode;
    }
    
    /**
     * Returns the listq
     * 
     * @return \Barlian\Wfqbe\Domain\Model\Query $listq
     */
    public function getListq()
    {
        return $this->listq;
    }
    
    /**
     * Sets the listq
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Query $listq
     * @return void
     */
    public function setListq(\Barlian\Wfqbe\Domain\Model\Query $listq)
    {
        $this->listq = $listq;
    }
    
    /**
     * Adds a Query
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Query $detailsq
     * @return void
     */
    public function addDetailsq(\Barlian\Wfqbe\Domain\Model\Query $detailsq)
    {
        $this->detailsq->attach($detailsq);
    }
    
    /**
     * Removes a Query
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Query $detailsqToRemove The Query to be removed
     * @return void
     */
    public function removeDetailsq(\Barlian\Wfqbe\Domain\Model\Query $detailsqToRemove)
    {
        $this->detailsq->detach($detailsqToRemove);
    }
    
    /**
     * Returns the detailsq
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Barlian\Wfqbe\Domain\Model\Query> $detailsq
     */
    public function getDetailsq()
    {
        return $this->detailsq;
    }
    
    /**
     * Sets the detailsq
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Barlian\Wfqbe\Domain\Model\Query> $detailsq
     * @return void
     */
    public function setDetailsq(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $detailsq)
    {
        $this->detailsq = $detailsq;
    }
    
    /**
     * Returns the searchq
     * 
     * @return \Barlian\Wfqbe\Domain\Model\Query $searchq
     */
    public function getSearchq()
    {
        return $this->searchq;
    }
    
    /**
     * Sets the searchq
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Query $searchq
     * @return void
     */
    public function setSearchq(\Barlian\Wfqbe\Domain\Model\Query $searchq)
    {
        $this->searchq = $searchq;
    }
    
    /**
     * Returns the insertq
     * 
     * @return \Barlian\Wfqbe\Domain\Model\Query $insertq
     */
    public function getInsertq()
    {
        return $this->insertq;
    }
    
    /**
     * Sets the insertq
     * 
     * @param \Barlian\Wfqbe\Domain\Model\Query $insertq
     * @return void
     */
    public function setInsertq(\Barlian\Wfqbe\Domain\Model\Query $insertq)
    {
        $this->insertq = $insertq;
    }

}