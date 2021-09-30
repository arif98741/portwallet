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

use Illuminate\Support\ServiceProvider;

class PortWalletProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * @since v0.0.1
     * @version v0.0.1
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/portwallet.php' => config_path('portwallet.php'),
        ]);
    }
}
