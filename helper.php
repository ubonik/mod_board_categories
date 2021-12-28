<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

class ModBoardCategoriesHelper {

    public static function getList()
    {
        $list = [];

        $db = Factory::getDbo();
        $query = $db->getQuery(true);

        $query->select('id, name, alias, parentid')
            ->from('#__board_categories')
            ->where('state=1')
            ->order('ordering' . ' ' . 'ASC')
        ;
        $db->setQuery($query);

        $categories = $db->loadObjectList();

        if (!array($categories)) {
            return false;
        }

        foreach ($categories as $row) {
            if (!$row->parentid) {
                $list[$row->id]['name'] = $row->name;
                $list[$row->id]['alias'] = $row->alias;
            } else {
                $list[$row->parentid]['next'][] = [
                    'id' => $row->id,
                    'name' => $row->name,
                    'alias' => $row->alias
                ];
            }
        }

        return $list;
    }
}