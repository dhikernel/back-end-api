<?php

declare(strict_types=1);

namespace App\Domain\Doctor\Models;

use App\Domain\Patient\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAndPatient extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'doctor_patient';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'doctor_id',
        'patient_id',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

    public function doctors()
    {
        return $this->hasOne(
            Doctor::class,
            'id',
            'doctor_id'

        );
    }

    public function patients()
    {
        return $this->hasOne(
            Patient::class,
            'id',
            'patient_id'

        );
    }
}
