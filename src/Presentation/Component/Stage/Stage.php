<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Stage;

use PackageFactory\ComponentEngine\Parser\Ast\Module\Module;
use PackageFactory\ComponentEngine\Parser\Lexer\Tokenizer;
use PackageFactory\ComponentEngine\Parser\Lexer\TokenStream;
use PackageFactory\ComponentEngine\Parser\Source\Source;
use PackageFactory\ComponentEngine\Runtime\Context;
use PackageFactory\ComponentEngine\Runtime\Evaluation\Module\OnModule;
use PackageFactory\ComponentEngine\Runtime\Runtime;
use PackageFactory\VirtualDOM\Model\ComponentInterface;
use PackageFactory\VirtualDOM\Model\VisitorInterface;
use PackageFactory\Website\Presentation\Component\Headline\Headline;
use PackageFactory\Website\Presentation\Component\Link\Link;

final class Stage implements ComponentInterface
{
    /**
     * @var null|Headline
     */
    private $headline;

    /**
     * @var null|string
     */
    private $introduction;

    /**
     * @var null|Link
     */
    private $link;

    /**
     * @var ComponentInterface
     */
    private $content;

    /**
     * @param null|Headline $headline
     * @param null|string $introduction
     * @param null|Link $link
     * @param ComponentInterface $content
     */
    private function __construct(
        ?Headline $headline,
        ?string $introduction,
        ?Link $link,
        ComponentInterface $content
    ) {
        $this->headline = $headline;
        $this->introduction = $introduction;
        $this->link = $link;
        $this->content = $content;
    }

    /**
     * @param ComponentInterface $content
     * @return self
     */
    public static function fromContent(ComponentInterface $content): self
    {
        return new self(null, null, null, $content);
    }

    /**
     * @return null|Headline
     */
    public function getHeadline(): ?Headline
    {
        return $this->headline;
    }

    /**
     * @param Headline $headline
     * @return self
     */
    public function withHeadline(Headline $headline): self
    {
        return new self($headline, $this->introduction, $this->link, $this->content);
    }

    /**
     * @return null|string
     */
    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    /**
     * @param string $introduction
     * @return self
     */
    public function withIntroduction(string $introduction): self
    {
        if ($this->headline === null) {
            throw new \LogicException('A stage with an introduction text must have a headline.');
        }

        return new self($this->headline, $introduction, $this->link, $this->content);
    }

    /**
     * @return null|Link
     */
    public function getLink(): ?Link
    {
        return $this->link;
    }

        /**
     * @param Link $link
     * @return self
     */
    public function withLink(Link $link): self
    {
        if ($this->headline === null) {
            throw new \LogicException('A stage with a link text must have a headline.');
        }

        return new self($this->headline, $this->introduction, $link, $this->content);
    }

    /**
     * @return ComponentInterface
     */
    public function getContent(): ComponentInterface
    {
        return $this->content;
    }

    /**
     * @param VisitorInterface $visitor
     * @return void
     */
    public function render(VisitorInterface $visitor): void
    {
        $source = Source::fromFile(__DIR__ . DIRECTORY_SEPARATOR . 'Stage.afx');
        $tokenizer = Tokenizer::fromSource($source);
        $stream = TokenStream::fromTokenizer($tokenizer);
        $module = Module::fromTokenStream($stream);
        $runtime = Runtime::default()->withContext(
            Context::fromArray([
                'props' => $this
            ])
        );

        $visitor->onElement(OnModule::evaluate($runtime, $module));
    }
}