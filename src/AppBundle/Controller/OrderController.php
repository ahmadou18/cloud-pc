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
        $mailcus = $_POST['stripeEmail'];

        try {
            //creation du client
            $customer = \Stripe\Customer::create(array(

                "description" => "Abonnement Mensuel Cloud PC",
                "source" => $token,
                "metadata" => array("order_id" => "aAbo"),
                "email" => $mailcus
            ));

            //automatiser l'abonnement
              \Stripe\Subscription::create(array(
                "customer" => $customer,       //lier l'abonnement au client

                  "items" => array(
                    array(
                        "plan" => "mAbo", //choix de l'abonnement
                    ),
                )
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

        // Get the credit card details submitted  the form
        $token = $_POST['stripeToken'];
        $mailcus = $_POST['stripeEmail'];


        try {

            //creer un client

            $customer = \Stripe\Customer::create(array(
                "description" => "Abonnement Cloud PC Trimestriel",
                "source" => $token,
                "metadata" => array("order_id" => "tAbo"),
                "email"=> $mailcus
            ));

            //automatiser l'abonnement
            \Stripe\Subscription::create(array(
               "customer" => $customer, // lier l'abonnement au client
               "items" => array(
                   array(
                       "plan" => "tAbo", //choix de l'abonnement
                   ),
               )
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
        $mailcus = $_POST['stripeEmail'];

        // Create a charge: this will charge the user's card

        try {
            //créer le client
            $customer = \Stripe\Customer::create(array(
                "description" => "Abonnement Cloud PC Annuel",
                "source" => $token,
                "metadata" => array("order_id" => "aAbo"),
                "email" => $mailcus

            ));

            //automatiser l'abonnement
            \Stripe\Subscription::create(array(
                "customer" => $customer, //lier l'abonnement au client
                "items" => array(
                    array(
                        "plan" => "aAbo", //type d'abonnement
                    ),
                )
            ));


            return $this->redirectToRoute("homepage");
        } catch(\Stripe\Error\Card $e) {
            return $this->redirectToRoute("order_prepare");
            // The card has been declined

        }

    }

}
