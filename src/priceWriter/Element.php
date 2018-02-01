<?php

namespace maxxfs\priceWriter;

class Element
{
   /**
     * @var ElementWriter
     */
    private $writer;

    private $name;

    private $attr = array();

    private $text;

    private $closed = false;

    public function __construct(ElementWriter $writer, $name, $attr = array(), $text = '')
    {
        $this->name = $name;
        $this->attr = $attr;
        $this->text = $text;
        $this->writer = $writer;
        $this->writer->startElement($this);
    }

    /**
     * @return array
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    public function close()
    {
        if (!$this->closed) {
            $this->writer->endElement($this);
            $this->closed = true;
        } else {
            throw new \Exception("Element {$this->name} is already closed");
        }
    }

    public function addChild(Element $element)
    {
        $this->children[] = $element;
    }

//	public function __destruct()
//	{
//		if(!$this->closed){
//			throw new \Exception("Element {$this->name} is not closed");
//		}
//
//	}
}
