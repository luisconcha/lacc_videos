<?php

namespace LACC\Listeners;

use LACC\Models\PaypalWebProfile;
use LACC\PayPal\WebProfileClient;
use Prettus\Repository\Events\RepositoryEntityDeleted;

class DeletetePaypalWebProfileListener
{
    /**
     * @var WebProfileClient
     */
    private $webProfileClient;

    /**
     * DeletetedPaypalWebProfileListener constructor.
     * @param WebProfileClient $webProfileClient
     */
    public function __construct(WebProfileClient $webProfileClient)
    {
        $this->webProfileClient = $webProfileClient;
    }

    /**
     * Handle the event.
     *
     * @param  RepositoryEntityDeleted  $event
     * @return void
     */
    public function handle(RepositoryEntityDeleted $event)
    {
        $model = $event->getModel();
        if( !( $model instanceof PaypalWebProfile ) ) {
            return;
        }

        $this->webProfileClient->delete($model->code);
    }
}
