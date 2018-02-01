<?php

namespace maxxfs\priceWriter\Type;

use maxxfs\priceWriter\Document;
use maxxfs\priceWriter\Element;

class Yml
{
    protected $document;

    protected $shop;

    /**
     * @var Element
     */
    protected $currencies;

    protected $categories;

    protected $offers;

    protected $offerElements = array(
        'url',
        'price',
        'currencyId',
        'categoryId',
        'store',
        'pickup',
        'delivery',
        'local_delivery_cost',
        'typePrefix',
        'vendor',
        'vendorCode',
        'model',
        'description',
        'sales_notes',
        'manufacturer_warranty',
        'seller_warranty',
        'country_of_origin',
        'barcode',
        'cpa',
        'rec',
        'expiry',
        'weight',
        'dimensions'
    );

    public function __construct($documentUri, \DateTime $date = null)
    {
        $this->document = new Document($documentUri);
        $writer = $this->document->getXmlWriter();
        $writer->startDtd("yml_catalog", null, "shops.dtd");
        $writer->endDtd();

        if (null == $date) {
            $date = new \DateTime();
        }
        $this->document->openElement("yml_catalog", array(
            "date" => $date->format("Y-m-d H:i")));
    }

    public function startShop(array $options)
    {
        $this->shop = $this->document->openElement("shop");
        foreach ($options as $key => $value) {
            $this->document->openElement($key, array(), $value)->close();
        }
    }

    public function endShop()
    {
        $this->shop->close();
    }

    public function startCurrencies()
    {
        $this->currencies = $this->document->openElement("currencies");
        return $this;
    }

    /**
     * @param $id
     * @param $rate
     * @return $this
     * @throws \Exception
     */
    public function addCurrency($id, $rate = null)
    {
        if (!$this->currencies) {
            $this->startCurrencies();
        }

        $attr = array(
            "id" => $id
        );
        if (null !== $rate) {
            $attr['rate'] = $rate;
        }


        $this->document->openElement("currency", $attr)->close();
        return $this;
    }

    public function endCurrencies()
    {
        $this->currencies->close();
        return $this;
    }

    public function startCategories()
    {
        $this->categories = $this->document->openElement("categories");
        return $this;
    }

    public function endCategories()
    {
        $this->categories->close();
        return $this;
    }

    /**
     * @param $id
     * @param $name
     * @param null $parentId
     * @return $this
     * @throws \Exception
     */
    public function addCategory($id, $name, $parentId = null)
    {
        if (!$this->categories) {
            $this->startCategories();
        }
        $attr = array(
            "id" => $id
        );
        if ($parentId) {
            $attr['parentId'] = $parentId;
        }
        $this->document->openElement("category", $attr, $name)->close();
        return $this;
    }


    public function startOffers()
    {
        $this->offers = $this->document->openElement("offers");
        return $this;
    }

    public function endOffers()
    {
        $this->offers->close();
        return $this;
    }

    /**
     * @param array|Element\YmlOffer $offer
     * @throws \Exception
     */
    public function addOffer($offer)
    {
        if (is_array($offer)) {
            $offer = Element\YmlOffer::factory($offer);
        }

        $attr = array('id' => $offer->getId());
        if ($offer->getType()) {
            $attr['type'] = $offer->getType();
        }
        if (null !== $offer->getAvailable()) {
            if (is_bool($offer->getAvailable())) {
                $attr['available'] = $offer->getAvailable() ? 'true' : 'false';
            } else {
                $attr['available'] = $offer->getAvailable();
            }
        }

        $offerElement = $this->document->openElement("offer", $attr);

        foreach ($this->offerElements as $name) {
            $getter = 'get' . ucfirst($name);
            $value = call_user_func(array($offer, $getter));
            if (null !== $value) {
                if (is_bool($value)) {
                    $value = $value ? 'true' : 'false';
                }
                $this->document->openElement($name, array(), $value)->close();
            }

        }
        $offerElement->close();
    }

    public function endDocument()
    {
        $this->document->end();
    }
}
