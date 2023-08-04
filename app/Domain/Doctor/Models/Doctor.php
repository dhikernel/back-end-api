<?php

declare(strict_types=1);

namespace App\Domain\Doctor\Models;

use App\Domain\Patient\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'doctor';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'name',
        'specialty',
        'city_id',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'doctor_patient', 'doctor_id', 'patient_id');
    }

    public function cities()
    {
        return $this->hasOne(City::class, 'city_id', 'id');
    }

}
