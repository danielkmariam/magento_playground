<?php

/**
 * Class Playground_Module1_Block_Adminhtml_Message_Grid
 */
class Playground_Module1_Block_Adminhtml_Message_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('messageGrid');
        $this->setUseAjax(true);
        $this->setDefaultSort('message_id');
        $this->setSaveParametersInSession(true);
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('module1/message_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'message_id',
            array(
                'header' => $this->__('ID'),
                'type' => 'number',
                'index' => 'message_id',
            )
        );

        $this->addColumn(
            'referrer_email',
            array(
                'header' => $this->__('Referrer email'),
                'type' => 'text',
                'index' => 'referrer_email',
            )
        );

        $this->addColumn(
            'referrer_name',
            array(
                'header' => $this->__('Referrer name'),
                'type' => 'text',
                'index' => 'referrer_name',
            )
        );

        $this->addColumn(
            'recipient_email',
            array(
                'header' => $this->__('Recipient email'),
                'type' => 'text',
                'index' => 'recipient_email',
            )
        );

        $this->addColumn(
            'recipient_name',
            array(
                'header' => $this->__('Recipient name'),
                'type' => 'text',
                'index' => 'recipient_name',
            )
        );

        $this->addColumn(
            'message',
            array(
                'header' => $this->__('Message'),
                'type' => 'text',
                'index' => 'message',
            )
        );

        $this->addColumn(
            'action',
            array(
                'header' => Mage::helper('adminhtml')->__('Action'),
                'width' => '50px',
                'type' => 'action',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('adminhtml')->__('Edit'),
                        'url' => array(
                            'base' => '*/*/edit',
                        ),
                        'field' => 'id'
                    ),
                ),
                'filter' => false,
                'sortable' => false,
                'index' => 'message_id',
            )
        );

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('message_id');
        $this->getMassactionBlock()->setFormFieldName('message');

        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label'    => $this->__('Delete'),
                'url'      => $this->getUrl('*/*/massDelete'),
                'confirm'  => Mage::helper('adminhtml')->__('Are you sure?')
            )
        );

        return $this;
    }
}