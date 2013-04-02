<?php
class ZSystem
{
	static public function GetINI() {
		global $INI;
		$INI = Config::Instance('php');
		$SYS = Table::Fetch('system', 1);
		$SYS = Utility::ExtraDecode($SYS['value']);
		$INI = Config::MergeINI($INI, $SYS);
		$INI = ZSystem::WebRoot();
		return self::BuildINI($INI);
	}

	static public function GetUnsetINI($ini) {
		unset($ini['db']);
		unset($ini['webroot']);
		unset($ini['memcache']);
		return $ini;
	}

	static public function GetSaveINI($ini) {
		return array(
			'db' => $ini['db'],
			'memcache' => $ini['memcache'],
			'webroot' => $ini['webroot'],
		);
	}

	static private function WebRoot() {
		global $INI; if (defined('WEB_ROOT')) return $INI;
		/* validator */
		$script_name = $_SERVER['SCRIPT_NAME'];
		if ( preg_match('#^(.*)/app.php$#', $script_name, $m) ) {
			$INI['webroot'] = $m[1];
			save_config('php');
		}

		if (isset($INI['webroot'])) {
			define('WEB_ROOT', $INI['webroot']);
		} else {
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$docroot = rtrim(str_replace('\\','/',$document_root),'/');
			if(!$docroot) {
				$script_filename = $_SERVER['SCRIPT_FILENAME'];
				$script_filename = str_replace('\\','/',$script_filename);
				$script_name = $_SERVER['SCRIPT_NAME'];
				$script_name = str_replace('\\','/',$script_name);
				$lengthf = strlen($script_filename);
				$lengthn = strlen($script_name);
				$length = $lengthf - $lengthn;
				$docroot = rtrim(substr($script_filename,0,$length),'/');
			}
			$webroot = trim(substr(WWW_ROOT, strlen($docroot)), '\\/');
			define('WEB_ROOT', $webroot ? "/{$webroot}" : '');
		}
		return $INI;
	}

	static private function BuildINI($ini) {
		$host = $_SERVER['HTTP_HOST'];
		$ini['system']['wwwprefix'] = "http://{$host}" . WEB_ROOT;
		$ini['system']['imgprefix'] = "http://{$host}" . WEB_ROOT;
		if(!$ini['system']['sitename']) {
			$ini['system']['sitename'] = 'OGO';
		}
		if(!$ini['system']['sitetitle']) {
			$ini['system']['sitetitle'] = 'Groupon clone|Group buy script|Group buy open source code';
		}
		if(!$ini['system']['abbreviation']) {
			$ini['system']['abbreviation'] = 'OGO';
		}
		if(!$ini['system']['couponname']) {
			$ini['system']['couponname'] = 'Coupon';
		}
		if(!$ini['system']['currency']) {
			$ini['system']['currency'] = '&#165;';
		}
		return $ini;
	}

	static public function GetThemeList() {
		$root = WWW_ROOT . '/static/theme';
		$dirs = scandir($root);
		$themelist = array( 'default'=> 'default',);
		foreach($dirs AS $one) {
			if ( strpos($one,'.') === 0 ) continue;
			$onedir = $root . '/' . $one;
			if ( is_dir($onedir ) ) $themelist[$one] = $one;
		}
		return $themelist;
	}

	static public function GetTemplateList() {
		$root = DIR_ROOT . '/template';
		$dirs = scandir($root);
		$templatelist = array( 'default' => 'default',);
		foreach($dirs AS $one) {
			if ( strpos($one,'.') === 0 ) continue;
			$onedir = $root . '/' . $one;
			if ( is_dir($onedir ) ) $templatelist[$one] = $one;
		}
		return $templatelist;
	}
}
