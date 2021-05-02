<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeScreenController extends AbstractController
{

    /**
     * @Route("/recipies",methods={"GET"}, name="get_all_recipies" )
     */
    public function recipies(Request $request): Response
    {
        $rootPath = $this->getParameter('kernel.project_dir');
        $res = file_get_contents($rootPath . '/resources/recipes.json');
        $resjson = json_decode($res, true);
        return $this->json($resjson);
    }

    /**
     * @Route("/recipies/{recipieId}",methods={"GET"}, name="get_recipies_by_id" )
     */
    public function recipieById(Request $request, $recipieId, LoggerInterface $logger): Response
    {
        $rootPath = $this->getParameter('kernel.project_dir');
        $res = file_get_contents($rootPath . '/resources/recipes.json');
        $resjson = json_decode($res, true);
        $response = '';
        foreach ($resjson['recipes'] as $key => $jsons) { // This will search in the 2 jsons
            $logger->info($key);
            if ($jsons['id'] == $recipieId) {
                $response = $jsons;
                break;
            }
        }
        return $this->json($response);
    }


}
