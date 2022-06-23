<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     *@ORM\ManyToOne(targetEntity=Category::class, inversedBy="posts")
     */

    private$category;


    /**
     *@ORM\Column(type="datetime")
     */
    private$createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="post")
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPost($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPost() === $this) {
                $comment->setPost(null);
            }
        }

        return $this;
    }
}
