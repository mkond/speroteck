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
namespace Speroteck\Helloworld\Block;

class Helloworld extends \Magento\Framework\View\Element\Template
{
    /**
     * getHelloWorldTxt print string
     *
     * @return string
     */
    public function getHelloWorldTxt()
    {
        return 'test logger<-------------------';
    }
}