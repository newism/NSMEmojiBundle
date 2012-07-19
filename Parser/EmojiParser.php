<?php

namespace NSM\Bundle\EmojiBundle\Parser;

use NSM\Bundle\EmojiBundle\EmojiParserInterface;


/**
 * EmojiParser
 *
 * This class extends the original Emoji parser.
 * It allows to disable unwanted features to increase performances.
 */
class EmojiParser implements EmojiParserInterface
{
    private $emojis;
    private $assetPath;
    private $defaultSize;

    /**
     * Create a new instance.
     */
    public function __construct($emojis, $asset_path, $default_size = 18)
    {
        $this->emojis = $emojis;
        $this->assetPath = $asset_path;
        $this->defaultSize = $default_size;
    }

    public function transform($text, $size = null)
    {
        $size = (null === $size) ? $this->defaultSize : $size;

        foreach ($this->emojis as $emoji) {
            $token = ":".$emoji.":";
            if (false !== strpos($text, $token)) {
                if ($emoji === '+1') {
                    $emoji = 'plus1';
                }
                $text = str_replace(
                    $token,
                    '<img class="emoji '.$emoji.'" height="'.$size.'" width="'.$size.'" src="'.$this->assetPath.$emoji.'.png" />',
                    $text
                );
            }
        }

        return $text;
    }
}
