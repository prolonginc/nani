<?php

/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace Tests\Browser\ClientPortal\Gateways\Stripe;

use App\DataMapper\FeesAndLimits;
use App\Models\Client;
use App\Models\CompanyGateway;
use App\Models\GatewayType;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\ClientPortal\Login;
use Tests\DuskTestCase;

class BECSTest extends DuskTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }

        $this->browse(function (Browser $browser) {
            $browser
                ->visit(new Login())
                ->auth();
        });

        $this->disableCompanyGateways();

        // Enable Stripe.
        CompanyGateway::where('gateway_key', 'd14dd26a37cecc30fdd65700bfb55b23')->restore();

        // Enable SOFORT.
        $cg = CompanyGateway::where('gateway_key', 'd14dd26a37cecc30fdd65700bfb55b23')->firstOrFail();
        $fees_and_limits = $cg->fees_and_limits;
        $fees_and_limits->{GatewayType::BECS} = new FeesAndLimits();
        $cg->fees_and_limits = $fees_and_limits;
        $cg->save();

        $client = Client::first();
        $client->country_id = 276; // Change to austria
        $client->save();
    }

    public function testPayingWithBECS()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visitRoute('client.invoices.index')
                ->click('@pay-now')
                ->press('Pay Now')
                ->clickLink('BECS')
                ->type('#becs-name', 'John Doe')
                ->type('#becs-email', 'john@doe.com')
                ->withinFrame('iframe', function (Browser $browser) {
                    $browser->type('becs-iban', '000123456');
                })
                ->click('#pay-now')
                ->waitForText('BECS test payment page', 120)
                ->press('.common-Button.common-Button--default')
                ->waitForText('Details of the payment', 60);
        });
    }
}
