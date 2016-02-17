<?php
namespace Model\Anons;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers,ModelRelationships;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'anons';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $guarded = ['id'];
    // protected $fillable = [];

    public static function boot()
    {
        parent::boot();

        self::observe(new ModelObserver);
    }

    public function id()
    {
        return $this->id;
    }

    public function getNameOne()
    {
        $lc = app()->getlocale();

        if($lc == 'kg'){
            return $this->name;
        } else {
            return $this->nameRu;
        }
    }

    public function getWeekDayOne()
    {
        $lc = app()->getlocale();

        if($lc == 'kg'){
            return $this->weekday;
        } else {
            return $this->weekdayRu;
        }
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function getDateFormatted()
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }

}
