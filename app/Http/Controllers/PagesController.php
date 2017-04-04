<?php

namespace App\Http\Controllers;

use App\Post;

use Mail;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function getIndex()
	{
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('Pages/welcome')->withPosts($posts);
	}

	public function getAbout()
	{
		$first = 'Alex';
		$last = 'Giri';

		$fullname = $first . "" . $last;
		$email = 'salin.giri77@gmail.com';
		$number = '9818310674';
		return view('Pages.about')->withFullname($fullname)->with("email", $email)->withNumber($number);
	}

	public function getContact(){
	    return view('Pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'email'=>'required|email',
            'message'=>'min:10',
            'subject'=>'min:3',
        ));
        $data =array(
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message,

        );
        Mail::send('emails.contact',$data,function($message) use($data){
            $message->from($data['email']);
            $message->to('salin.giri77@yahoo.com');
            $message->subject($data['subject']);
        });

        Session::flash('status','Your Email was sent !');
        return back();
    }
}
