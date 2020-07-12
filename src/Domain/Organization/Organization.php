<?php declare(strict_types=1);
namespace PackageFactory\Website\Domain\Organization;

final class Organization
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    private function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return self
     */
    public static function packageFactory(): self
    {
        return new self('PackageFactory');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array<mixed>
     */
    public function getAsJsonLD(): array
    {
        return [
            '@context' => 'http://schema.org',
            '@type' => 'Organization',
            'name' => $this->name
        ];
    }
}