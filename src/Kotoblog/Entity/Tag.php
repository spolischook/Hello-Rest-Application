<?php

namespace Kotoblog\Entity;

/**
 * Tag
 *
 * @Table(name="tags", indexes={@Index(name="id_index", columns={"id"}), @Index(name="slug_index", columns={"slug"})})
 * @Entity
 */
class Tag
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="title", type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @Column(name="slug", type="string")
     */
    private $slug;

    /**
     * @var integer
     *
     * @Column(name="weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Kotoblog\Entity\Article")
     * @JoinTable(name="tag_article",
     *   joinColumns={
     *     @JoinColumn(name="tag_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="article_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $articles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Tag
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Tag
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Tag
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Add articles
     *
     * @param \Kotoblog\Entity\Article $articles
     * @return Tag
     */
    public function addArticle(\Kotoblog\Entity\Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \Kotoblog\Entity\Article $articles
     */
    public function removeArticle(\Kotoblog\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
