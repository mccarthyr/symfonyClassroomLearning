<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 1/20/15
 * Time: 12:15 PM
 */

namespace SoftwareDesk\BikeTraderAPIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\View\RouteRedirectView,
    FOS\RestBundle\View\RedirectView,
    FOS\RestBundle\View\View as FOSView;

use FOS\RestBundle\Request\ParamFetcher,
    FOS\RestBundle\Request\ParamFetcherInterface;

use FOS\RestBundle\Controller\Annotations\Route,
    FOS\RestBundle\Controller\Annotations\Prefix,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Controller\Annotations\RequestParam,
    FOS\RestBundle\Controller\Annotations\View;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException,
    Symfony\Component\HttpKernel\Exception\HttpException,
    Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class BikeTraderController
 * @package SoftwareDesk\BikeTraderAPIBundle\Controller
 */
class BikeTraderController extends FOSRestController
{
    // Example URL
    // http://symfonyclassroom/app_dev.php/api/v1/bike/type/prestigio

    /**
     * @param $type
     *
     * @Route("/bike/type/{type}")
     *
     * @return FOSView
     */
    public function getBikeTypeAction($type)
    {
        // Call the Bike Trader Manager (a service)
        $bikeTraderManager = $this -> get('software_desk_bike_trader_api.bike_trader_manager');

        $bike = $bikeTraderManager -> retrieveBike( array('type', $type) );

        if (empty($bike)) {
            throw new ResourceNotFoundException('No such bike exists');
        }

        $view = $this -> view($bike, 200);
        return $this -> handleView($view);
    }
}