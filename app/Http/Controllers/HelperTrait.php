<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

trait HelperTrait
{
    private $cacheTime = 60*60*24*365;
    private $validationPhone = 'regex:/^((\+)?(\d)(\s)?(\()?[0-9]{3}(\))?(\s)?([0-9]{3})(\-)?([0-9]{2})(\-)?([0-9]{2}))$/';
    private $validationFeedback = [
        'organization_name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'phone' => 'max:2000',
        'i_agree' => 'required|accepted'
    ];
    public $validationString = 'required|min:3|max:255';
    public $validationSmallString = 'required|min:3|max:100';
    public $validationText = 'required|min:5|max:1200';
//    public $validationColor = 'regex:/^(hsv\((\d+)\,\s(\d+)\%\,\s(\d+)\%\))$/';
    public $validationSvg = 'mimes:svg|max:10';
    public $validationDoc = 'mimes:pdf|max:10000';
    public $validationJpg = 'mimes:jpg|max:2000';
    public $validationDate = 'regex:/^(\d{2})\/(\d{2})\/(\d{4})$/';

    private $metas = [
        'meta_description' => ['name' => 'description', 'property' => false],
        'meta_keywords' => ['name' => 'keywords', 'property' => false],
        'meta_twitter_card' => ['name' => 'twitter:card', 'property' => false],
        'meta_twitter_size' => ['name' => 'twitter:size', 'property' => false],
        'meta_twitter_creator' => ['name' => 'twitter:creator', 'property' => false],
        'meta_og_url' => ['name' => false, 'property' => 'og:url'],
        'meta_og_type' => ['name' => false, 'property' => 'og:type'],
        'meta_og_title' => ['name' => false, 'property' => 'og:title'],
        'meta_og_description' => ['name' => false, 'property' => 'og:description'],
        'meta_og_image' => ['name' => false, 'property' => 'og:image'],
        'meta_robots' => ['name' => 'robots', 'property' => false],
        'meta_googlebot' => ['name' => 'googlebot', 'property' => false],
        'meta_google_site_verification' => ['name' => 'robots', 'property' => false],
    ];

    public function saveCompleteMessage()
    {
        session()->flash('message', trans('content.save_complete'));
    }

    public function sinceYear($year)
    {
        $endYears = (int)substr($year,-1);
        if (!$endYears || ($endYears >= 5 && $endYears <= 9)) return $year.' лет';
        elseif ($endYears >= 2 && $endYears <= 4) return $year.' года';
        else return $year.' год';
    }

    public function processingFile(Request $request, $field, $path, $newFileName)
    {
//        $fileName = $request->file($field)->getClientOriginalName();
        $request->file($field)->move(base_path('public/'.$path.'/'), $newFileName);
    }

    private function convertTime($time)
    {
        $time = explode('/', $time);
        return strtotime($time[1].'/'.$time[0].'/'.$time[2]);
    }

    private function getBool($fieldName, Model $model)
    {
        return array_search($fieldName,$model->getFillable()) !== false ? 1 : 0;
    }

//    private function sendMessage($template, array $fields, $pathToFile=null, $copyTo=null)
//    {
//        $title = trans('content.company_name');
//        $fields['title'] = $title;
//        Mail::send('emails.'.$template, $fields, function($message) use ($title, $pathToFile, $copyTo) {
//            $message->subject(trans('content.message_from',['from' => $title]));
//            $message->to(env('MAIL_TO'));
//            if ($copyTo) $message->cc($copyTo);
//            if ($pathToFile) $message->attach($pathToFile);
//        });
//    }
}