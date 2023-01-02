<?php

class Category 
{
    private $id_category;
    private $category_name;

    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Get the value of category_name
     */ 
    public function getCategory_name()
    {
        return $this->category_name;
    }

    /**
     * Set the value of category_name
     *
     * @return  self
     */ 
    public function setCategory_name(string $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }
}