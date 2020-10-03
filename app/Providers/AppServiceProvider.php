<?php

namespace App\Providers;

use App\Models\Channel;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\PostcardSendingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if ($_REQUEST['payment'] == "bank") {
                return new BankPaymentGateway('USD');
            } else if ($_REQUEST['payment'] == "credit") {
                return new CreditPaymentGateway('USD');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # method 1
        // View::share('channels', Channel::orderBy('name')->get());

        # method 2
        // View::composer(['view_composer.post.create', 'view_composer.channel.index'], function ($view) {

        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        # Method 3
        View::composer(['view_composer.post.create', 'view_composer.channel.index'], ChannelsComposer::class);

        $this->app->singleton('Postcard', function ($app) {
            return new PostcardSendingService('USA', 4, 6);
        });
    }
}
