<?php

namespace App\Controller;

use App\Entity\VictoriousElephant;
use App\Form\VictoriousElephantType;
use App\Repository\VictoriousElephantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/victorious/elephant")
 */
class VictoriousElephantController extends AbstractController
{
    /**
     * @Route("/", name="victorious_elephant_index", methods={"GET"})
     */
    public function index(VictoriousElephantRepository $victoriousElephantRepository): Response
    {
        return $this->render('victorious_elephant/index.html.twig', [
            'victorious_elephants' => $victoriousElephantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="victorious_elephant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $victoriousElephant = new VictoriousElephant();
        $form = $this->createForm(VictoriousElephantType::class, $victoriousElephant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($victoriousElephant);
            $entityManager->flush();

            return $this->redirectToRoute('victorious_elephant_index');
        }

        return $this->render('victorious_elephant/new.html.twig', [
            'victorious_elephant' => $victoriousElephant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="victorious_elephant_show", methods={"GET"})
     */
    public function show(VictoriousElephant $victoriousElephant): Response
    {
        return $this->render('victorious_elephant/show.html.twig', [
            'victorious_elephant' => $victoriousElephant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="victorious_elephant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VictoriousElephant $victoriousElephant): Response
    {
        $form = $this->createForm(VictoriousElephantType::class, $victoriousElephant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('victorious_elephant_index', [
                'id' => $victoriousElephant->getId(),
            ]);
        }

        return $this->render('victorious_elephant/edit.html.twig', [
            'victorious_elephant' => $victoriousElephant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="victorious_elephant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, VictoriousElephant $victoriousElephant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$victoriousElephant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($victoriousElephant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('victorious_elephant_index');
    }
}
