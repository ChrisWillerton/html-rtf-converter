<?php

namespace ChrisWillerton\HtmlToRtf\Node;

use ChrisWillerton\HtmlToRtf\Node;

/**
 * Class TextNode
 * @package HtmlToRtf\Node
 */
class TextNode extends Node
{
    /**
     * parse the node and return RTF string
     * @return string
     */
    public function parse()
    {
        return $this->sanitizeString($this->getDomNode()->nodeValue);
    }
}
