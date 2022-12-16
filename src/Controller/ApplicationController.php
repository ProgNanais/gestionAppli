<?php

namespace App\Controller;

use App\Entity\ApplicationList;
use App\Form\ApplicationType;
use App\Repository\ApplicationListRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/', name: 'home_app')]
    public function index(ApplicationListRepository $repo): Response
    {
        $applications = $repo->findAll();

        return $this->render('application/index.html.twig', [
            'pageName' => 'Accueil',
            'applications' => $applications
        ]);
    }

    #[Route('/view/{id}', name: 'view_app')]

    public function home(ApplicationList $application)
    {

        return $this->render('application/view.html.twig', [
            'pageName' => 'Mon application',
            'application' => $application
        ]);
    }

    #[Route('/formApp/new', name:'form_app_new')]
    #[Route('/formApp/{id}/edit', name:'form_app_edit')]
    public function formApp(ApplicationList $application = null, Request $request, EntityManagerInterface $manager) {

        if (!$application) {
            $application = new ApplicationList();
        }
        
        $form = $this->createForm(ApplicationType::class, $application);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($application);
            $manager->flush();

            return $this->redirectToRoute('view_app', ['id' => $application->getId()]);
        }

        return $this->render('application/formApp.html.twig', [
            'pageName' => 'Formulaire',
            'formApplication' => $form->createView(),
            'editMode' => $application->getId() !== null
        ]);
    }
}
