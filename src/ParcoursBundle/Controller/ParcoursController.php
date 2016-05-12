<?php

namespace ParcoursBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ParcoursBundle\Entity\Parcours;
use ParcoursBundle\Form\ParcoursType;

/**
 * Parcours controller.
 *
 */
class ParcoursController extends Controller
{
    /**
     * Lists all Parcours entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parcours = $em->getRepository('ParcoursBundle:Parcours')->findAll();

        return $this->render('parcours/index.html.twig', array(
            'parcours' => $parcours,
        ));
    }

    /**
     * Creates a new Parcours entity.
     *
     */
    public function newAction(Request $request)
    {
        $parcour = new Parcours();
        $form = $this->createForm('ParcoursBundle\Form\ParcoursType', $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcour);
            $em->flush();

            return $this->redirectToRoute('parcours_show', array('id' => $parcour->getId()));
        }

        return $this->render('parcours/new.html.twig', array(
            'parcour' => $parcour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Parcours entity.
     *
     */
    public function showAction(Parcours $parcour)
    {
        $deleteForm = $this->createDeleteForm($parcour);

        return $this->render('parcours/show.html.twig', array(
            'parcour' => $parcour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Parcours entity.
     *
     */
    public function editAction(Request $request, Parcours $parcour)
    {
        $deleteForm = $this->createDeleteForm($parcour);
        $editForm = $this->createForm('ParcoursBundle\Form\ParcoursType', $parcour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcour);
            $em->flush();

            return $this->redirectToRoute('parcours_edit', array('id' => $parcour->getId()));
        }

        return $this->render('parcours/edit.html.twig', array(
            'parcour' => $parcour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Parcours entity.
     *
     */
    public function deleteAction(Request $request, Parcours $parcour)
    {
        $form = $this->createDeleteForm($parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parcour);
            $em->flush();
        }

        return $this->redirectToRoute('parcours_index');
    }

    /**
     * Creates a form to delete a Parcours entity.
     *
     * @param Parcours $parcour The Parcours entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parcours $parcour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parcours_delete', array('id' => $parcour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
