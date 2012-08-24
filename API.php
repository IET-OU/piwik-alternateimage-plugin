<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id$
 * 
 * @category Piwik_Plugins
 * @package 
 */
require_once dirname(__FILE__) .'/AlternateImage_Tracker.php';


/**
 * @package Piwik_Actions
 */
class Piwik_AlternateImage_API
{
	static private $instance = null;
	
	/**
	 * @return Piwik_Actions_API
	 */
	static public function getInstance()
	{
		if (self::$instance == null)
		{
			self::$instance = new self;
		}
		return self::$instance;
	}


}

