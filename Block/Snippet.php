<?php

namespace Augustash\Crazyegg\Block;

use Augustash\Crazyegg\Helper\Data as CrazyeggHelperData;

class Snippet extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Augustash\Crazyegg\Helper\Data
     */
    protected $helper;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    protected $baseUrl = '//script.crazyegg.com/pages/scripts/';
    protected $baseUrlSuffix = '.js?';

    /**
     * class constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param CrazyeggHelperData                                $helper
     * @param array                                             $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CrazyeggHelperData $helper,
        array $data = []
    )
    {
        $this->helper           = $helper;
        $this->storeManager     = $context->getStoreManager();

        parent::__construct($context, $data);
    }


    /**
     * Retrieve configuration value for `enabled`
     *
     * @return boolean
     */
    public function getIsEnabled($storeId = null)
    {
        return $this->helper->isEnabled($storeId);
    }

    /**
     * Retrieve configuration value for `account_number`
     *
     * @return string
     */
    public function getAccountNumber($storeId = null)
    {
        return $this->helper->getAccountNumber($storeId);
    }

    /**
     * takes the $baseUrl and splits the account number
     * to create a URL similar to this:
     *
     *   //script.crazyegg.com/pages/scripts/0001/1234.js?
     *
     * @return string
     */
    public function getJavascriptUrl($storeId = null)
    {
        $accountNumber = $this->getAccountNumber($storeId);
        if ($accountNumber) {
            $part1 = substr($accountNumber, 0, 4);
            $part2 = substr($accountNumber, 4, 4);

            return $this->baseUrl . $part1 . '/' . $part2 . $this->baseUrlSuffix;
        } else {
            return $this->baseUrl . 'MISSING/ACCT#' . $this->baseUrlSuffix;
        }
    }
}
