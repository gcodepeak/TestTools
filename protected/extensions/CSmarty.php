<?php
/**
 *  * 扩展增加smarty模板 
 *   *
 *    * @author Hema
 *     * @link http://www.ttall.net/
 *      * @copyright Copyright © 2012-2015  ttall.net
 *       * @license http://www.ttall.net/license/
 *        */
require_once (Yii::getPathOfAlias('application.extensions.smarty') . DIRECTORY_SEPARATOR . 'Smarty.class.php');

define('SMARTY_VIEW_DIR', Yii::getPathOfAlias('application.views'));

class CSmarty extends Smarty {
	const DIR_SEP = DIRECTORY_SEPARATOR;
	function __construct() {
		parent::__construct();
		$this -> template_dir = SMARTY_VIEW_DIR;
		$this -> compile_dir = SMARTY_VIEW_DIR . self::DIR_SEP . 'template_c';
		$this -> caching = true;
		$this -> cache_dir = SMARTY_VIEW_DIR . self::DIR_SEP . 'cache';
		$this -> left_delimiter = '<!--{';
		$this -> right_delimiter = '}-->';
		$this -> cache_lifetime = 0;

		// -- 初始全局数据
		$this -> assign('base_url', 
			'http://www.meilizhubo.com');
		$this -> assign('index_url', 
			'http://www.meilizhubo.com');
	}
	function init() {
	}
}
