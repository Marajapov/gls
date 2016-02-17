<?php
namespace Model\Comment;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $guarded = ['id'];
    // protected $fillable = [];

    public function id()
    {
        return $this->id;
    }

    public function getDateFormatted()
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }

    public function getTime()
    {
        $fullDate = $this->created_at;
        $time = date('G:i', strtotime($fullDate));
        return $time;
    }

    public function getDay()
    {
        $fullDate = $this->created_at;
        $day = date('j', strtotime($fullDate));
        return $day;
    }

    public function getYear()
    {
        $fullDate = $this->created_at;
        $year = date('Y', strtotime($fullDate));
        return $year;
    }

    public function getMonth()
    {
        $fullDate = $this->created_at;
        $MonthRu = date('m', strtotime($fullDate));

        $JanuaryRu = 'янв';
        $FebruaryRu = 'фев';
        $MarchRu = 'март';
        $AprilRu = 'апр';
        $MayRU = 'май';
        $JuneRU = 'июнь';
        $JulyRu = 'июль';
        $AugustRU = 'авг';
        $SeptemberRU = 'сент';
        $OctoberRu = 'окт';
        $NovemberRu = 'нояб';
        $DecemberRu = 'дек';

        if($MonthRu == 1){
            $MonthRu = $JanuaryRu;
        }elseif($MonthRu == 2){
            $MonthRu = $FebruaryRu;
        }elseif($MonthRu == 3){
            $MonthRu = $MarchRu;
        }elseif($MonthRu == 4){
            $MonthRu = $AprilRu;
        }elseif($MonthRu == 5){
            $MonthRu = $MayRU;
        }elseif($MonthRu == 6){
            $MonthRu = $JuneRU;
        }elseif($MonthRu == 7){
            $MonthRu = $JulyRu;
        }elseif($MonthRu == 8){
            $MonthRu = $AugustRU;
        }elseif($MonthRu == 9){
            $MonthRu = $SeptemberRU;
        }elseif($MonthRu == 10){
            $MonthRu = $OctoberRu;
        }elseif($MonthRu == 11){
            $MonthRu = $NovemberRu;
        }elseif($MonthRu == 12){
            $MonthRu = $DecemberRu;
        }
        return $MonthRu;
    }

}
