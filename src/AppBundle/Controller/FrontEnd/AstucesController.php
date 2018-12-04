<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 25/11/2018
 * Time: 12:02
 */

namespace AppBundle\Controller\FrontEnd;


use AppBundle\Entity\Astuce;
use AppBundle\Form\AstuceAddType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichFileType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class AstucesController extends Controller
{
    /**
     * @Route("/ajoutAstuce",name="ajoutastuce")
     *
     */
    public function AjouterClubAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $astuce = new Astuce();

            $form = $this->createFormBuilder($astuce)->add('title', TextType::class,['required'=>true,'label'=>false,'attr'=>['class'=>'form-control','placeholder'=>'title','pattern'=>'[0-9a-zA-Z-\.]{3,20}']] )
            ->add('details', TextType::class ,['required'=>true,'label'=>false,'attr'=>['class'=>'form-control','placeholder'=>'description','pattern'=>'[0-9a-zA-Z-\.\\s]{3,999}']] )
            ->add('videoFile', VichFileType::class, [
                'required' => true
                ,'label'=>false] )
            ->add('Ajouter',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
            $astuce = $form->getData();
                $astuce->setUserId( $this->getUser()->getId());

            $em->persist($astuce);
            $em->flush();
            return $this->redirectToRoute("afficheastuce");

        }
        return $this->render('FrontEnd/Astuce/AjoutAstuce.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/Affiche/Affichepage/{sort}/{query}",name="afficheastuceboth")
     *
     */
    public function AffichepageAction($sort,$query)
    {

        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository("AppBundle:Astuce")->findBy( array(), array('title' => 'ASC'));
        return $this->render('FrontEnd/Astuce/affichage.html.twig',array("c"=>$astuce));
    }
    /**
     * @Route("/Affiche/Affichepage",name="afficheastucewithout")
     *
     */
    public function AffichepageparamlessAction()
    {

        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository("AppBundle:Astuce")->findAll();
        return $this->render('FrontEnd/Astuce/affichage.html.twig',array("c"=>$astuce));
    }
    /**
     * @Route("/Affiche/Affichepage/{sort}",name="afficheastucesort")
     *
     */
    public function AffichepagesortAction($sort)
    {

        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository("AppBundle:Astuce")->findBy( array(), array($sort => 'ASC'));
        return $this->render('FrontEnd/Astuce/affichage.html.twig',array("c"=>$astuce));
    }
    /**
     * @Route("/Affiche/Affichepagesearch/",name="afficheastucequery")
     *
     */
    public function AffichepagesearchAction(Request $request)
    {
     $query=   $request->get('query');
dump($query);
        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository("AppBundle:Astuce")->findBy(  array('title' => $query));
        $astuces2=$em->getRepository("AppBundle:Astuce")->findBy(  array('details' => $query));
        return $this->render('FrontEnd/Astuce/affichage.html.twig',array("c"=>array_unique (array_merge($astuce,$astuces2))));
    }
    /**
     * @Route("/modifierAstuce/{id}",name="modofierastuce")
     *
     */
    public function ModifierAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository(Astuce::class)->find($id);
        $form = $this->createFormBuilder($astuce)->add('title', TextType::class,['required'=>true,'label'=>false,'attr'=>['class'=>'form-control','placeholder'=>'title','pattern'=>'[0-9a-zA-Z-\.]{3,20}']] )
            ->add('details', TextType::class ,['required'=>true,'label'=>false,'attr'=>['class'=>'form-control','placeholder'=>'description','pattern'=>'[0-9a-zA-Z-\.\\s]{3,999}']] )
            ->add('videoFile', VichFileType::class, [
                'required' => true
                ,'label'=>false] )
            ->add('Modifier',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astuce = $form->getData();
            $astuce->setUserId( $this->getUser()->getId());
            $astuce->setId($id);
            $em->merge($astuce);
            $em->flush();
            return $this->redirectToRoute("afficheastuce");

        }
        return $this->render('FrontEnd/Astuce/modifier.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/supprimerAstuce/{id}",name="supprimerastuce")
     *
     */
    public function supprimerEventAction($id){
        $em=$this->getDoctrine()->getManager();
        $astuce=$em->getRepository(Astuce::class)->find($id);
        $em->remove($astuce);
        $em->flush();
        return $this->redirectToRoute("afficheastuce");

    }
    /**
     * @Route("/uploader_upload_astuce",name="_uploader_upload_astuce")
     *
     */
    public function uploadvideo(){


    }
}