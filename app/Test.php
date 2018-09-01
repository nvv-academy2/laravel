<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Test
 * @package App
 * @property string $name
 * @property int $date
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Test extends Model
{
    public $table = 'test';

    public function getDateAttribute($value)
    {
        return date("Y-m-d H:i:s", $value);
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = (is_numeric($date)) ? $date : strtotime($date);
    }
}
