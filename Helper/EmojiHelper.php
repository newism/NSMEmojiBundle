<?php

namespace NSM\Bundle\EmojiBundle\Helper;

use Symfony\Component\Templating\Helper\HelperInterface;
use NSM\Bundle\EmojiBundle\Parser\EmojiParser;

class EmojiHelper implements HelperInterface
{
    /**
     * @var EmojiParser
     */
    protected $parser;
    protected $charset = 'UTF-8';

    public function __construct(EmojiParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Sets the default charset.
     *
     * @param string $charset The charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * Gets the default charset.
     *
     * @return string The default charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    public function getName()
    {
        return 'emoji';
    }

    /**
     * Transforms emoji syntax to HTML
     * @param   string  $emojiText   The emoji syntax text
     * @return  string               The HTML code
     */
    public function transform($emojiText, $size = null)
    {
        return $this->parser->transform($emojiText, $size);
    }

}
