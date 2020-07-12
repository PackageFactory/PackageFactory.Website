<?php declare(strict_types=1);
namespace PackageFactory\Website\Domain\WebPage;

use PackageFactory\Website\Domain\Organization\Organization;
use PackageFactory\Website\Domain\WebSite\WebSite;

final class WebPage
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $name;    

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTimeInterface
     */
    private $dateCreated;

    /**
     * @var \DateTimeInterface
     */
    private $datePublished;

    /**
     * @var \DateTimeInterface
     */
    private $dateModified;

    /**
     * @var Organization
     */
    private $author;

    /**
     * @var WebSite
     */
    private $isPartOf;

    /**
     * @param string $url
     * @param string $name
     * @param string $description
     * @param \DateTimeInterface $dateCreated
     * @param \DateTimeInterface $datePublished
     * @param \DateTimeInterface $dateModified
     * @param Organization $author
     * @param WebSite $isPartOf
     */
    private function __construct(
        string $url,
        string $name,
        string $description,
        \DateTimeInterface $dateCreated,
        \DateTimeInterface $datePublished,
        \DateTimeInterface $dateModified,
        Organization $author,
        WebSite $isPartOf
    ) {
        $this->url = $url;
        $this->name = $name;
        $this->description = $description;
        $this->dateCreated = $dateCreated;
        $this->datePublished = $datePublished;
        $this->dateModified = $dateModified;
        $this->author = $author;
        $this->isPartOf = $isPartOf;
    }

    /**
     * @param string $url
     * @param string $name
     * @param string $description
     * @param \DateTimeInterface $dateCreated
     * @param \DateTimeInterface $datePublished
     * @param \DateTimeInterface $dateModified
     * @return self
     */
    public static function create(
        string $url,
        string $name,
        string $description,
        \DateTimeInterface $dateCreated,
        \DateTimeInterface $datePublished,
        \DateTimeInterface $dateModified
    ): self {
        return new self(
            $url,
            $name,
            $description,
            $dateCreated,
            $datePublished,
            $dateModified,
            Organization::packageFactory(),
            WebSite::packageFactoryOrg()
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateCreated(): \DateTimeInterface
    {
        return $this->dateCreated;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDatePublished(): \DateTimeInterface
    {
        return $this->datePublished;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateModified(): \DateTimeInterface
    {
        return $this->dateModified;
    }

    /**
     * @return Organization
     */
    public function getAuthor(): Organization
    {
        return $this->author;
    }

    /**
     * @return WebSite
     */
    public function getIsPartOf(): WebSite
    {
        return $this->isPartOf;
    }

    /**
     * @return array
     */
    public function getAsJsonLD(): array
    {
        return [
            '@context' => 'http://schema.org',
            '@type' => 'WebPage',
            'url' => $this->url,
            'name' => $this->name,
            'description' => $this->description,
            'dateCreated' => $this->dateCreated->format(\DateTimeInterface::ATOM),
            'datePublished' => $this->datePublished->format(\DateTimeInterface::ATOM),
            'dateModified' => $this->dateModified->format(\DateTimeInterface::ATOM),
            'author' => $this->author->getAsJsonLD(),
            'isPartOf' => $this->isPartOf->getAsJsonLD()
        ];
    }
}