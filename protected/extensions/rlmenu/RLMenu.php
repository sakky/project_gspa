<?php

/**
 * This extension is used for making the menu item active for its corresponding related link
 *
 * @author turi
 * 
 * @version: 1.0
 */

Yii::import('zii.widgets.CMenu');

class RLMenu extends CMenu {

    /**
     * Init widget
     */
    public function init() {

        parent::init();
    }

    /**
     * Normalizes the {@link items} property so that the 'active' state is properly identified for every menu item.
     * @param array $items the items to be normalized.
     * @param string $route the route of the current request.
     * @param boolean $active whether there is an active child menu item.
     * @return array the normalized menu items
     */
    protected function normalizeItems($items, $route, &$active) {
        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
            if (!isset($item['label']))
                $item['label'] = '';
            if ($this->encodeLabel)
                $items[$i]['label'] = CHtml::encode($item['label']);
            $hasActiveChild = false;
            if (isset($item['items'])) {
                $items[$i]['items'] = $this->normalizeItems($item['items'], $route, $hasActiveChild);
                if (empty($items[$i]['items']) && $this->hideEmptyItems) {
                    unset($items[$i]['items']);
                    if (!isset($item['url'])) {
                        unset($items[$i]);
                        continue;
                    }
                }
            }
            if (!isset($item['active'])) {
                if ($this->activateParents && $hasActiveChild || $this->activateItems && ($this->isItemActive($item, $route) || (isset($item['relatedLinks']) && $this->isRelatedLinkActive($item['relatedLinks'], $route))))
                    $active = $items[$i]['active'] = true;
                else
                    $items[$i]['active'] = false;
            }
            else if ($item['active'])
                $active = true;
        }
        return array_values($items);
    }
    
    /**
     * Show the menu item as Active for its corresponding related links
     * @param type $related_links_arr the related link items to the menu item
     * @param type $route the route of the current request.
     * @return boolean true of false for the menu active state
     */
    protected function isRelatedLinkActive($related_links_arr, $route) {
        $state = false;
        if (is_array($related_links_arr)) {
            foreach ($related_links_arr as $item) {
                if ($this->isItemActive(array('url'=>array($item)), $route)) {
                    $state = true;
                    break;
                }
            }
        }
        return $state;
    }

}

?>
