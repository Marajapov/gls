<?php
namespace Model\Media;

use Illuminate\Database\Eloquent\Model;
use Model\Post\ModelAttributes;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships, ModelScopes, ModelAttributes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medias';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        self::observe(new ModelObserver);
    }

    public function id()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameRu()
    {
        return $this->nameRu;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPublished()
    {
        return $this->published;


    }

    public function getViewed()
    {
        return $this->viewed;
    }

    public function getContent()
    {
        return $this->description;
    }

    public function getUrl()
    {
        return $this->url;

    }

    public function getVideoType()
    {
        return $this->videoType;
    }

    public function hasMediaCategory()
    {
        return $this->videoType;
    }

    public function getProgram()
    {
        return $this->program;
    }

    public function getProgramName()
    {
        $lc = app()->getlocale();
        $programId = $this->program;
        $programName = \Model\Project\ModelName::where('id','=',$programId)->first();

        if($programName != null){
            $name = $programName->name;
            $nameRu = $programName->nameRu;
            
            if(($lc == 'kg') && ($name != '') ){
                return $name;
            }else{
                return $nameRu;
            }
        } 
        
    }

    public function getDay()
    {
        $fullDate = $this->created_at;
        $day = date('j', strtotime($fullDate));
        return $day;
    }

    public function getTime()
    {
        $fullDate = $this->created_at;
        $time = date('H:i', strtotime($fullDate));
        return $time;
    }

    public function getYear()
    {
        $fullDate = $this->created_at;
        $year = date('Y', strtotime($fullDate));
        return $year;
    }

    public function getMonthKg()
    {
        $fullDate = $this->created_at;
        $MonthKg = date('m', strtotime($fullDate));
        $January = 'үчтун айы';
        $February = 'Бирдин айы';
        $October = 'Тогуздун айы';
        if($MonthKg == 10){
            $MonthKg = $October;
        }
        return $MonthKg;
    }

    public function getMonthRu()
    {
        $fullDate = $this->created_at;
        $MonthRu = date('m', strtotime($fullDate));
        $January = 'үчтун айы';
        $February = 'Бирдин айы';

        $JanuaryRu = 'Янв';
        $FebruaryRu = 'Фев';
        $MarchRu = 'Март';
        $AprilRu = 'Апр';
        $MayRU = 'Май';
        $JuneRU = 'Июнь';
        $JulyRu = 'Июль';
        $AugustRU = 'Авг';
        $SeptemberRU = 'Сент';
        $OctoberRu = 'Окт';
        $NovemberRu = 'Нояб';
        $DecemberRu = 'Дек';

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

    public function getDate()
    {
        $fullDate = $this->created_at;
        $date = date('d-M-Y', strtotime($fullDate));
        return $date;
    }

    public function getDateFormatted()
    {
        $fullDate = $this->created_at;
        $date = date('d.m.Y', strtotime($fullDate));
        return $date;
    }

    public function getAnonsTime1()
    {
        return $this->anonstime1;
    }

    public function getAnonsTime2()
    {
        return $this->anonstime2;
    }
    public function getAnonsTime3()
    {
        return $this->anonstime3;
    }
}
