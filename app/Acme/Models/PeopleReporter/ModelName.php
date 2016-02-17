<?php
namespace Model\PeopleReporter;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships, ModelScopes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people_reporter';
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

    public function getPublished()
    {
        return $this->published;
    }

    public function getViewed()
    {
        return $this->viewed;
    }

    public function getFile()
    {
        return $this->thumnbnail;

    }

    public function getContent()
    {
        return $this->content;
    }

    public function getContentRu()
    {
        return $this->contentRu;
    }

    public function getDateFormatted()
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }

}
