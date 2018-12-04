<?php
/**
 * Created by PhpStorm.
 * User: siwar
 * Date: 11/24/2018
 * Time: 6:37 PM
 */

namespace AppBundle\Controller\FrontEnd;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/TunisiaCharityLand",name="home")
     *
     */
    public function HomepageAction()
    {

        return $this->render('FrontEnd/layout.html.twig');
    }

    /**
     * @Route("/annonce",name="annonce")
     *
     */
    public function AnnoncepageAction()
    {

        return $this->render('FrontEnd/Annonce/annonce.html.twig');
    }

    /**
     * @Route("/action",name="action")
     *
     */
    public function actionpageAction()
    {

        return $this->render('FrontEnd/ActionBeneficiare/action.html.twig');
    }

    /**
     * @Route("/astuce",name="astuce")
     *
     */
    public function AstuceageAction()
    {

        return $this->render('FrontEnd/Astuce/astuce.html.twig');
    }

    /**
     * @Route("/beneficiaire",name="beneficiaire")
     *
     */
    public function beneficiairepageAction()
    {

        return $this->render('FrontEnd/Beneficiaire/beneficiaire.html.twig');
    }

    /**
     * @Route("/blog",name="blog")
     *
     */
    public function BlogpageAction()
    {

        return $this->render('FrontEnd/Blog/blog.html.twig');
    }

    /**
     * @Route("/commentEvent",name="commentevent")
     *
     */
    public function CommentEventpageAction()
    {

        return $this->render('FrontEnd/CommentaireEvent/commentaireEvent.html.twig');
    }

    /**
     * @Route("/dons",name="dons")
     *
     */
    public function donspageAction()
    {

        return $this->render('FrontEnd/Dons/dons.html.twig');
    }

    /**
     * @Route("/enchaire",name="enchaire")
     *
     */
    public function EnchairepageAction()
    {

        return $this->render('FrontEnd/Enchaire/enchaire.html.twig');
    }

    /**
     * @Route("/event",name="event")
     *
     */
    public function EventpageAction()
    {

        return $this->render('FrontEnd/Event/event.html.twig');
    }

    /**
     * @Route("/publicite",name="publicite")
     *
     */
    public function PublicitepageAction()
    {

        return $this->render('FrontEnd/Publicite/publicite.html.twig');
    }
}