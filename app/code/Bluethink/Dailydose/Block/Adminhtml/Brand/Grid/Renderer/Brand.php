<?php
namespace Bluethink\Dailydose\Block\Adminhtml\Brand\Grid\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use Magento\Store\Model\StoreManagerInterface;

class Brand extends AbstractRenderer
{
    private $_storeManager;
    /**
     * @param \Magento\Backend\Block\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Backend\Block\Context $context, StoreManagerInterface $storemanager, array $data = [])
    {
        $this->_storeManager = $storemanager;
        parent::__construct($context, $data);
        $this->_authorization = $context->getAuthorization();
    }
    /**
     * Renders grid column
     *
     * @param Object $row
     * @return  string
     */
    public function render(DataObject $row)
    {
        $mediaDirectory = $this->_storeManager->getStore()->getBaseUrl(
            \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
        );
        if($this->_getValue($row) != ''){
        $imageUrl = $mediaDirectory.'/bluethink/brand/images'.$this->_getValue($row);
        return '<img src="'.$imageUrl.'" width="50"/>';
        }else{
             $imageUrl = $mediaDirectory.'/bluethink/brand/images/logo.jpg';
            return '<img src="'.$imageUrl.'" width="50"/>';

        }
    }
}