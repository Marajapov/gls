<?php
namespace Model\PhotoChild;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photoChield';
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

    public function getNameRu()
    {
        return $this->nameRu;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function getDateFormatted()
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }
}
