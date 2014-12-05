<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 03/12/14
 * Time: 21:06
 */

namespace RMC\SymfonyClassroomBundle\Controller;

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

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
* Class BikeSaleController
 * @package RMC\SymfonyClassroomBundle\Controller
 */
class BikeSaleController extends FOSRestController
{

    // Example URL
    // http://symfonyclassroom/app_dev.php/api/v1/sale/bikes/type/prestigio

    /**
     * @param $type
     *
     * @Route("/bikes/type/{type}")
     *
     * @return FOSView
     */
    public function getBikeTypeAction($type)
    {
        // Call the Bike Sale Manager
        $bikeSaleManager = $this -> get('rmc_symfonyclassroom.bike_sale_manager');

        // This will return an array of bikes or an empty array if none exit
        $bike = $bikeSaleManager -> findBikeByType($type);
        if (empty($bike)) {
            throw new ResourceNotFoundException('No such bike exists');
        }

        $view = $this -> view($bike, 200);
        return $this -> handleView($view);
    }


}

