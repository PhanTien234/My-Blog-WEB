<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private$id;

    /**
     *@ORM\Column(type="string",length=255)
     */

    private$title;
    /**
     *@ORM\Column(type="text")
     */

    private$content;
    /**
     *@ORM\ManyToOne(targetEntity="Category::class", inversedBy="posts")
     */

    private$category;


    /**
     *@ORM\Column(type="datetime")
     */
    private$createdAt;

    public function getId():?int
    {
        return$this->id;
    }

    /**
     *@return mixed
     */
    public function getTitle()
    {
        return$this->title;
    }

    /**
     *@param mixed$title
     */
    public function setTitle($title):void
    {
        $this->title=$title;
    }

    /**
    *@return mixed
    **/
    public function getContent()
    {
        return$this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content =$content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {return $this->createdAt;
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt($createAt): void
    {
        $this->createAt=$createAt;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }
}
