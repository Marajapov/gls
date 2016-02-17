<?php
namespace Model\Schedule;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers,ModelRelationships, ModelScopes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedules';
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

    public function getName()
    {
        return $this->name;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDay()
    {
        $fullDate = $this->date;
        $day = date('j', strtotime($fullDate));

        return $day;
    }

    public function getWeekRuFull()
    {
        $fullDate = $this->date;
        $week = date('N', strtotime($fullDate));

        $MondayRu = 'Понедельник';
        $TuesdayRu = 'Вторник';
        $WednesdayRu = 'Среда';
        $ThursdayRu = 'Четверг';
        $FridayRu = 'Пятница';
        $SaturdayRu = 'Суббота';
        $SundayRu = 'Воскресенье';

        if($week == 1){
            $week = $MondayRu;
        }elseif($week == 2){
            $week = $TuesdayRu;
        }elseif($week == 3){
            $week = $WednesdayRu;
        }elseif($week == 4){
            $week = $ThursdayRu;
        }elseif($week == 5){
            $week = $FridayRu;
        }elseif($week == 6){
            $week = $SaturdayRu;
        }elseif($week == 7){
            $week = $SundayRu;
        }

        return $week;
    }

    public function getWeekRu()
    {
        $fullDate = $this->date;
        $week = date('N', strtotime($fullDate));

        $MondayRu = 'Пн';
        $TuesdayRu = 'Вт';
        $WednesdayRu = 'Ср';
        $ThursdayRu = 'Чт';
        $FridayRu = 'Пт';
        $SaturdayRu = 'Сб';
        $SundayRu = 'Вс';

        if($week == 1){
            $week = $MondayRu;
        }elseif($week == 2){
            $week = $TuesdayRu;
        }elseif($week == 3){
            $week = $WednesdayRu;
        }elseif($week == 4){
            $week = $ThursdayRu;
        }elseif($week == 5){
            $week = $FridayRu;
        }elseif($week == 6){
            $week = $SaturdayRu;
        }elseif($week == 7){
            $week = $SundayRu;
        }

        return $week;
    }

    public function getWeekKgFull()
    {
        $fullDate = $this->date;
        $week = date('N', strtotime($fullDate));

        $MondayRu = 'Дүйшөмбү';
        $TuesdayRu = 'Шейшемби';
        $WednesdayRu = 'Шаршемби';
        $ThursdayRu = 'Бейшемби';
        $FridayRu = 'Жума';
        $SaturdayRu = 'Ишемби';
        $SundayRu = 'Жекшемби';

        if($week == 1){
            $week = $MondayRu;
        }elseif($week == 2){
            $week = $TuesdayRu;
        }elseif($week == 3){
            $week = $WednesdayRu;
        }elseif($week == 4){
            $week = $ThursdayRu;
        }elseif($week == 5){
            $week = $FridayRu;
        }elseif($week == 6){
            $week = $SaturdayRu;
        }elseif($week == 7){
            $week = $SundayRu;
        }

        return $week;
    }

    public function getWeekKg()
    {
        $fullDate = $this->date;
        $week = date('N', strtotime($fullDate));

        $MondayRu = 'Дб';
        $TuesdayRu = 'Шб';
        $WednesdayRu = 'Шр';
        $ThursdayRu = 'Бш';
        $FridayRu = 'Жм';
        $SaturdayRu = 'Иш';
        $SundayRu = 'Жш';

        if($week == 1){
            $week = $MondayRu;
        }elseif($week == 2){
            $week = $TuesdayRu;
        }elseif($week == 3){
            $week = $WednesdayRu;
        }elseif($week == 4){
            $week = $ThursdayRu;
        }elseif($week == 5){
            $week = $FridayRu;
        }elseif($week == 6){
            $week = $SaturdayRu;
        }elseif($week == 7){
            $week = $SundayRu;
        }

        return $week;
    }

    public function getDays()
    {

    }

    public function getMonth()
    {
        $fullDate = $this->date;
        $MonthRu = date('m', strtotime($fullDate));

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

    public function getMonthFull()
    {
        $fullDate = $this->date;
        $MonthRu = date('m', strtotime($fullDate));

        $JanuaryRu = 'Январь';
        $FebruaryRu = 'Февраль';
        $MarchRu = 'Март';
        $AprilRu = 'Апрель';
        $MayRU = 'Май';
        $JuneRU = 'Июнь';
        $JulyRu = 'Июль';
        $AugustRU = 'Август';
        $SeptemberRU = 'Сентябрь';
        $OctoberRu = 'Октябрь';
        $NovemberRu = 'Ноябрь';
        $DecemberRu = 'Декабрь';

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

    public function getProgram()
    {
        return $this->program;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getPublished()
    {
        return $this->published;
    }
}
