<?php

namespace LACC\Listeners;

use LACC\Models\PaypalWebProfile;
use LACC\PayPal\WebProfileClient;
use LACC\Repositories\PaypalWebProfileRepository;
use Prettus\Repository\Events\RepositoryEntityCreated;

class CreatedPaypalWebProfileListener
{
    /**
     * @var WebProfileClient
     */
    private $webProfileClient;
    /**
     * @var PaypalWebProfileRepository
     */
    private $paypalWebProfileRepository;

    /**
     * CreatedPaypalWebProfileListener constructor.
     * @param WebProfileClient $webProfileClient
     * @param PaypalWebProfileRepository $paypalWebProfileRepository
     */
    public function __construct(
        WebProfileClient $webProfileClient,
        PaypalWebProfileRepository $paypalWebProfileRepository)
    {
        $this->webProfileClient = $webProfileClient;
        $this->paypalWebProfileRepository = $paypalWebProfileRepository;
    }

    /**
     * Handle the event.
     *
     * @param  RepositoryEntityCreated $event
     * @return void
     */
    public function handle(RepositoryEntityCreated $event)
    {
        $model = $event->getModel();
        if (!($model instanceof PaypalWebProfile)) {
            return;
        }

        $payPalWebProfile = $this->webProfileClient->create($model);
        \Config::set('webprofile_created', true);
        $this->paypalWebProfileRepository->update([
            'code' => $payPalWebProfile->getId()
        ], $model->id);

    }
}
