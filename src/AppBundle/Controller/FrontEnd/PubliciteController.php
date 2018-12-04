<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 25/11/2018
 * Time: 12:02
 */

namespace AppBundle\Controller\FrontEnd;


use AppBundle\Entity\Publicite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * @Route("/Publicite")
 *
 */
class PubliciteController extends Controller
{
    /**
     * @Route("/ajoutPublicite",name="ajoutpub")
     *
     */
    public function AjouterClubAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $publicite = new Publicite();
        $form = $this->createFormBuilder($publicite)->add('title', TextType::class,['required'=>true,'label'=>false,'attr'=>['class'=>'form-control','placeholder'=>'title','pattern'=>'[0-9a-zA-Z-\.]{3,20}']] )
            ->add('description', TextType::class ,['required'=>true,'label'=>false,'attr'=>['class'=>'form-control','placeholder'=>'description','pattern'=>'[0-9a-zA-Z-\.\\s]{3,999}']] )
            ->add('imageFile', VichImageType::class, [
                'required' => true
                ,'label'=>false] )
            ->add('Ajouter',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $publicite     = $form->getData();
            $publicite->setUserId( $this->getUser()->getId());

            $em->persist($publicite);
            $em->flush();
            return $this->redirectToRoute("affiche");

        }
        return $this->render('FrontEnd/Publicite/ajout-publicite.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/Affiche/Affichepage/{sort}/{query}",name="affichequeruoed")
     *
     */
    public function AffichepageAction($sort,$query)
    {

        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository(Publicite::class)->findBy( array(), array('title' => 'ASC'));
        return $this->render('FrontEnd/Publicite/affichage.html.twig',array("c"=>$astuce));
    }
    /**
     * @Route("/Affiche/Affichepage",name="affiche")
     *
     */
    public function AffichepageparamlessAction()
    {

        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository(Publicite::class)->findAll();
        return $this->render('FrontEnd/Publicite/affichage.html.twig',array("c"=>$astuce));
    }
    /**
     * @Route("/Affiche/Affichepage/{sort}",name="affichepubsort")
     *
     */
    public function AffichepagesortAction($sort)
    {

        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository(Publicite::class)->findBy( array(), array($sort => 'ASC'));
        return $this->render('FrontEnd/Publicite/affichage.html.twig',array("c"=>$astuce));
    }
    /**
     * @Route("/Affiche/Affichepagesearch/",name="affichepubquery")
     *
     */
    public function AffichepagesearchAction(Request $request)
    {
        $query=   $request->get('query');
        dump($query);
        $em=$this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce=$em->getRepository(Publicite::class)->findBy(  array('title' => $query));
        $astuces2=$em->getRepository(Publicite::class)->findBy(  array('description' => $query));
        return $this->render('FrontEnd/Publicite/affichage.html.twig',array("c"=>array_unique (array_merge($astuce,$astuces2))));
    }
    /**
     * @Route("/modifierPublicite/{id}",name="modofierpub")
     *
     */
    public function ModifierAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager(); //pour la récupération et la manipulation des données
        $astuce = $em->getRepository(Publicite::class)->find($id);
        $form = $this->createFormBuilder($astuce)->add('title', TextType::class, ['required' => true, 'label' => false, 'attr' => ['class' => 'form-control', 'placeholder' => 'title', 'pattern' => '[0-9a-zA-Z-\.]{3,20}']])
            ->add('description', TextType::class, ['required' => true, 'label' => false, 'attr' => ['class' => 'form-control', 'placeholder' => 'description', 'pattern' => '[0-9a-zA-Z-\.\\s   ]{3,999}']])
            ->add('imageFile', VichImageType::class, [
                'required' => true
                , 'label' => false])
            ->add('Modifier', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astuce = $form->getData();
            $astuce->setUserId($this->getUser()->getId());
            $astuce->setId($id);
            $em->merge($astuce);
            $em->flush();
            return $this->redirectToRoute("affiche");

        }
        return $this->render('FrontEnd/Publicite/modifier.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/supprimerAstuce/{id}",name="supprimerpub")
     *
     */
    public function supprimerEventAction($id){
        $em=$this->getDoctrine()->getManager();
        $astuce=$em->getRepository(Publicite::class)->find($id);
        $em->remove($astuce);
        $em->flush();
        return $this->redirectToRoute("affiche");

    }
}