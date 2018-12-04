<?php
/**
 * Created by PhpStorm.
 * User: ladou
 * Date: 04/12/2018
 * Time: 16:42
 */

namespace AppBundle;


use Doctrine\Common\Persistence\ObjectManager;
use Oneup\UploaderBundle\Event\PostPersistEvent;

class UploadListener
{
    /**
     * @var ObjectManager
     */
    private $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function onUpload(PostPersistEvent $event)
    {
        //...
        throw new \Exception();
        //if everything went fine
        $response = $event->getResponse();
        $response['success'] = true;
        return $response;
    }
}