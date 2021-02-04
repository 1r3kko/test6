<?php

namespace MyProject\Models\Products;
use MyProject\Models\ActiveRecordEntity;

class Product extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->ID;
    }

    public function getProductId()
    {
        return $this->PRODUCT_ID;
    }

    public function getName()
    {
        return $this->PRODUCT_NAME;
    }
    public function getPrice()
    {
        return $this->PRODUCT_PRICE;
    }
    public function getArticle()
    {
        return $this->PRODUCT_ARTICLE;
    }
    public function getQuantity()
    {
        return $this->PRODUCT_QUANTITY;
    }
    public function getDate()
    {
        return $this->DATE_CREATE;
    }
    public function getVisibility()
    {
        return $this->VISIBILITY;
    }
    protected static function getTableName()
    {
        return 'products';
    }
}