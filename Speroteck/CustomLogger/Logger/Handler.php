<?php
namespace Speroteck\CustomLogger\Logger;

//use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Action\Action;

class Handler extends \Magento\Framework\App\Action\Action
{
    /**
     * Logging level
     * @var int
     */
    protected $loggerType = Logger::INFO;

    /**
     * File name
     * @var string
     */
    protected $fileName = '/var/log/custom.log';

    public function __construct(
        \Magento\Customer\Model\Visitor $customerVisitor
    ){
        $this->_customerVisitor = $customerVisitor;

    }
    public function execute()
    {
       // $this->_customerVisitor = $customerVisitor;
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Your text message');;
    }
}