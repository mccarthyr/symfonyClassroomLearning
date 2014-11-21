<?php

namespace RMC\SymfonyClassroomBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use RMC\SymfonyClassroomBundle\Form\Type\BikeType;
use RMC\SymfonyClassroomBundle\RMCSymfonyClassroomBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RMC\SymfonyClassroomBundle\Entity\Bike;
use Symfony\Component\HttpFoundation\Request;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\View\RouteRedirectView,
    FOS\RestBundle\View\View as FOSView,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Request\ParamFetcherInterface,
    FOS\RestBundle\Controller\Annotations\Route,
    FOS\RestBundle\Controller\Annotations\Prefix;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;


use FOS\RestBundle\View\RedirectView;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\RequestParam;



class BikeController extends FOSRestController
{

    /**
     * @param $id
     *
     * @Route("/bikes/{id}")
     *
     * @return FOSView
     */
    public function getBikeAction($id)
    {
        $bike = $this -> getDoctrine()->getRepository('RMCSymfonyClassroomBundle:Bike') -> find($id);
        if ( is_null($bike) ) {
            throw new ResourceNotFoundException('No such bike exists');
        }
        $view = $this -> view($bike, 200);
        return $this->handleView($view);
    }



    /**
     * Creates a new bike entry
     *
     * @param ParamFetcher $paramFetcher ParamFetcher
     *
     * @RequestParam(name="name", requirements="[a-z]+", default="", description="Bike Name")
     * @RequestParam(name="price", requirements="\d+", default="", description="Bike Price")
     * @RequestParam(name="description", requirements="[a-z]+", default="", description="Bike detail")
     *
     * @return FOSView
     */
    public function postBikeAction(ParamFetcher $paramFetcher)
    {
        $bike = new Bike();

        $form = $this -> createForm('createBike', $bike);
        $form -> submit( $paramFetcher->all() );

        if ( $form -> isValid() ) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em -> persist($bike);
                $em -> flush();
            } catch( \Exception $e ) {
                /*
                 * To avoid an exception being thrown from a failed insert which would provide
                 * details of the database in the message. A more detailed message could be logged
                 * internally here as if this is executed it means the validation that is applied
                 * through submitting the data through the $form has failed.
                 */
                throw new HttpException(400, 'The resource could not be created');
            }

            $array = array('code' => 201, 'message' => 'The bike has been successfully created',
                            'bike' => array( $bike ));

            $view = $this -> view($array, 201);
            return $this->handleView($view);
        } else {
            throw new HttpException(400, 'The resource could not be created');
        }
    }
    /*
    GET    - /api/v1/bikes/1
    POST   - /api/v1/bikes
    PUT    - /api/v1/bikes/2
    DELETE - /api/v1/bikes/3
    */

    /**
     * Update an existing bike entry
     *
     * @param Request $request Current request
     *
     * @param string  $id      Id of the bike
     *
     * @return FOSView
     */
    public function putBikeAction(Request $request, $id)
    {
        /*
         * NOTE:   FOR PUT TO WORK THE CLIENT REQUEST MUST SEND THE CONTENT TYPE IN
         * " Content-Type: application/x-www-form-urlencoded " FORMAT
         */

        $bike = $this -> getDoctrine()->getRepository('RMCSymfonyClassroomBundle:Bike') -> find($id);
        if ( is_null($bike) ) {
            throw new ResourceNotFoundException('No such bike exists');
        }

        $form = $this -> createForm('createBike', $bike);

        $requestParameterBagIterator = $request->request->getIterator();
        $parameterArrayOfUpdates = iterator_to_array($requestParameterBagIterator);
        $form -> submit($parameterArrayOfUpdates);

        if ($form -> isValid()) {
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($form -> getData() );
            $em -> flush();
        }

        $array = array('code' => 200);

        $view = $this -> view($array);
        return $this->handleView($view);
    }

    /**
     * Delete an existing bike entry
     *
     *
     */


    /*
    This is the output format in JSON
    {
    "code": 201,
    "message": "The bike has been successfully created",
    "bike": [
    {
        "name": "richardx",
    "price": 111,
    "description": "testd"
    }
    ]
    }
    */



    /**
     * NOTE: THIS WAS A REST ACTION BUT WAS USING A FORM STILL AND RETURNING A FORM OR JSON
     *
     * @param Request $request
     *
     * @Route(requirements={"_format"="html"})
     *
    public function postBikeAction(Request $request)
    {
        $bike = new Bike();

        // 'createBike' is the tag alias name for this service
        $form = $this -> createForm('createBike', $bike);
        $form -> handleRequest($request);

        if ($form -> isValid()) {
            // Perform some action, such as saving to the database

            // To access field data in the form: $form->get('name')->getData();
            // To access the underlying object with the data: $form -> getData();
            $em = $this -> getDoctrine() -> getManager();
            //$em -> persist($bike);
            //$em -> flush();


            $view = FOSView::create();
            $view -> setStatusCode(200);
            $view -> setData('The POST was a success');
            $view -> setFormat('json');

            return $this->handleView($view);

        }

        return $this -> render('RMCSymfonyClassroomBundle:Bike:create.html.twig', array(
                'form' => $form -> createView(),
            ));
    }
    */



    /**
     * @param Request $request
     *
     * @Route("/bikeShop/bike/create")
     *
     * Here the Form Class(Bike) is called as a service
     *
    public function createBikeAction(Request $request)
    {
        $bike = new Bike();
        // 'createBike' is the tag alias name for this service
        $form = $this -> createForm('createBike', $bike);

        $form -> handleRequest($request);
        if ($form -> isValid()) {
            // Perform some action, such as saving to the database

            // To access field data in the form: $form->get('name')->getData();
            // To access the underlying object with the data: $form -> getData();

            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($bike);
            $em -> flush();

            // NOTE: *** TEMPORARY URL UNTIL BUILD A PAGE FOR IT TO GO TO ***
            return $this -> redirect( $this -> generateUrl('_demo') );
        }

        return $this -> render('RMCSymfonyClassroomBundle:Bike:create.html.twig', array(
                'form' => $form -> createView(),
            ));
    }*/




    /**
     * @param Request $request
     *
     * @Route("/bikeShop/bike/create")
     *
     * Here the Form Class(Bike) is called as a service

    public function createBikeAction(Request $request)
    {
        $bike = new Bike();
        // 'createBike' is the tag alias name for this service
        $form = $this -> createForm('createBike', $bike);

        $form -> handleRequest($request);
        if ($form -> isValid()) {
            // Perform some action, such as saving to the database

            // To access field data in the form: $form->get('name')->getData();
            // To access the underlying object with the data: $form -> getData();

            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($bike);
            $em -> flush();

            // NOTE: *** TEMPORARY URL UNTIL BUILD A PAGE FOR IT TO GO TO ***
            return $this -> redirect( $this -> generateUrl('_demo') );
        }

        return $this -> render('RMCSymfonyClassroomBundle:Bike:create.html.twig', array(
                'form' => $form -> createView(),
            ));
    }
*/


    /* This version shows the call to the Form Type class
    public function createBikeAction(Request $request)
    {
        $bike = new Bike();
        $form = $this -> createForm(new BikeType(), $bike);

        $form -> handleRequest($request);
        if ($form -> isValid()) {
            // Perform some action, such as saving to the database

            // To access field data in the form: $form->get('name')->getData();

            // NOTE: *** TEMPORARY URL UNTIL BUILD A PAGE FOR IT TO GO TO ***
            return $this -> redirect( $this -> generateUrl('_demo') );
        }

        return $this -> render('RMCSymfonyClassroomBundle:Bike:create.html.twig', array(
                'form' => $form -> createView(),
            ));
    }
    */


    /* This was replaced with a version that uses a Form Class instead
    public function createBikeAction(Request $request)
    {
        // Create a new bike and give it some dummy data for now
        $bike = new Bike();

        $form = $this -> createFormBuilder($bike)
            -> add('name', 'text')
            -> add('price', 'number')
            -> add('description', 'text')
            -> add('save', 'submit', array('label' => 'Create Bike'))
            -> getForm();

        $form -> handleRequest($request);

        if ($form -> isValid()) {
            // Perform some action, such as saving to the database

            return $this -> redirect( $this -> generateUrl('_demo') );
        }

        return $this -> render('RMCSymfonyClassroomBundle:Bike:create.html.twig', array(
                'form' => $form -> createView(),
            ));
    }
    */



    /* This was the first basic version of the Bike Create Form

        public function createBikeAction(Request $request)
        {
            // Create a new bike and give it some dummy data for now
            $bike = new Bike();
            $bike -> setName('Prestigio');
            $bike -> setPrice(2000.00);
            $bike -> setDescription('Custom designed carbon racing bike');

            $form = $this -> createFormBuilder($bike)
                -> add('name', 'text')
                -> add('price', 'number')
                -> add('description', 'text')
                -> add('save', 'submit', array('label' => 'Create Bike'))
                -> getForm();

            return $this -> render('RMCSymfonyClassroomBundle:Bike:create.html.twig', array(
                    'form' => $form -> createView(),
                ));

        }
    */


}
