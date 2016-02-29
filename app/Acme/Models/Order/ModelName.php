<?php
namespace Model\Order;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships;

    protected $table = 'orders';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $guarded = ['id'];
    // protected $fillable = [];

    /**
     * Searchable rules.
     *
     * @var array
     */

    public static function boot()
    {
        parent::boot();

    }

    public function id()
    {
        return $this->id;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getClient() 
    {
        return $this->client_name;
    }

    public function getStatus() 
    {
        return $this->status;
    }

    public function getPhone() 
    {
        return $this->client_phone;
    }

    public function getAdres() 
    {
        return $this->client_adres;
    }

    public function getDescription() 
    {
        return $this->description;
    }

    public function getDate() 
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }

}
