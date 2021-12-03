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

    /**
     * Action pour proposer un formulaire de recherche de sauveteur
     *
     * @param Request $request
     * @return Response
     */
    #[Route('/sauveteur', name: 'sauveteur')]
    public function sauveteur(Request $request): Response
    {
        $formSearch = $this->createFormBuilder()
            ->setMethod('post')
            ->setAction($this->generateUrl('sauveteur'))
            ->add('name', TextType::class, [
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

        $formSearch->handleRequest($request);

        // Si le formulaire est posté et OK (valide), on redirige
        if ($formSearch->isSubmitted() && $formSearch->isValid()) {
            return $this->redirectToRoute('sauveteur_recherche', ['name' => $formSearch->getData()['name']]);
        }

        return $this->render('sauveteur/index.html.twig', [
            'controller_name' => 'SauveteurController',
            'form' => $formSearch->createView()
        ]);
    }

    /**
     * Action pour lister les résultats et rafficher le formulaire de recherche
     *
     * @param Request $request
     * @param SauveteurRepository $repo
     * @return Response
     */
    #[Route('/sauveteur/rechercher/{name}', name: 'sauveteur_recherche', requirements: ['name' => '.+'], defaults: ['name' => ''])]
    public function sauveteurRecherche(Request $request, SauveteurRepository $repo, string $name = ''): Response
    {
        $formSearch = $this->createFormBuilder()
            ->setMethod('post')
            ->setAction($this->generateUrl('sauveteur'))
            ->add('name', TextType::class, [
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

        // Si le formulaire est posté et OK (valide), on redirige
        if ($formSearch->isSubmitted() && $formSearch->isValid()) {
            return $this->redirectToRoute('sauveteur_recherche', ['name' => $formSearch->getData()['name']]);
        }

        if($name !== '') {
            $sauveteurs = $repo->findSauveteurByName($name);
        }else{
            $sauveteurs = [];
        }

        return $this->render('sauveteur/sauveteur-recherche.html.twig', [
            'form' => $formSearch->createView(),
            'sauveteurs' => $sauveteurs,
            'name' => $name,
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
