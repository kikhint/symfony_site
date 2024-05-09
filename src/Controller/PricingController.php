<?php

namespace App\Controller;

use App\Entity\PricingPlan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PricingController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/pricing', name: 'app_pricing')]
    public function index(): Response
    {
        $pricingPlans = $this->entityManager
            ->getRepository(PricingPlan::class)
            ->findAll();
        return $this->render('pricing/index.html.twig', [
            'pricing_plans' => $pricingPlans,
        ]);
    }
}
