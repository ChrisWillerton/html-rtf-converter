<?php

namespace ChrisWillerton\HtmlToRtf\Node\ElementNode;

use ChrisWillerton\HtmlToRtf\Node;
use ChrisWillerton\HtmlToRtf\Node\ElementNode;

/**
 * Class LiElementNode
 * @package HtmlToRtf\Node\ElementNode
 */
class LiElementNode extends ElementNode
{
    const LIST_ELEMENTS = ['ol', 'ul'];
    const INDENT_SIZE = 360;

    /**
     * parse node and create RTF string
     * @return string
     */
    public function parse()
    {
        $lastChild = Node::getInstance($this->getDomNode()->lastChild);
        $parentNode = $this->getParent();
        $nodePath = $this->getNodePath();

        if (!($lastChild instanceof ListElementNode)) {
            $this->setRtfAppend('\par');
        }

        $setIndent = (
            //if this is the first LI in an LIST_ELEMENT (new indent)
            $parentNode->getDomNode()->firstChild === $this->getDomNode() ||
            //if this is the LI after an LI with an UL in it (reset indent)
            ($this->getDomNode()->previousSibling && $this->getDomNode()->previousSibling->lastChild ? Node::getInstance($this->getDomNode()->previousSibling->lastChild) instanceof ListElementNode : false)
        );
        if ($setIndent) {
            $indent = self::INDENT_SIZE;
            foreach ($nodePath as $element) {
                if (in_array($element, LiElementNode::LIST_ELEMENTS)) {
                    $indent += self::INDENT_SIZE;
                }
            }
        }

        $rtf = '';
        if ($parentNode instanceof UlElementNode) {
            if ($setIndent) {
                $this->setRtfPrepend('{\pntext\f0\\\'B7\tab}{\*\pn\pnlvlblt\pnf1\pnindent0{\pntxtb\\\'B7}}\fi-360\li' . $indent . '\sa200\sl276\slmult1 ');
            } else {
                $this->setRtfPrepend('{\pntext\f0\'B7\tab}');
            }
            $rtf = parent::parse();
        } else if ($parentNode instanceof OlElementNode) {
            preg_match('/li\[(\d+)\]/', end($nodePath), $matches);
            $orderId = $matches[1] ?? 1;
            if ($setIndent) {
                $this->setRtfPrepend('{\pntext\f0 ' . $orderId . '.\tab}{\*\pn\pnlvlbody\pnf0\pnindent0\pnstart1\pndec{\pntxta.}}\fi-360\li' . $indent . '\sa200\sl276\slmult1 ');
            } else {
                $this->setRtfPrepend('{\pntext\f0 ' . $orderId . '.\tab}');
            }
            $rtf = parent::parse();
        }
        return $rtf;
    }
}
