<?php

namespace Augustash\Crazyegg\Block;


class Snippet extends \Magento\Framework\View\Element\Template
{
    /**
     * @var boolean
     */
    protected $isEnabled;

    /**
     * @var string
     */
    protected $accountNumber;

    protected $baseUrl = '//script.crazyegg.com/pages/scripts/';
    protected $baseUrlSuffix = '.js?';


    /**
     * Retrieve configuration value for `enabled`
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        $this->isEnabled = $this->_scopeConfig->getValue(
            'augustash_crazyegg/general/enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        return $this->isEnabled;
    }

    /**
     * Retrieve configuration value for `account_number`
     *
     * @return string
     */
    public function getAccountNumber()
    {
        if (empty($this->accountNumber)) {
            $this->accountNumber = $this->_scopeConfig->getValue(
                'augustash_crazyegg/general/account_number',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return $this->accountNumber;
    }

    /**
     * takes the $baseUrl and splits the account number
     * to create a URL similar to this:
     *
     *   //script.crazyegg.com/pages/scripts/0001/1234.js?
     *
     * @return string
     */
    public function getJavascriptUrl()
    {
        $accountNumber = $this->getAccountNumber();
        if ($accountNumber) {
            $part1 = substr($accountNumber, 0, 4);
            $part2 = substr($accountNumber, 4, 4);

            return $this->baseUrl . $part1 . '/' . $part2 . $this->baseUrlSuffix;
        } else {
            return $this->baseUrl . 'MISSING/ACCT#' . $this->baseUrlSuffix;
        }
    }
}
