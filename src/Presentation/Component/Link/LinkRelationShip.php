<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Link;

final class LinkRelationship
{
    /**
     * @var array<string, bool>
     */
    private $values;

    /**
     * @param array<string, bool> $values
     */
    private function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * @return self
     */
    public function withBookmark(): self
    {
        $values = $this->values;
        $values['bookmark'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withExternal(): self
    {
        $values = $this->values;
        $values['external'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withHelp(): self
    {
        $values = $this->values;
        $values['help'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withLicense(): self
    {
        $values = $this->values;
        $values['license'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withNofollow(): self
    {
        $values = $this->values;
        $values['nofollow'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withNoopener(): self
    {
        $values = $this->values;
        $values['noopener'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withNoreferrer(): self
    {
        $values = $this->values;
        $values['noreferrer'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withPrev(): self
    {
        $values = $this->values;
        $values['prev'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withNext(): self
    {
        $values = $this->values;
        $values['next'] = true;

        return new self($values);
    }

    /**
     * @return self
     */
    public function withTag(): self
    {
        $values = $this->values;
        $values['tag'] = true;

        return new self($values);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return join(' ', array_keys($this->values));
    }
}