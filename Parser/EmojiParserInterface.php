<?php

namespace NSM\Bundle\EmojiBundle\Parser;

interface EmojiParserInterface
{
    /**
     * Converts emoji text to html images
     *
     * @param string $text plain text
     * @return string rendered html
     */
    function transform($text, $size);
}
