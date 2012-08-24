<?php
/**
 * Extending Piwik for the JISC Track OER project.
 *
 * @link http://track.olnet.org
 * @license http://gnu.org/licenses/gpl-2.0.html GNU GPL v2 or later
 * @version $Id$
 * @copyright 2012 The Open University.
 * @author N.D.Freear, 7 August 2012.
 *
 * @category Piwik_Plugins
 * @package Piwik_TrackOER
 */
require_once dirname(__FILE__) .'/AlternateImage_Tracker.php';


/**
 *
 * @package Piwik_TrackOER
 */
class Piwik_AlternateImage extends Piwik_Plugin {

	/**
	 * Return information about this plugin.
	 *
	 * @see Piwik_Plugin
	 *
	 * @return array
	 */
	public function getInformation()
	{
		return array(
			'description' =>Piwik_Translate('AlternateImage_PluginDescription'),
			'homepage' => 'http://track.olnet.org/',
			'author' => 'IET at The Open University',
			'author_homepage' => 'http://iet.open.ac.uk/',
			'license' => 'GNU GPL v2 or later',
			'license_homepage' => 'http://gnu.org/licenses/gpl-2.0.html',
			'version' => '0.1',
			'translationAvailable' => true,
			'TrackerPlugin' => true,
		);
	}
	
	public function getListHooksRegistered()
	{
		return array(
//			'Controller.renderView' => 'addUniqueVisitorsColumnToGivenReport',
		);
	}

	function activate()
	{
		// Executed every time plugin is Enabled
	}
	
	function deactivate()
	{
		// Executed every time plugin is disabled
	}
	
	/**
	 * @param Piwik_Event_Notification $notification  notification object
	 */
	function addUniqueVisitorsColumnToGivenReport($notification)
	{
		
	}
	
	function postLoad()
	{
		// we register the widgets so they appear in the "Add a new widget" window in the dashboard
		// Note that the first two parameters can be either a normal string, or an index to a translation string
		#Piwik_AddWidget('ExamplePlugin_exampleWidgets', 'ExamplePlugin_exampleWidget', 'ExamplePlugin', 'exampleWidget');
	}
}
