<?php
namespace Qinx\Qxarticle\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Christian Pschorr <pschorr.christian@gmail.com>
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
 * Page
 */
class Page extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * txQxarticleAbstract
	 * 
	 * @var string
	 */
	protected $txQxarticleAbstract = '';

	/**
	 * Returns the txQxarticleAbstract
	 * 
	 * @return string $txQxarticleAbstract
	 */
	public function getTxQxarticleAbstract() {
		return $this->txQxarticleAbstract;
	}

	/**
	 * Sets the txQxarticleAbstract
	 * 
	 * @param string $txQxarticleAbstract
	 * @return void
	 */
	public function setTxQxarticleAbstract($txQxarticleAbstract) {
		$this->txQxarticleAbstract = $txQxarticleAbstract;
	}

}