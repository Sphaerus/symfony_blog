<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

use Acme\StoreBundle\Form\ProductType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
		
		public function createAction(Request $request)
		{	
		    $product = new Product();
				$form = $this->createForm(new ProductType(), $product);
				$em = $this->getDoctrine()->getManager();

		    #return new Response('Created product id '.$product->getId());
				#return $this->redirect($this->generateUrl('AcmeStoreBundle_show', $product->));
        #return $this->render('AcmeStoreBundle:Default:show.html.twig', array(
        #    'product' => $product,
        #));
				
				
				$request =  $this->getRequest();
				
				if($request->getMethod() == 'POST'){
					$form->bind($this->getRequest());/*or  $form->handleRequest($request); depends on symfony version */
				  if ($form->isValid()) {
				  	$em->persist($product);
				    $em->flush();
				    return $this->redirect("/show/{$product->getId()}");
				  }
				}
		}
		
		public function showAction($id)
		{
		    $product = $this->getDoctrine()
		        ->getRepository('AcmeStoreBundle:Product')
		        ->find($id);

		    if (!$product) {
		        throw $this->createNotFoundException(
		            'No product found for id '.$id
		        );
		    }
        return $this->render('AcmeStoreBundle:Default:show.html.twig', array(
            'product' => $product,
        ));
		    // ... do something, like pass the $product object into a template
		}
		
		public function newAction()
		{	
			$product = new Product();
			$form = $this->createForm(new ProductType(), $product);
			
			
					return $this->render('AcmeStoreBundle:Default:new.html.twig', array(
					        'form' => $form->createView()
					    ));
		}	
}
