<?php
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

require_once __DIR__ . '/helper.php';

$com_path = JPATH_SITE . '/components/com_board/';
JLoader::register('BoardRoute', $com_path . '/helpers/route.php');

$list = ModBoardCategoriesHelper::getList();

$layout = $params->get('layout', 'default');

require_once ModuleHelper::getLayoutPath('mod_board_categories', $layout);