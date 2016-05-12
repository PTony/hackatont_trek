<?php

namespace HistoriqueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HistoriqueBundle\Entity\Historique;
use HistoriqueBundle\Form\HistoriqueType;

/**
 * Historique controller.
 *
 */
class HistoriqueController extends Controller
{
    /**
     * Lists all Historique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historiques = $em->getRepository('HistoriqueBundle:Historique')->findAll();

        return $this->render('historique/index.html.twig', array(
            'historiques' => $historiques,
        ));
    }

    /**
     * Creates a new Historique entity.
     *
     */
    public function newAction(Request $request)
    {
        $historique = new Historique();
        $form = $this->createForm('HistoriqueBundle\Form\HistoriqueType', $historique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historique);
            $em->flush();

            return $this->redirectToRoute('historique_show', array('id' => $historique->getId()));
        }

        return $this->render('historique/new.html.twig', array(
            'historique' => $historique,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Historique entity.
     *
     */
    public function showAction(Historique $historique)
    {
        $deleteForm = $this->createDeleteForm($historique);

        return $this->render('historique/show.html.twig', array(
            'historique' => $historique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Historique entity.
     *
     */
    public function editAction(Request $request, Historique $historique)
    {
        $deleteForm = $this->createDeleteForm($historique);
        $editForm = $this->createForm('HistoriqueBundle\Form\HistoriqueType', $historique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historique);
            $em->flush();

            return $this->redirectToRoute('historique_edit', array('id' => $historique->getId()));
        }

        return $this->render('historique/edit.html.twig', array(
            'historique' => $historique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Historique entity.
     *
     */
    public function deleteAction(Request $request, Historique $historique)
    {
        $form = $this->createDeleteForm($historique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($historique);
            $em->flush();
        }

        return $this->redirectToRoute('historique_index');
    }

    /**
     * Creates a form to delete a Historique entity.
     *
     * @param Historique $historique The Historique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Historique $historique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historique_delete', array('id' => $historique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
