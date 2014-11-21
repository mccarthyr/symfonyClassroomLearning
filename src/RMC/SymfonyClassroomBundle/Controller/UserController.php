<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 07/11/14
 * Time: 20:48
 */

namespace RMC\SymfonyClassroomBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\View\RouteRedirectView,
    FOS\RestBundle\View\View,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Request\ParamFetcherInterface,
    FOS\RestBundle\Controller\Annotations\Route,
    FOS\RestBundle\Controller\Annotations\Prefix;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;


/**
 * Class UserController
 * @package RMC\SymfonyClassroomBundle\Controller
 *
 * @Prefix("/api")
 */
class UserController extends FOSRestController
{


    /**
     * @param $id
     * @return mixed
     *
     * @Route("/user/{id}")
     *
     * Route name generated will be: "get_user"
     * URL for the [GET] action will be:  /user/{id}
     */
    public function getUserAction( $id )
    {
        $userManager = $this -> container -> get('fos_user.user_manager');
        $data = $userManager -> findUserBy(array('id' => $id));
        if ( is_null($data) ) {
            throw new ResourceNotFoundException('No such user exists');
        }
        $view = $this -> view($data, 200);
        return $this->handleView($view);
    }


}


// Sample code from the FOSUserBundle
// The user manager is available in the container as the fos_user.user_manager service.
// $userManager = $container->get('fos_user.user_manager');



/* CODE SAMPLE FOR FETCHING STUFF USING DOCTRINE FROM THE DATABASE...
$product = $this->getDoctrine()
        ->getRepository('AcmeStoreBundle:Product')
        ->find($id);




*/


/*
 * @Route("", condition="context.getMethod() in ['GET', 'HEAD'] and request.headers.get('User-Agent') matches '/firefox/i'")

SYMFONY REGULAR ANNOTATION TYPE ROUTE...
* @Route("/{id}")
public function showAction($id)

==========================================
 * @QueryParam(name="page", requirements="\d+", default="1", description="Page of the overview.")

@QueryParam(name="page", requirements="\d+", default="1", description="Page of the overview.")
     * @ApiDoc()

    public function getArticlesAction(ParamFetcherInterface $paramFetcher)
{
    $page = $paramFetcher->get('page');
    $articles = array('bim', 'bam', 'bingo');
    $data = new HelloResponse($articles, $page);
    $view = new View($data);
    $view->setTemplate('LiipHelloBundle:Rest:getArticles.html.twig');
    return $this->get('fos_rest.view_handler')->handle($view);
}


 public function getUserAction($slug)
{} // "get_user"      [GET] /users/{slug}
*/
