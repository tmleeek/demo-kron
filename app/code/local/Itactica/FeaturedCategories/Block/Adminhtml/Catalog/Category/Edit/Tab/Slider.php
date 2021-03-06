<?php
/**
 * Intenso Premium Theme
 * 
 * @category    Itactica
 * @package     Itactica_FeaturedCategories
 * @copyright   Copyright (c) 2014 Itactica (http://www.itactica.com)
 * @license     http://getintenso.com/license
 */

class Itactica_FeaturedCategories_Block_Adminhtml_Catalog_Category_Edit_Tab_Slider extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Set grid params
     * @access public
     */
    public function __construct() {
        parent::__construct();
        $this->setId('slider_grid');
        $this->setDefaultSort('position');
        $this->setDefaultDir('ASC');
        $this->setUseAjax(true);
        if ($this->getCategory()->getId()) {
            $this->setDefaultFilter(array('in_sliders'=>1));
        }
    }
    /**
     * prepare the slider collection
     * @access protected
     * @return Itactica_FeaturedCategories_Block_Adminhtml_Catalog_Category_Edit_Tab_Slider
     */
    protected function _prepareCollection() {
        $collection = Mage::getResourceModel('itactica_featuredcategories/slider_collection');
        if ($this->getCategory()->getId()){
            $constraint = 'related.category_id='.$this->getCategory()->getId();
            }
            else{
                $constraint = 'related.category_id=0';
            }
        $collection->getSelect()->joinLeft(
            array('related'=>$collection->getTable('itactica_featuredcategories/slider_category')),
            'related.slider_id=main_table.entity_id AND '.$constraint,
            array('position')
        );
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
    /**
     * prepare mass action grid
     * @access protected
     * @return Itactica_FeaturedCategories_Block_Adminhtml_Catalog_Category_Edit_Tab_Slider
     */
    protected function _prepareMassaction(){
        return $this;
    }
    /**
     * prepare the grid columns
     * @access protected
     * @return Itactica_FeaturedCategories_Block_Adminhtml_Catalog_Category_Edit_Tab_Slider
     */
    protected function _prepareColumns(){
        $this->addColumn('in_sliders', array(
            'header_css_class'  => 'a-center',
            'type'  => 'checkbox',
            'name'  => 'in_sliders',
            'values'=> $this->_getSelectedSliders(),
            'align' => 'center',
            'index' => 'entity_id'
        ));
        $this->addColumn('title', array(
            'header'=> Mage::helper('itactica_featuredcategories')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));
        $this->addColumn('position', array(
            'header'        => Mage::helper('itactica_featuredcategories')->__('Position'),
            'name'          => 'position',
            'width'         => 60,
            'type'        => 'number',
            'validate_class'=> 'validate-number',
            'index'         => 'position',
            'editable'      => true,
        ));
        return parent::_prepareColumns();
    }
    /**
     * Retrieve selected sliders
     * @access protected
     * @return array
     */
    protected function _getSelectedSliders(){
        $sliders = $this->getCategorySliders();
        if (!is_array($sliders)) {
            $sliders = array_keys($this->getSelectedSliders());
        }
        return $sliders;
    }
     /**
     * Retrieve selected sliders
     * @access protected
     * @return array
     */
    public function getSelectedSliders() {
        $sliders = array();
        //used helper here in order not to override the category model
        $selected = Mage::helper('itactica_featuredcategories/category')->getSelectedSliders(Mage::registry('current_category'));
        if (!is_array($selected)){
            $selected = array();
        }
        foreach ($selected as $slider) {
            $sliders[$slider->getId()] = array('position' => $slider->getPosition());
        }
        return $sliders;
    }
    /**
     * get row url
     * @access public
     * @param Itactica_FeaturedCategories_Model_Slider
     * @return string
     */
    public function getRowUrl($item){
        return '#';
    }
    /**
     * get grid url
     * @access public
     * @return string
     */
    public function getGridUrl(){
        return $this->getUrl('*/*/slidersGrid', array(
            'id'=>$this->getCategory()->getId()
        ));
    }
    /**
     * get the current category
     * @access public
     * @return Mage_Catalog_Model_Category
     */
    public function getCategory(){
        return Mage::registry('current_category');
    }
    /**
     * Add filter
     * @access protected
     * @param object $column
     * @return Itactica_FeaturedCategories_Block_Adminhtml_Catalog_Category_Edit_Tab_Slider
     */
    protected function _addColumnFilterToCollection($column){
        if ($column->getId() == 'in_sliders') {
            $sliderIds = $this->_getSelectedSliders();
            if (empty($sliderIds)) {
                $sliderIds = 0;
            }
            if ($column->getFilter()->getValue()) {
                $this->getCollection()->addFieldToFilter('entity_id', array('in'=>$sliderIds));
            }
            else {
                if($sliderIds) {
                    $this->getCollection()->addFieldToFilter('entity_id', array('nin'=>$sliderIds));
                }
            }
        }
        else {
            parent::_addColumnFilterToCollection($column);
        }
        return $this;
    }
}
