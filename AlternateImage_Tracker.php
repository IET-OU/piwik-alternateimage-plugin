<?php
/**
 * Extending Piwik for the JISC Track OER project.
 *
 * @link http://piwik.org
 * @license
 * @version $Id$
 * @copyright 2012 The Open University.
 * @author N.D.Freear, 7 August 2012.
 *
 * @category Piwik_Plugins
 * @package Piwik_TrackOER
 */
require_once PIWIK_INCLUDE_PATH .'/core/Tracker.php';


/**
 * @package Piwik_TrackOER
 */
//class CreativeCommons_Tracker extends Piwik_Tracker {
class AlternateImage_Tracker extends Piwik_Tracker {

	public function __construct() {
		//parent::__construct();

		@header('X-'.__CLASS__.': 1');
	}


	/**
	* ?img=cc:by-nc-sa/2.0/uk/88x31.png&idsite=1
	*/
	protected function outputTransparentGif() {
		$img = Piwik_Common::getRequestVar('img', '[no]', 'string');
		#$img = isset($_GET['img']) ? $_GET['img'] : NULL;

		@header('X-'.__CLASS__.'-Param: '. $img);

		$RE = '@^(cc)\:([a-z\-]{2,8})$@';	#'(\/\d\.\d)?(\/[a-z]{2,})?(\/88x31|\/80x15)?(\.png)?$@';

		$license = NULL;
		if (preg_match($RE, $img, $matches)) {
		  $lic = (object) array(
			'_raw'=> $matches,
			'_re' => $RE,
			'ns'  => $matches[1],
			'wh'  => $matches[2],
			'ver' => isset($matches[3]) ? $matches[3] : '3.0',
			'jur' => isset($matches[4]) ? ltrim($matches[4], '/') : '', #uk
			'sz'  => isset($matches[5]) ? ltrim($matches[5], '/') : '88x31',
			'fmt' => isset($matches[6]) ? ltrim($matches[6], '.') : 'png',
		  );
		}
		@header('X-Debug: '.json_encode($lic));

		$cc_licenses = array(
			'by',
			'by-nc',
			'by-nc-sa',
			'by-nd',
			'by-sa',
		);

		if ($img && in_array($lic->wh, $cc_licenses)) {

			$image_url =
			"http://i.creativecommons.org/l/$lic->wh/$lic->ver/$lic->sz.$lic->fmt";
			$license_url = "http://creativecommons.org/licenses/$lic->wh/lic->ver/deed.en_GB";
			$image_file = "/i.creativecommons.org/l-$lic->wh-$lic->sz.$lic->fmt";
			@header('X-License-URL: '. $license_url);
			@header('X-Image-URL: '. $image_url);
			@header('X-Image-File: '. $image_file);
		} else {
			$img = NULL;
		}

		#if (! function_exists('imagecreatefrompng')) die 'PNG error';
		if ($img) {

			$im = imagecreatefrompng(dirname(__FILE__) . $image_file);

			header('Content-Type: image/png');

			imagepng($im);
			imagedestroy($im);

			return;
		}

		return parent::outputTransparentGif();
	}
}