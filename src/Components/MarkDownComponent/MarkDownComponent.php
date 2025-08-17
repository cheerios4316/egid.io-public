<?php

namespace Src\Components\MarkDownComponent;

use DumpsterfirePages\Component;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Exception\CommonMarkException;
use League\CommonMark\MarkdownConverter;

class MarkDownComponent extends Component
{
    protected string $text = '';
    protected MarkdownConverter $markdown;
    public function __construct() {
        $this->markdown = new CommonMarkConverter();
    }


    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @throws CommonMarkException
     */
    public function getMarkdown(): string
    {
        try {
            return $this->markdown->convert($this->text);
        } catch (CommonMarkException $e) {
            throw $e;
        }
    }
}