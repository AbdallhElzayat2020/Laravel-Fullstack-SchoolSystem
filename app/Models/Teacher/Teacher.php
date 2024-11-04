<?php

namespace App\Models\Teacher;

use App\Models\Genders\Gender;
use App\Models\Specializations\Specialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'teachers';

    public $translatable = ['Name'];

    protected $guarded = [];
    // protected $fillable = [
    //     'Email',
    //     'Password',
    //     'Name',
    //     'Specialization_id',
    //     'Gender_id',
    //     'Joining_Date',
    //     'Address',
    // ];

    public function genders()
    {
        return $this->belongsTo(Gender::class, 'Gender_id');
    }
    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'Specialization_id');
    }
    // protected $guarded = [];
}