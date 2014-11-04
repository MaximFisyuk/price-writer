<?php
/**
 * @author: Maxim Fisyuk <maxim.fisyuk@gmail.com>
 * @date: 03.11.14 19:07
 */

namespace priceWriter;


class Document {

	/**
	 * @var \XMLWriter
	 */
	private $xmlWriter;

	private $elementWriter;

	private $documentEnded = false;

	public function __construct($documentUri, $version = '1.0', $encoding='utf-8'){
		$this->xmlWriter = new \XMLWriter();
		$this->elementWriter = new ElementWriter($this->xmlWriter);
		$this->xmlWriter->openUri($documentUri);
		$this->xmlWriter->setIndent(true);
		$this->xmlWriter->startDocument($version, $encoding);
	}

	public function end(){
		if(!$this->documentEnded){
			$this->xmlWriter->endDocument();
			$this->xmlWriter->flush();
			$this->documentEnded = true;
		}
	}

	public function __destruct()
	{
		$this->end();
	}


	/**
	 * @param $name
	 * @param array $attr
	 * @param string $value
	 * @return Element
	 */
	public function openElement($name, $attr = array(), $value = ''){
		return new Element($this->elementWriter, $name, $attr, $value);
	}

	/**
	 * @return \XMLWriter
	 */
	public function getXmlWriter()
	{
		return $this->xmlWriter;
	}






} 