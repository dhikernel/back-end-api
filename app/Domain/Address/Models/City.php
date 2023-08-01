<?php

declare(strict_types=1);

namespace App\Domain\Address\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'city';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'name',
        'state',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;
}
