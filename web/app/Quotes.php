<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Quotes extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Quote';
}
