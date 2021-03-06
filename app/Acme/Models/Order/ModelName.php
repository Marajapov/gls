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

    public function getTime(){
        return date('H:i', strtotime($this->created_at));
    }

    public function getFullDate()
    {
        $fullDate = $this->updated_at;
        $date = date('Y-m-d H:i:s', strtotime($fullDate));
    }

    public function getCount()
    {
        return $this->count;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getFile()
    {
        return $this->attachment;
    }

}
