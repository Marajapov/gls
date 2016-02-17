<?php
namespace Model\Post;

trait ModelHelpers
{
    public function incrementViewed($step = 1)
    {
        $this->viewed += $step;
        $this->save();
    }

    public function isPublished()
    {
        return $this->published == true;
    }

    public function isImage()
    {
        $exists = \Storage::disk('public')->exists($this->getFile());

        $type = $exists ? \Storage::disk('public')->mimeType($this->getFile()) : '';

        return in_array($type, ['image/png', 'image/jpg', 'image/jpeg', 'image/gif']);
    }

    public function isChannelIcon($query)
    {
        $channel = \Model\Channel\ModelName::where('id','=',$query)->first();
        return $channel->file;
    }

    public function relatedFunctionLeft($postId){

        $relatedPost = \Model\Post\ModelName::where('id','=',$postId)->first();

        if($relatedPost->thumbnail_big){
            $thumbnail = $relatedPost->thumbnail_big;
        } else{
            $thumbnail = $relatedPost->thumbnail;
        }

        return '
        <span>
            <aside class="pull-left">
                <div class="topics-box">
                    <div class="topics">
                        <div class="topic clearfix">

                            <a class="t-thumb" href="'. route('front.post', $postId) .'">
                                <img alt="alt photo text" src="'. asset($thumbnail).'">
                            </a>
                            <div class="t-info">
                                <a class="js-dh" href="'. route('front.post', $postId) .'">'.$relatedPost->getTitleRuOrKg() .'</a>
                                <div class="t-extra clearfix">
                                    <div class="t-date">'.$relatedPost->getDay().' '.$relatedPost->getMonthRu().', '.$relatedPost->getYear().'</div>
                                    <div class="t-view"><i class="fa fa-eye"></i>'.$relatedPost->getViewed().'</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </span>
        ';

    }

    public function relatedFunctionRight($postId){

        $relatedPost = \Model\Post\ModelName::where('id','=',$postId)->first();
        if($relatedPost->thumbnail_big){
            $thumbnail = $relatedPost->thumbnail_big;
        } else{
            $thumbnail = $relatedPost->thumbnail;
        }

        return '
        <span>
            <aside class="pull-right">
                <div class="topics-box">
                    <div class="topics">
                        <div class="topic clearfix">
                            <a class="t-thumb" href="'. route('front.post', $postId) .'">
                                <img alt="alt photo text" src="'. asset($thumbnail) .'">
                            </a>
                            <div class="t-info">
                                <a class="js-dh" href="'. route('front.post', $postId) .'">'.$relatedPost->getTitleRuOrKg() .'</a>
                                <div class="t-extra clearfix">
                                    <div class="t-date">'.$relatedPost->getDay().' '.$relatedPost->getMonthRu().', '.$relatedPost->getYear().'</div>
                                    <div class="t-view"><i class="fa fa-eye"></i>'.$relatedPost->getViewed().'</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </span>
        ';

    }

    public function relatedMediaFunctionLeft($media){

        $relatedMedia = \Model\Media\ModelName::where('id','=',$media)->first();

        if($relatedMedia->thumbnail_big){
            return '
                <span>
                    <aside class="pull-left">
                        <div class="topics-box">
                            <div class="topics">
                                <div class="topic clearfix">
                                    <a class="t-thumb" href="'. route('front.media.video', $relatedMedia) .'">
                                        <img alt="alt photo text" src="'. asset($relatedMedia->thumbnail_big) .'">
                                        <div class="overlay">
                                        </div>
                                        <i class="fa-video"></i>
                                    </a>
                                    <div class="t-info clearfix">
                                        <a class="js-dh" href="'. route('front.media.video', $relatedMedia) .'">'.$relatedMedia->getName() .'</a>
                                        <div class="t-extra clearfix">
                                            <div class="t-date">'.$relatedMedia->getDay().' '.$relatedMedia->getMonthRu().', '.$relatedMedia->getYear().'</div>
                                            <div class="t-view"><i class="fa fa-eye"></i>'.$relatedMedia->getViewed().'</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </span>
            ';
        } else {
            return '
                <span>
                    <aside class="pull-left">
                        <div class="topics-box">
                            <div class="topics">
                                <div class="topic clearfix">
                                    <a class="t-thumb" href="'. route('front.media.video', $relatedMedia) .'">
                                        <img src="http://img.youtube.com/vi/'.$relatedMedia->getUrl().'/mqdefault.jpg" alt="'.$relatedMedia->getName().'">
                                        <div class="overlay">
                                        </div>
                                        <i class="fa-video"></i>
                                    </a>
                                    <div class="t-info clearfix">
                                        <a class="js-dh" href="'. route('front.media.video', $relatedMedia) .'">'.$relatedMedia->getName() .'</a>
                                        <div class="t-extra clearfix">
                                        <div class="t-date">'.$relatedMedia->getDay().' '.$relatedMedia->getMonthRu().', '.$relatedMedia->getYear().'</div>
                                        <div class="t-view"><i class="fa fa-eye"></i>'.$relatedMedia->getViewed().'</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </span>
            ';
        }



    }

    public function relatedMediaFunctionRight($media){

        $relatedMedia = \Model\Media\ModelName::where('id','=',$media)->first();

        if($relatedMedia->thumbnail_big){
            return '
                <span>
                    <aside class="pull-right">
                        <div class="topics-box">
                            <div class="topics">
                                <div class="topic clearfix">
                                    <a class="t-thumb" href="'. route('front.media.video', $relatedMedia) .'">
                                        <img alt="alt photo text" src="'. asset($relatedMedia->thumbnail_big) .'">
                                        <div class="overlay">
                                        </div>
                                        <i class="fa-video"></i>
                                    </a>
                                    <div class="t-info clearfix">
                                        <a class="js-dh" href="'. route('front.media.video', $relatedMedia) .'">'.$relatedMedia->getName() .'</a>
                                        <div class="t-extra clearfix">
                                            <div class="t-date">'.$relatedMedia->getDay().' '.$relatedMedia->getMonthRu().', '.$relatedMedia->getYear().'</div>
                                            <div class="t-view"><i class="fa fa-eye"></i>'.$relatedMedia->getViewed().'</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </span>
            ';
        } else {
            return '
                <span>
                    <aside class="pull-right">
                        <div class="topics-box">
                            <div class="topics">
                                <div class="topic clearfix">
                                    <a class="t-thumb" href="'. route('front.media.video', $relatedMedia) .'">
                                        <img src="http://img.youtube.com/vi/'.$relatedMedia->getUrl().'/mqdefault.jpg" alt="'.$relatedMedia->getName().'">
                                        <div class="overlay">
                                        </div>
                                        <i class="fa-video"></i>
                                    </a>
                                    <div class="t-info clearfix">
                                        <a class="js-dh" href="'. route('front.media.video', $relatedMedia) .'">'.$relatedMedia->getName() .'</a>
                                        <div class="t-extra clearfix">
                                        <div class="t-date">'.$relatedMedia->getDay().' '.$relatedMedia->getMonthRu().', '.$relatedMedia->getYear().'</div>
                                        <div class="t-view"><i class="fa fa-eye"></i>'.$relatedMedia->getViewed().'</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </span>
            ';
        }

    }

    public function twoRelatedFunction($postId, $postId2){

        $relatedPost = \Model\Post\ModelName::where('id','=',$postId)->first();
        $relatedPost2 = \Model\Post\ModelName::where('id','=',$postId2)->first();

        return '<div>
        <aside>
                    <div class="topics-box">
                      <h2>'.trans('site.MatpoTeme').'</h2>
                      <div class="topics">
                        <div class="topic clearfix">
                          <div class="t-date">
                                    <span class="date">
                                    <span class="time">'. $relatedPost->getTime() .'</span>
                                      '. $relatedPost->getDay().' '.$relatedPost->getMonthRu().', '.$relatedPost->getYear().'
                                    </span>
                          </div>
                          <a class="t-thumb" href="'. route('front.post', $postId) .'">
                            <img alt="alt photo text" src="'. asset($relatedPost->getFile()) .'">
                          </a>
                          <div class="t-info">
                              <a class="js-dh" href="'. route('front.post', $postId).'">'.$relatedPost->getTitleRuOrKg().'</a>
                          </div>
                        </div>
                        <div class="topic clearfix">
                          <div class="t-date">
                                    <span class="date">
                                    <span class="time">'. $relatedPost2->getTime() .'</span>
                                      '. $relatedPost2->getDay().' '.$relatedPost2->getMonthRu().', '.$relatedPost2->getYear().'
                                    </span>
                          </div>
                          <a class="t-thumb" href="'. route('front.post', $postId) .'">
                            <img alt="alt photo text" src="'. asset($relatedPost2->getFile()) .'">
                          </a>
                          <div class="t-info">
                              <a class="js-dh" href="'. route('front.post', $postId).'">'.$relatedPost2->getTitleRuOrKg().'</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </aside></div>
        ';

    }
}
