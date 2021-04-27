<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class HomeScreenController extends AbstractController
{
    /**
     * @Route("/home", methods={"POST","GET"})
     */
  public function home(){
     // $resp = new Response( '<h1>Hello World</h1>');
      return $this ->json(['message'=>'How are you']);
  }
}
