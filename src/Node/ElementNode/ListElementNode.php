<?php

namespace ChrisWillerton\HtmlToRtf\Node\ElementNode;

use ChrisWillerton\HtmlToRtf\Node\ElementNode;

/**
 * Class ListElementNode
 * @package HtmlToRtf\Node\ElementNode
 */
class ListElementNode extends ElementNode
{
    /**
     * parse the node and prepend/append the rtf code
     * @return string
     */
    public function parse()
    {
        $prepend = '\pard';

        if ($this->getParent() instanceof LiElementNode
            && $this->getDomNode()->parentNode->firstChild !== $this->getDomNode()) {
            $prepend = '\par' . $prepend;
        }

        $this->setRtfPrepend($prepend);
        return parent::parse();
    }
}
