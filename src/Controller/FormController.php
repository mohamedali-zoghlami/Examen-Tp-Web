<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PFE;
#[Route('/pfe')]
class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function stx(ManagerRegistry $doctorine): Response
    {   $entityManage=$doctorine->getManager();
        $pfe=new PFE();
        $form=$this->createForm(PFE::class,$pfe);
        if($form->isSubmitted())
        {   $entityManage->persist($pfe);
            $entityManage->flush();
            return $this->redirectToRoute("app_entreprise");
        }
        return $this->render('form/form.html.twig',[
            'form'=>$form->createView()
        ]);}

}
