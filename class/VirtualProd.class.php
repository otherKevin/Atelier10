<?php

namespace Virtual;

class Product
{
    protected string $name;
    protected string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function show()
    {
        echo "<p>Infos sur le produit virtuel " . $this->name . " : </p>";
        echo "<p>" . $this->description . "</p>";
    }
}
