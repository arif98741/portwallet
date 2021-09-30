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


use PortWallet\PortWalletClient;
use Xenon\PortWallet\Handler\RenderException;

class Request
{

    /**
     * @var
     */
    private $invoice_id;

    /**
     * @var
     */
    private $paymentUrl;

    /**
     * @var PortWallet
     */
    private $portWalletObject;

    /**
     * @var PortWalletClient
     */
    private $portWalletClientObject;

    /**
     * @var
     */
    private $portWalletResponse;


    /**
     * @param PortWallet $portWallet
     * @version v0.0.1
     * @since v0.0.1
     */
    public function __construct(PortWallet $portWallet)
    {
        $config = $portWallet->getConfig();
        $this->portWalletObject = $portWallet;

        $this->portWalletClientObject = new PortWalletClient($config['api_key'], $config['api_secret']);
    }


    /**
     * Send Rest To Portwallet
     * @since v0.0.1
     * @version v0.0.1
     */
    public function send()
    {
        try {
            $this->portWalletResponse = $this->portWalletClientObject
                ->invoice
                ->create($this->portWalletObject->getPaymentData());

            if (!is_object($this->portWalletResponse)) {
                throw new RenderException($this->portWalletResponse);
            } else {
                $this->paymentUrl = $this->portWalletResponse->getPaymentUrl();
                $this->invoice_id = $this->portWalletResponse->getInvoiceId();

                $this->paymentUrl = 'https://payment-sandbox.portwallet.com/payment/?invoice=' . $this->invoice_id;
                return [
                    'payment_url' => $this->paymentUrl,
                    'request' => [
                        'payment_data' => $this->portWalletObject->getPaymentData(),
                        'config' => $this->portWalletObject->getConfig()
                    ],
                    'response' => [
                        'invoice_id' => $this->invoice_id
                    ]
                ];

            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
