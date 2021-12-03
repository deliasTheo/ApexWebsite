<?php

namespace App\Controller;


use App\Repository\SauveteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/sauveteur', name: 'sauveteur')]
    public function sauveteur(Request $request, SauveteurRepository $repo): Response
    {

        $formSearch = $this->createFormBuilder()
            ->setAction($this->generateUrl('sauveteur'))
            ->add('Sauveteur', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '🔍 Rechercher sauveteur'
                ]
            ])
            ->add('rechercher', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();

        $query = $request->request->get('formSearch')['query'];
        if($query) {
            $section = $repo->findSauveteurByName($query);
        }

        return $this->render('sauveteur/index.html.twig', [
            'controller_name' => 'SauveteurController',
            'form' => $formSearch->createView(),
            'articles' => $section
        ]);
    }

    #[Route('/bateau', name: 'bateau')]
    public function bateau(): Response
    {
        return $this->render('bateau/index.html.twig', [
            'controller_name' => 'BateauController',
        ]);
    }

    #[Route('/sauver', name: 'sauver')]
    public function sauver(): Response
    {
        return $this->render('sauver/index.html.twig', [
            'controller_name' => 'SauverController',
        ]);
    }
}
