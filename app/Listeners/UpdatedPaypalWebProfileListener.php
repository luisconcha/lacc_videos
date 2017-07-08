<?php

namespace LACC\Listeners;

use LACC\Models\PaypalWebProfile;
use LACC\PayPal\WebProfileClient;
use Prettus\Repository\Events\RepositoryEntityUpdated;

class UpdatedPaypalWebProfileListener
{
    /**
     * @var WebProfileClient
     */
    private $webProfileClient;

    /**
     * UpdatedPaypalWebProfileListener constructor.
     * @param WebProfileClient $webProfileClient
     */
    public function __construct(WebProfileClient $webProfileClient)
    {
        $this->webProfileClient = $webProfileClient;
    }

    /**
     * Handle the event.
     *
     * @param  RepositoryEntityUpdated $event
     * @return void
     */
    public function handle(RepositoryEntityUpdated $event)
    {
        $model = $event->getModel();
        if (!($model instanceof PaypalWebProfile)) {
            return;
        }
        if(!\Config::get('webprofile_created')){
            $this->webProfileClient->update($model);
        }
    }
}
