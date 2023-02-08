<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlatController extends AbstractController
{
    #[Route('/plats', name: 'app_plats', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine, PlatRepository $platRepo): JsonResponse
    {
        $em = $doctrine->getManager();
        $plats = $em->getRepository(Plat::class)->findAll();
        $data = array();
        foreach ($plats as $key => $plat) {
            $data[$key]['id'] = $plat->getId();
            $data[$key]['statut'] = $plat->getStatut();
        }
        return new JsonResponse($data);
    }

    #[Route('/plat/add', name: 'app_plat_new',  methods: ['POST'])]
    public function addPlat(Request $request, ManagerRegistry $doctrine, PlatRepository $platRepo): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $plat = new Plat();

        if (!$request->get('statut') ){
            return $this->json('Please enter the correct fields (statut)');
        }
        
        $plat->setStatut($request->get('statut'));

        $entityManager->persist($plat);
        $entityManager->flush();

        $data = array();

        $data['id'] = $plat->getId();
        $data['statut'] = $plat->getStatut();

        return new JsonResponse($data);
    }

    #[Route('/plat/show/{id}', name: 'app_plat_show',  methods: ['GET'])]
    public function showPlat(ManagerRegistry $doctrine, int $id, PlatRepository $platRepo): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $plat = $doctrine->getRepository(Plat::class)->find($id);

        if (!$plat) {
            return $this->json('No plat found for id '.$id);
        }

        $data = array();

        $data['id'] = $plat->getId();
        $data['statut'] = $plat->getStatut();

        return new JsonResponse($data);
    }

    #[Route('/plat/delete/{id}', name: 'app_plat_delete', methods: ['POST'])]
    public function deletePlat(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $plat = $entityManager->getRepository(Plat::class)->find($id);

        if (!$plat) {
            return $this->json('No plat found for id '.$id);
        }

        $entityManager->remove($plat);
        $entityManager->flush();

        return new JsonResponse('Plat '.$id.' is deleted');
    }
}
