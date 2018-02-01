<?php
/**
 * @author: Maxim Fisyuk <maxim.fisyuk@gmail.com>
 * @date: 04.11.14 09:08
 */

class YmlTest extends PHPUnit_Framework_TestCase
{

    public function testCreate()
    {


        //$filename = tempnam(sys_get_temp_dir(), __CLASS__);
        $filename = "php://output";
        $yml = new \priceWriter\Type\Yml($filename);

        $yml->startShop(array(
            "name" => "BestShop",
            "company" => "Best online seller Inc",
            "url" => "http://best.seller.ru/"
        ));

        $yml
            ->startCurrencies()
            ->addCurrency("UAH")
            ->addCurrency("USD", "NBU")
            ->endCurrencies();

        $yml
            ->startCategories()
            ->addCategory(1, "Книги")
            ->addCategory(2, "Детективы", 1)
            ->addCategory(3, "Боевики", 1)
            ->addCategory(4, "Видео")
            ->addCategory(5, "Комедии", 4)
            ->addCategory(6, "Принтеры")
            ->addCategory(7, "Оргтехника")
            ->endCategories();

        $yml->startOffers();
        $yml->addOffer(array(
            "id" => 12341,
            "type" => "vendor.model",
            "url" => "http://best.seller.ru/product_page.asp?pid=12344",
            "price" => "16800",
            "currencyId" => "USD",
            "categoryId" => "6",
            "pictures" => array("http://best.seller.ru/img/device12345.jpg"),
            "store" => "false",
            "pickup" => "false",
            "delivery" => true,
            "local_delivery_cost" => 300,
            "typePrefix" => "Принтер",
            "vendor" => "HP",
            "vendorCode" => "CH366C",
            "model" => "Deskjet D2663",
            "description" => "Серия принтеров для людей, которым нужен надежный, простой в использовании
    цветной принтер для повседневной печати. Формат А4. Технология печати: 4-цветная термальная струйная.
    Разрешение при печати: 4800х1200 т/д.",
            "sales_notes" => "Необходима предоплата.",
            "manufacturer_warranty" => true,
            "seller_warranty" => "P3Y",
            "country_of_origin" => "Япония",
            "barcode" => "1234567890120",
            "cpa" => "1",
            "rec" => "123123,1214,243",
            "expiry" => "P5Y",
            "weight" => "2.07",
            "dimensions" => "100/25.45/11.112"
        ));
        $yml->endOffers();
        $yml->endDocument();
    }
} 