<?php
/**
 * File: WebProfileClient.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 05/07/17
 * Time: 19:33
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\PayPal;


use LACC\Models\PaypalWebProfile;
use PayPal\Api\FlowConfig;
use PayPal\Api\InputFields;
use PayPal\Api\Presentation;
use PayPal\Api\WebProfile;
use PayPal\Rest\ApiContext;

class WebProfileClient
{
    /**
     * @var ApiContext
     */
    private $apiContext;


    /**
     * WebProfileClient constructor.
     * @param ApiContext $apiContext
     */
    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
    }

    public function create(PaypalWebProfile $paypalProfileModel)
    {
        $flowConfig = new FlowConfig();
        $flowConfig->setLandingPageType('Billing');

        $presentation = new Presentation();
        $presentation->setLogoImage($paypalProfileModel->logo_url)
            ->setBrandName($paypalProfileModel->name)
            ->setLocaleCode('BR')
            ->setReturnUrlLabel('Return')
            ->setNoteToSellerLabel('Thank you for buying');

        $inputsFields = new InputFields();
        $inputsFields->setAllowNote(false)
            ->setNoShipping(1)
            ->setAddressOverride(0);

        $paypalWebProfile = new WebProfile();
        $paypalWebProfile->setName("$paypalProfileModel->name-" . uniqid())
            ->setFlowConfig($flowConfig)
            ->setPresentation($presentation)
            ->setInputFields($inputsFields)
            ->setTemporary(false);

        return $paypalWebProfile->create($this->apiContext);
    }

    public function update(PaypalWebProfile $paypalProfileModel)
    {
        $webProfile = WebProfile::get($paypalProfileModel->code, $this->apiContext);
        $webProfile->setName("$paypalProfileModel->name-" . uniqid());

        $webProfile->getPresentation()
            ->setBrandName($paypalProfileModel->name)
            ->setLogoImage($paypalProfileModel->logo_url);


        return $webProfile->update($this->apiContext);
    }

    public function delete($webProfileId)
    {
        $webProfile = WebProfile::get($webProfileId, $this->apiContext);
        $webProfile->delete($this->apiContext);
    }

}