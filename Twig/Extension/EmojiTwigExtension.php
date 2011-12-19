<?php

namespace NSM\EmojiBundle\Twig\Extension;

use NSM\EmojiBundle\Helper\EmojiHelper;

class EmojiTwigExtension extends \Twig_Extension
{
    protected $helper;

    function __construct(EmojiHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFilters()
    {
        return array(
            'emoji' => new \Twig_Filter_Method($this, 'emoji', array('is_safe' => array('html'))),
        );
    }

    public function emoji($txt, $size = null)
    {
        return $this->helper->transform($txt, $size);
    }

    public function getName()
    {
        return 'emoji';
    }
}
