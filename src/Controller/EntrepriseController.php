<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 #[Route('/pfe')]
class EntrepriseController extends AbstractController
{
    #[Route('/view/{name?"google"}', name: 'app_entreprise')]
    public function index($name,ManagerRegistry $doctorine): Response
    {
        $entreprise=$doctorine->getRepository(PFE::class)->findBy(['Entreprise'=>$name]);
        return $this->render('entreprise/index.html.twig', [
            'entre' => $entreprise,
        ]);
    }
}
