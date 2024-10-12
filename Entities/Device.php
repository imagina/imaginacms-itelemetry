<?php

namespace Modules\Itelemetry\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;
use Modules\Ilocations\Entities\City;
use Modules\Ilocations\Entities\Country;
use Modules\Ilocations\Entities\Province;

class Device extends CrudModel
{
  use Translatable;

  protected $table = 'itelemetry__devices';
  public $transformer = 'Modules\Itelemetry\Transformers\DeviceTransformer';
  public $repository = 'Modules\Itelemetry\Repositories\DeviceRepository';
  public $requestValidation = [
      'create' => 'Modules\Itelemetry\Http\Requests\CreateDeviceRequest',
      'update' => 'Modules\Itelemetry\Http\Requests\UpdateDeviceRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public $translatedAttributes = ['title'];
  protected $fillable = [
    'country_id',
    'province_id',
    'city_id',
    'lat',
    'lng',
    'options'
  ];

  protected $casts = [
    'options' => 'array',
  ];

  public $modelRelations = [
    'sensors' => 'hasMany',
  ];

  public function country()
  {
    return $this->belongsTo(Country::class);
  }

  public function province()
  {
    return $this->belongsTo(Province::class);
  }

  public function city()
  {
    return $this->belongsTo(City::class);
  }

  public function sensors()
  {
    return $this->hasMany(DeviceSensor::class);
  }

}
