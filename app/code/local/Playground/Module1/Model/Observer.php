<?php

/**
 * Class Playground_Module1_Model_Observer
 */
class Playground_Module1_Model_Observer
{
    public function addToTopmenu(Varien_Event_Observer $observer)
    {
        //add link to this module in top menu
        $menu = $observer->getMenu();
        $tree = $menu->getTree();
        $node = new Varien_Data_Tree_Node(
            array(
                'name'   => 'Messenger',
                'id'     => 'messenger',
                'url'    => Mage::getUrl('module1'),
            ), 'id', $tree, $menu
        );
        $menu->addChild($node);
    }
}