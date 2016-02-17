<?php
namespace Front\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail as Mail;
use \Model\Comment\ModelName as Comment;

class CommentController extends Controller
{
    public function __construct()
    {
    }


    public function store(Request $request)
    {
        $data = array(
            'secret' => '6LcBGBUTAAAAAIMMSwe-ebmOhgMO3c-vmXn_Yyfb',
            'response' => $_POST['g-recaptcha-response']
        );
        # Create a connection
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);

        if(!$response)
        {
            Comment::create($request->except('g-recaptcha-response','q'));

            return redirect()->route('front.post',$request->resourceId)->with('success','true');
        }
        else
        {
            return redirect()->route('front.post',$request->resourceId)->with('success','false');
        }

    }

    public function orphus(Request $request)
    {
//        dd(Input::get('message'));
        $text = Input::get('message');

        $part1 = preg_split('/[\r\n****]+/', $text, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $part2 = preg_split('/[\r\n####]+/', $part1[1], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $mistake = $part2[0];
//        dd($mistake);

        Mail::send('Front::message',
            array(
                'url' => Input::get('url'),
                'part1' => $part1[0],
                'part2' => $part2[1],
                'mistake' => $mistake,

            ),
            function($message)
            {
                $message->to('ktrksite@gmail.com', 'KTRK.KG')->subject('Ошибка в материале '.Input::get('url'));
//                $message->to('kendirbaev.aibek@gmail.com', 'Aibek Kendirbaev')->subject('Ошибка в материале '.Input::get('url'));
                $message->from('ktrkkg@yandex.ru', 'KTRK.KG - Общественная Телерадиовещательная корпорация Кыргызской Республики');
            }
        );

        return redirect()->route('front.post',$request->postId)->with('send','true');
    }

}
