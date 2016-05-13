<?php

namespace ParcoursBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ParcoursBundle\Entity\Parcours;
use ParcoursBundle\Form\ParcoursType;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Vendor\autoload;

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
    // public function indexAction()
    // {
    //     $em = $this->getDoctrine()->getManager();

    //     $parcours = $em->getRepository('ParcoursBundle:Parcours')->findAll();

    //     return $this->render('ParcoursBundle:parcours:index.html.twig', array(
    //         'parcours' => $parcours,
    //     ));
    // }
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parcours = $em->getRepository('ParcoursBundle:Parcours')->findAll();

        // Language of data (try your own language here!):
        $lang = 'fr';

        // Units (can be 'metric' or 'imperial' [default]):
        $units = 'metric';

        // Create OpenWeatherMap object.
        // Don't use caching (take a look into Examples/Cache.php to see how it works).
        $owm = new OpenWeatherMap('0df17ea554ebe14617d1fd046e544a81');

        try {
            $weather = $owm->getWeather('Chartres', $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
        //$weather->city->lat=3;
        //var_dump($weather);
        // echo $weather->temperature;

        return $this->render('ParcoursBundle:parcours:index.html.twig', array(
            'parcours' => $parcours,
            'weather' => $weather,




        //return $this->render('CircuitBundle:circuit:index.html.twig', array(
           // 'circuits' => $circuits,
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

        return $this->render('ParcoursBundle:parcours:new.html.twig', array(
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

        return $this->render('ParcoursBundle:parcours:show.html.twig', array(
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

        return $this->render('ParcoursBundle:parcours:edit.html.twig', array(
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
