<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * Astuce
 *
 * @ORM\Table(name="astuce")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Astuce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", length=65535, nullable=false)
     */
    private $details;



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param string $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="astuce_videos", fileNameProperty="video", size="videoSize")
     *
     * @var File
     */
    private $videoFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $video;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var integer
     */
    private $videoSize;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setVideoFile( $image = null)
    {
        $this->videoFile = $image;

        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime();
        }
    }

    public function getVideoFile()
    {
        return $this->videoFile;
    }

    public function setVideo( $imageName)
    {
        $this->video = $imageName;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideoSize( $imageSize)
    {
        $this->videoSize = $imageSize;
    }

    public function getVideoSize()
    {
        return $this->videoSize;
    }
    public function __toString()
    {
        return $this->id . ' ';
    }
}




