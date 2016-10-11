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
 * registration.php file use for reg module
 *
 * @category    Speroteck
 * @package     Speroteck_CustomLogger
 * @author      mkondrashyna@speroteck.com
 */

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'CustomLogger',
    __DIR__
);