<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * This controller is used to simulate an order from a customer.
 * Class OrderController
 * @package AppBundle\Controller
 * @Route("/order", name="order_prepare")
 */
class OrderController extends Controller
{
    /**
     * @Route("/prepare", name="order_prepare")
     */
    public function prepareAction()
    {
        return $this->render('order/prepare/prepare.html.twig');
    }

    /**
     * @Route(
     *     "/checkout",
     *     name="order_checkout",
     *     methods="POST"
     * )
     */
    public function checkoutAction(Request $request)
    {
        \Stripe\Stripe::setApiKey("sk_test_LxWhisyWCYEl4geLtOdPTiPd");


        // Get the credit card details submitted by the form

        $token = $_POST['stripeToken'];


        // Create a charge: this will charge the user's card

        try {

            $charge = \Stripe\Charge::create(array(

                "amount" => '0999', // Amount in cents

                "currency" => "eur",

                "source" => $token,

                "description" => "Paiement Cloud PC",


            ));


            $customer = \Stripe\Customer::create(array(


                "description" => "Abonnement Cloud PC",
                "source" => "tok_mastercard",
                "metadata" => array("order_id" => "aAbo")

            ));


            return $this->redirectToRoute("order_prepare");

        } catch(\Stripe\Error\Card $e) {



            return $this->redirectToRoute("order_prepare");

            // The card has been declined

        }

    }

    /**
     * @Route(
     *     "/checkout/abotwo",
     *     name="order_checkouttrim",
     *     methods="POST"
     * )
     */
    public function checkouttrimAction(Request $request)
    {
        \Stripe\Stripe::setApiKey("sk_test_LxWhisyWCYEl4geLtOdPTiPd");


        // Get the credit card details submitted by the form

        $token = $_POST['stripeToken'];


        // Create a charge: this will charge the user's card

        try {

            $charge = \Stripe\Charge::create(array(

                "amount" => '0999', // Amount in cents

                "currency" => "eur",

                "source" => $token,

                "description" => "Paiement Frais de port Cloud PC abo 3",


            ));


            $customer = \Stripe\Customer::create(array(


                "description" => "Abonnement Cloud PC Trimestriel",
                "source" => "tok_mastercard",
                "metadata" => array("order_id" => "tAbo")

            ));


            return $this->redirectToRoute("order_prepare");

        } catch(\Stripe\Error\Card $e) {



            return $this->redirectToRoute("order_prepare");

            // The card has been declined

        }

    }

    /**
     * @Route(
     *     "/checkout/abothree",
     *     name="order_checkoutyear",
     *     methods="POST"
     * )
     */
    public function checkoutyearAction(Request $request)
    {
        \Stripe\Stripe::setApiKey("sk_test_LxWhisyWCYEl4geLtOdPTiPd");


        // Get the credit card details submitted by the form

        $token = $_POST['stripeToken'];


        // Create a charge: this will charge the user's card

        try {

            $charge = \Stripe\Charge::create(array(

                "amount" => '8999', // Amount in cents

                "currency" => "eur",

                "source" => $token,

                "description" => "Paiement Frais de port Cloud PC abo 3",


            ));


            $customer = \Stripe\Customer::create(array(


                "description" => "Abonnement Cloud PC Annuel",
                "source" => "tok_mastercard",
                "metadata" => array("order_id" => "aAbo")

            ));


            return $this->redirectToRoute("order_prepare");

        } catch(\Stripe\Error\Card $e) {



            return $this->redirectToRoute("order_prepare");

            // The card has been declined

        }

    }

}
