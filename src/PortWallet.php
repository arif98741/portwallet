<?php
/*
 *  Last Modified: 9/30/21, 12:18 AM
 *  Copyright (c) 2021
 *  -created by Ariful Islam
 *  -All Rights Preserved By
 *  -If you have any query then knock me at
 *  arif98741@gmail.com
 *  See my profile @ https://github.com/arif98741
 */

namespace Xenon\PortWallet;


class PortWallet
{

    /**
     * @var
     */
    private $apiMode = 'sandbox';

    /**
     * @var
     */
    private $paymentData;

    /**
     * @var
     */
    private $config;

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * Get Class Object
     * @return PortWallet
     * @version v0.0.1
     * @since v0.0.1
     */
    public static function getInstance(): PortWallet
    {
        if (!isset(self::$instance)) {
            self::$instance = new PortWallet();
        }
        return self::$instance;
    }

    /**
     * Get Configuration
     * @return mixed
     * @version v0.0.1
     * @since v0.0.1
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set Configuration
     * @param array $config
     * @return PortWallet
     * @version v0.0.1
     * @since v0.0.1
     */
    public function setConfig(array $config): PortWallet
    {
        $this->config = $config;
        return $this;
    }

    /**
     * Set Payment Data
     * @param mixed $paymentData
     * @version v0.0.1
     * @since v0.0.1
     */
    public function setPaymentData(array $paymentData): void
    {
        $this->paymentData = $paymentData;
    }

    /**
     * Get Payment Data
     * @return mixed
     * @version v0.0.1
     * @since v0.0.1
     */
    public function getPaymentData()
    {
        return $this->paymentData;
    }

    /**
     * Hit Pay Now
     * @version v0.0.1
     * @since v0.0.1
     */
    public function payNow()
    {
        $request = new Request(self::getInstance());
        return $request->send();
    }
}
