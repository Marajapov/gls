<?php
namespace Model\Channel;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships, ModelScopes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'channels';
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
        return $this->name;
    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function getNameOne()
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $this->name;
        } else {
            return $this->display;
        }
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getFile()
    {
        return $this->file;
    }

}
