<?php

namespace SF\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
    
     public function viewAction($id)
    {
        return $this->render('SFPlatformBundle:Advert:view.html.twig', array(
               'id'  => $id,
          ));
    }
        
    public function indexAction($page)
    {
            if ($page < 1) {
                throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
           }

          return $this->render('OCPlatformBundle:Advert:index.html.twig');
    }
    
    public function addAction (Request $request) {
          $session = $request->getSession();
          $session->getFlashBag()->add('info', 'Annonce bien enregistrée');
     
          return $this->redirectToRoute('sf_platform_view', array('id' => 5));
    }
    
    public function editAction($id, Request $request)
   {

      if ($request->isMethod('POST')) {
       $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

      return $this->redirectToRoute('sf_platform_view', array('id' => 5));
     }

    return $this->render('SFPlatformBundle:Advert:edit.html.twig');
  }

  public function deleteAction($id)
  {
    return $this->render('SFPlatformBundle:Advert:delete.html.twig');
  }
}