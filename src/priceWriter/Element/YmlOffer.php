<?php

namespace maxxfs\priceWriter\Element;

final class YmlOffer extends AbstractOffer
{
    protected $type;

    protected $currencyId;

    protected $store;

    protected $pickup;

    protected $local_delivery_cost;

    protected $typePrefix;

    protected $vendorCode;

    protected $model;

    protected $sales_notes;

    protected $manufacturer_warranty;

    protected $seller_warranty;

    protected $country_of_origin;

    protected $barcode;

    protected $cpa;

    protected $rec;

    protected $expiry;

    protected $weight;

    protected $dimensions;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param mixed $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param mixed $store
     */
    public function setStore($store)
    {
        $this->store = $store;
    }

    /**
     * @return mixed
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * @param mixed $pickup
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;
    }

    /**
     * @return mixed
     */
    public function getLocal_delivery_cost()
    {
        return $this->local_delivery_cost;
    }

    /**
     * @param mixed $local_delivery_cost
     */
    public function setLocal_delivery_cost($local_delivery_cost)
    {
        $this->local_delivery_cost = $local_delivery_cost;
    }

    /**
     * @return mixed
     */
    public function getTypePrefix()
    {
        return $this->typePrefix;
    }

    /**
     * @param mixed $typePrefix
     */
    public function setTypePrefix($typePrefix)
    {
        $this->typePrefix = $typePrefix;
    }

    /**
     * @return mixed
     */
    public function getVendorCode()
    {
        return $this->vendorCode;
    }

    /**
     * @param mixed $vendorCode
     */
    public function setVendorCode($vendorCode)
    {
        $this->vendorCode = $vendorCode;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getSales_notes()
    {
        return $this->sales_notes;
    }

    /**
     * @param mixed $sales_notes
     */
    public function setSales_notes($sales_notes)
    {
        $this->sales_notes = $sales_notes;
    }

    /**
     * @return mixed
     */
    public function getManufacturer_warranty()
    {
        return $this->manufacturer_warranty;
    }

    /**
     * @param mixed $manufacturer_warranty
     */
    public function setManufacturer_warranty($manufacturer_warranty)
    {
        $this->manufacturer_warranty = $manufacturer_warranty;
    }

    /**
     * @return mixed
     */
    public function getSeller_warranty()
    {
        return $this->seller_warranty;
    }

    /**
     * @param mixed $seller_warranty
     */
    public function setSeller_warranty($seller_warranty)
    {
        $this->seller_warranty = $seller_warranty;
    }

    /**
     * @return mixed
     */
    public function getCountry_of_origin()
    {
        return $this->country_of_origin;
    }

    /**
     * @param mixed $country_of_origin
     */
    public function setCountry_of_origin($country_of_origin)
    {
        $this->country_of_origin = $country_of_origin;
    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param mixed $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return mixed
     */
    public function getCpa()
    {
        return $this->cpa;
    }

    /**
     * @param mixed $cpa
     */
    public function setCpa($cpa)
    {
        $this->cpa = $cpa;
    }

    /**
     * @return mixed
     */
    public function getRec()
    {
        return $this->rec;
    }

    /**
     * @param mixed $rec
     */
    public function setRec($rec)
    {
        $this->rec = $rec;
    }

    /**
     * @return mixed
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * @param mixed $expiry
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param mixed $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }


}