<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    use HelperTrait;

    public function feedback(Request $request)
    {
        $data = $request->validate(['phone' => $this->validationPhone]);
        Mail::to(env('MAIL_TO'))->send(new FeedbackForm($data));
        $message = 'Мы обязательно свяжимся с Вами в самое ближайшее время!';
        return $request->ajax()
            ? response()->json(['success' => true, 'message' => $message])
            : redirect()->back()->with('message', $message);
    }
}
