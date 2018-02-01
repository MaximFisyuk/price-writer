<?php

class DocumentTest extends \PHPUnit\Framework\TestCase
{
    public function testExample()
    {
        $doc = new \maxxfs\priceWriter\Document("php://output");
        $catalog = $doc->openElement("yml_catalog");
        $shop = $doc->openElement("shop");
        $offers = $doc->openElement("offers");

        for ($i = 0; $i < 3; $i++) {
            $offer = $doc->openElement("offer", array(
                "id" => $i,
                "available" => true,
                "bid" => '"quotes"'
            ));

            $doc->openElement("url", array(), "<a href='http://google.com'>")->close();
            $doc->openElement("price", array(), 100500 * $i)->close();
            $offer->close();
        }
    }
} 