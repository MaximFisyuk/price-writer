<?php

namespace priceWriter;

class ElementWriter
{
    private $xmlWriter;

    public function __construct(\XMLWriter $xmlWriter)
    {
        $this->xmlWriter = $xmlWriter;
    }

    public function startElement(Element $element)
    {

        $this->xmlWriter->startElement($element->getName());
        $attr = $element->getAttr();
        foreach ($attr as $k => $v) {
            $this->xmlWriter->startAttribute($k);
            $this->xmlWriter->text($v);
            $this->xmlWriter->endAttribute();
        }
        if ('' !== $element->getText()) {
            $this->xmlWriter->text($element->getText());
        }
    }

    public function endElement(Element $element)
    {
        $this->xmlWriter->endElement();
    }
}
