<?php
/**
 * @author: Maxim Fisyuk <maxim.fisyuk@gmail.com>
 * @date: 04.11.14 13:01
 */

namespace priceWriter\Element;


class AbstractOffer {

	protected $id;

	protected $url;

	protected $price;

	protected $available;

	protected $categoryId;

	protected $description;

	protected $delivery;

	protected $params;

	protected $pictures;

	protected $vendor;

	public function __construct($options)
	{
		foreach($options as $k=>$v){
			$setter = 'set' . ucfirst($k);
			if(method_exists($this, $setter)){
				call_user_func(array($this, $setter), $v);
			} else {
				throw new \Exception("unknown option '{$k}'");
			}
		}
	}


	/**
	 * @return mixed
	 */
	public function getAvailable()
	{
		return $this->available;
	}

	/**
	 * @param mixed $available
	 */
	public function setAvailable($available)
	{
		$this->available = $available;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryId()
	{
		return $this->categoryId;
	}

	/**
	 * @param mixed $categoryId
	 */
	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice($price)
	{
		$this->price = $price;
	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}

	/**
	 * @return mixed
	 */
	public function getDelivery()
	{
		return $this->delivery;
	}

	/**
	 * @param mixed $delivery
	 */
	public function setDelivery($delivery)
	{
		$this->delivery = $delivery;
	}





	/**
	 * @return mixed
	 */
	public function getParams()
	{
		return $this->params;
	}

	public function setParams(array $params){
		foreach($params as $param){
			$this->addParam($param['name'], $param['value'], isset($param['unit']) ? $param['unit'] : false);
		}
	}

	public function addParam($name, $value, $unit = false){

		$this->params[] = array(
			'name' => $name,
			'value' => $value,
			'unit' => $unit
		);
		return $this;
	}

	public function getPictures(){
		return $this->pictures;
	}

	public function setPictures(array $pictures){
		$this->pictures = $pictures;
	}

	/**
	 * @return mixed
	 */
	public function getVendor()
	{
		return $this->vendor;
	}

	/**
	 * @param mixed $vendor
	 */
	public function setVendor($vendor)
	{
		$this->vendor = $vendor;
	}






	/**
	 *
	 * @param $options
	 * @return YmlOffer
	 */
	public static function factory($options = array()){
		$className = get_called_class();
		return new $className($options);
	}









} 