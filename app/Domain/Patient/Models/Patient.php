<?php

declare(strict_types=1);

namespace App\Domain\Patient\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'patient';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'name',
        'cpf',
        'phone',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_patient', 'patient_id', 'doctor_id');
    }
}
