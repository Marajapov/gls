<?php
namespace Model\PhotoParent;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photoParent';
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

    public function getName()
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $this->name;    
        }else{
            return $this->nameRu;
        }
    }

    public function getNameKg()
    {
        return $this->name;
    }

    public function getNameRu()
    {
        return $this->nameRu;
    }

    public function getDescription()
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $this->description;    
        }else{
            return $this->descriptionRu;
        }
    }

    public function getDescriptionKg()
    {
        return $this->description;    
    }

    public function getDescriptionRu()
    {
        return $this->descriptionRu;        
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getThumbnail()
    {
        return $this->status;
    }

    public function getLocation()
    {
        $result = '';
        if($this->extracolumn == '1') $result .= trans('site.AdminHomeTitle');
        if($this->ns == '1') $result .= ', '.trans('site.BaikoochuKenesh');
        if($this->rs == '1') $result .= ', '.trans('site.RedKenesh');
        if($this->director == '1') $result .= ', Ген.директор';
        if($this->muzkanal == '1') $result .= ', Музыка';
        if($this->kyrgyzradio == '1') $result .= ', Кыргыз радио';
        if($this->birinchi == '1') $result .= ', Биринчи радио';
        if($this->balastan == '1') $result .= ', Баластан';
        if($this->madaniyat == '1') $result .= ', Маданият';
        if($this->minkiyal == '1') $result .= ', Мин кыял';

        return $result;

    }

    public function getDay()
    {
        $fullDate = $this->created_at;
        $day = date('j', strtotime($fullDate));
        return $day;
    }

    public function getMonthRu()
    {
        $fullDate = $this->created_at;
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

    public function getTime()
    {
        $fullDate = $this->created_at;
        $time = date('G:i', strtotime($fullDate));
        return $time;
    }

    public function getDateFormatted()
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }


}
