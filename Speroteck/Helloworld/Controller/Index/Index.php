<?php
/**
 * Speroteck_Helloworld Package is a packege for helloworld
 *
 * @category    Speroteck
 * @package     Speroteck_Helloworld
 * @copyright   Copyright (c) http://www.speroteck.com
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Speroteck_Helloworld class is an action listener for helloworld
 *
 * @category    Speroteck
 * @package     Speroteck_Helloworld
 * @author      mkondrashyna@speroteck.com
 */

namespace Speroteck\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Action\Action;
use \Speroteck\CustomLogger\Logger\Logger;
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_context;
    /**
     * Logging instance
     * @var \Speroteck\CustomLogger\Logger\Logger
     */
    protected $_logger;
    /**
     * constructor
     *
     * @param Context               $context
     * @param PageFactory           $resultPageFactory
     * @param \Speroteck\CustomLogger\Logger\Logger     $logger
     */
    public function __construct
    (
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Speroteck\CustomLogger\Logger\Logger $logger,
        \Magento\Framework\App\Request\Http $request
    )
    {

        $this->_logger = $logger;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
        $this->_context = $context;
    }

    /**
     * main
     *
     * @return PageFactory          $resultPage
     */
    public function execute()
    {
        //echo $this->_directory_list;
        $ip = $this->rm_visitor_ip();
        $url = $this->_context->getUrl()->getCurrentUrl();
        $log_msg = $ip."; ".$url.";";
        $this->_logger->info($log_msg);

        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }

    function rm_visitor_ip() {
        /** @var \Magento\Framework\ObjectManagerInterface $om */
        $om = \Magento\Framework\App\ObjectManager::getInstance();
        /** @var \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $a */
        $a = $om->get('Magento\Framework\HTTP\PhpEnvironment\RemoteAddress');
        return $a->getRemoteAddress();
    }

}