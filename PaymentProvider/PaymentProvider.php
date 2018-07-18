<?php
/**Composed by J.Bond 7/17/2018 This is a base class that will encapsulate any credit card processing endpoint that
*the checkout will use.Attempting to abstract enough so that we can keep checkout a separate entity to allow for splitting it off into
*a micro-service at some point. Additionally, I am creating the classes for Payflow Pro communications via a client
*that will be a part of this PaymentProvider*/

namespace PaymentProvider {

use PayFlowProClient\PayFlowProClient;


    class PaymentProvider
    {
        private $providerName;
        private $payFlowClient;

        /**
         * PaymentProvider constructor. Generates client based on specified as parameter using
         * provider client class and .env settings.
         * @param string $providerName;
         * @return PayFlowProClient();
         */

        function __construct($providerName){
            $this->providerName = $providerName;
            $this->payFlowClient = new PayFlowProClient();
            return $this->payFlowClient;
        }

        public function ccsale() {

            $this->payFlowClient->saletransaction();
        }

        public function ccvoid() {
            $this->payFlowClient->voidtransaction();
        }

        public function cccredit() {
            $this->payFlowClient->credittransaction();
        }

        public function ccsettle() {
            $this->payFlowClient->settletransaction();
        }

        function __destruct()
        {
            // TODO: Implement __destruct() method.
        }
    }
}