<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;

    protected $initialData = [
        'en' => [
            'title' => 'Site English Title',
            'desc' => 'Site English Description',
            'address' => 'Physical Address in English Language',
        ],
        'ar' => [
            'title' => 'عنوان الموقع باللغة العربية',
            'desc' => 'وصف الموقع باللغة العربية',
            'address' => 'العنوان الفعلي باللغة العربية',
        ],
        'fr' => [
            'title' => 'Titre du site en langue française',
            'desc' => 'Description du site en langue française',
            'address' => 'Adresse physique en langue française',
        ],

    ];

    public $translatedAttributes = ['title', 'desc', 'address'];

    protected $fillable = ['logo', 'favicon', 'facebook', 'instagram', 'youtube', 'phone', 'email'];

    public static function checkSettings(){
        $instance = new static();
        if ( count($instance->all()) < 1 ){
            $data = [
                'logo' => '',
                'favicon' => '',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'youtube' => 'https://www.youtube.com',
                'phone' => '0123456789',
                'email' => 'abc@xyz.com',
            ];

            foreach (config('app.languages') as $key => $value){
                foreach ($instance->translatedAttributes as $translatedAttribute) {

                    $data[$key][$translatedAttribute] = $instance->initialData[$key][$translatedAttribute];
                }
            }

            $instance->create($data);
        }

        return $instance->first();
    }
}
