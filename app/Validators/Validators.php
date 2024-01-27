<?php

namespace App\Validators;
use App\Form;
use App\User;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Validators
{

    public $messages = [
        'required' => 'Поля обязательно для заполнение',
        'email'    => 'E-mail',
        'max:255'  => 'Максимальная кольчество символов 255',
        'integer'  => 'Integer',
        'mimes'    => 'Разрешенные типы файлов: :values',
        'max'      => 'Максимальное значение :max',
        'image'    => 'Полья только для изображений',
        'date'     => 'Полья только для даты',
        'min'      => 'Минимальное количество символов :min',
        'exist'    => 'ddd',
    ];

    public function users($request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'username'     => 'required|string|max:255',
            'role'     => 'required|integer',
            'email'    => 'nullable|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ], $this->messages);

        return $this->checkEmailToDublicate($validator, $request, 'Пользователь с таким E-mail ом уже существует');
    }

    public function users_update($request)
    {
        return Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'username'     => 'required|string|max:255',
            'role'     => 'required|integer',
            'email'    => 'string|email|max:255',
            'password' => 'nullable|min:6|confirmed',
        ], $this->messages);
    }

    public function checkEmailToDublicate($validator, $request, $message)
    {
        if ($request->email) {
            $email = $request->email;
            $user = User::where('email',$email)->first();
            if ($user) {
                $validator->getMessageBag()->add('email', $message);
            }
        }
        return $validator;
    }

    public function roles($request)
    {
        return Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'display_name' => 'nullable|string|max:255',
            'description'  => 'nullable|string',
        ], $this->messages);
    }

    public function programs($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function programs_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function pages($request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'name'         => 'nullable|string|max:255',
            'content' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'status'      => 'required|integer',
        ], $this->messages);

        return $this->checkPageNameToDublicate($validator, $request);

    }

    public function checkPageNameToDublicate($validator, $request)
    {
        if ($request->name) {
            $name = $request->name;
            $page = Page::where('name',$name)->first();
            if ($page) {
                $validator->getMessageBag()->add('name', 'Страница с таким Названием для урла уже существует');
            }
        }
        return $validator;
    }

    public function publications($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'date'        => 'nullable|date',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function publications_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'date'        => 'nullable|date',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function newssubjects($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
        ], $this->messages);
    }

    public function news($request)
    {
        return Validator::make($request->all(), [
            // 'subject_id' => 'required|integer',
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'status'        => 'required|integer',
            'category_id'   => 'required|integer',
            'tag.*'         => 'exists:tags,id',
        ], $this->messages);
    }

    public function news_update($request)
    {
        return Validator::make($request->all(), [
//            'subject_id' => 'required|integer',
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'status'        => 'required|integer',
            'category_id'   => 'required|integer',
            'tag.*'         => 'exists:tags,id',
        ], $this->messages);
    }
    public function activities($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'body'          => 'required|string',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function activities_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'body'          => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'        => 'required|integer',
        ], $this->messages);
    }
    public function categories($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function categories_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'status'        => 'required|integer',
        ], $this->messages);
    }
    public function tags($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function tags_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function menu($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'name'         => 'required|string|max:255',
        ], $this->messages);
    }

    public function menuitem($request)
    {
        return Validator::make($request->all(), [
            'parent_id'         => 'nullable|string|max:255',
            'title'         => 'required|string|max:255',
            'url'         => 'required|string|max:255',
            'order'         => 'required|integer',
        ], $this->messages);
    }

    public function options($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'name'         => 'nullable|string',
        ], $this->messages);
    }

    public function textblocks($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'name'         => 'nullable|string|max:255',
            'content'         => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function photos($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function photos_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function videos($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'content'        => 'required|string',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function videos_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'content'        => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function employees($request)
    {
        return Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'description'        => 'nullable|string',
            'position'         => 'required|string|max:255',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], $this->messages);
    }

    public function employees_update($request)
    {
        return Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'description'        => 'nullable|string',
            'position'         => 'required|string|max:255',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], $this->messages);
    }

    public function social_networks($request)
    {
        return Validator::make($request->all(), [
            'url'        => 'required|string',
            'title'         => 'nullable|string|max:255',
            'icon'            => 'required',
        ], $this->messages);
    }

    public function social_networks_update($request)
    {
        return Validator::make($request->all(), [
            'url'        => 'required|string',
            'title'         => 'nullable|string|max:255',
        ], $this->messages);
    }

    public function subscriber($request)
    {
        return Validator::make($request->all(), [
            'email'    => 'required|string|email|max:255',
        ]);
    }

    public function dispatch($request)
    {
        return Validator::make($request->all(), [
            'subject'         => 'required|string|max:255',
            'content'         => 'required|string',
        ], $this->messages);
    }

    public function banners($request)
    {
        return Validator::make($request->all(), [
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'url'              => 'required|string|max:255',
        ], $this->messages);
    }

    public function albums($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width:360,max_height:360',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function albums_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width:360,max_height:360',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function image($request)
    {
        return Validator::make($request->all(), [
            'albums_id'  => 'required|numeric|exists:albums,id',
            'image'      => 'required|image',
        ], $this->messages);
    }

    public function image_update($request)
    {
        return Validator::make($request->all(), [
            'albums_id'  => 'required|numeric|exists:albums,id',
            'image'      => 'nullable|image',
        ], $this->messages);
    }
    public function image_move($request)
    {
        return Validator::make($request->all(), [
            'id'         => 'required|numeric|exists:images,id',
            'albums_id'  => 'required|numeric|exists:albums,id',
        ], $this->messages);
    }

    public function blocks(Request $request)
    {
        return Validator::make($request->all(), [
            'type'          => 'required|integer',
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:255',
            'content'       => 'required|string',
            'order'         => 'nullable|integer',
            'status'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], $this->messages);
    }

    public function blocks_update(Request $request)
    {
        return Validator::make($request->all(), [
            'type'          => 'required|integer',
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:255',
            'content'       => 'required|string',
            'order'         => 'nullable|integer',
            'status'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], $this->messages);
    }

    public function contact_submit(Request $request)
    {
        return Validator::make($request->all(), [
            'name'                  => 'required|string|min:3|max:254',
            'email'                 => 'required|email|max:254',
            // 'subject'               => 'required|string|min:3|max:254',
            // 'message'               => 'required|string|min:3|max:512',
            // 'surname'               => 'string|min:3|max:254',
            // 'tel_num'                 => 'required|string|min:3|max:20',
            // 'birthday'                 => 'required|date',
            // 'address'               => 'required|string|min:3|max:254',
            // 'country_city'               => 'required|string|min:3|max:254',
            // 'country_residence'               => 'required|string|min:3|max:254',
            // 'social_media_account'               => 'required|string|min:3|max:254',
            // 'educational'               => 'required|string|min:3|max:254',
            // 'failOf_studies'               => 'required|string|min:3|max:254',

            //  'yearOfStudies'               => 'required|string|min:3|max:254',
            //  'will_you_still'               => 'required|string|min:3|max:254',
            //  'expected_year_graduation'               => 'required|string|min:3|max:254',
            //  'can_you_be_fully'               => 'required|string|min:3|max:254',
            //  'english_level'               => 'required|string',
            //  'level_of_italian'               => 'required|string',
            //  'other_languages'               => 'required|string|min:3|max:254',
            //  'about_you_eng'               => 'required|string|min:3|max:254',
            //  'citizen'               => 'required|string|min:3|max:254',
           'g-recaptcha-response'  => 'required|captcha',
        ], $this->messages);
    }

///dfcgbvhnbm,dcxfcgbvbndvfbn
    public function contact_form(Request $request)
    {
        return Validator::make($request->all(), [
            'name'                  => 'required|string|min:3|max:254',
            'email'                 => 'required|email|max:254',
            'surname'               => 'required|string|min:3|max:254',
            'phone'                 => 'required|string|min:3|max:20',
            'birthday'                 => 'required|date',
            'address'               => 'required|string|min:3|max:254',
            'country_city'               => 'required|string|min:3|max:254',
            'country_residence'               => 'required|string|min:3|max:254',
            'social_media_account'               => 'required|string|min:3|max:254',
            'educational'               => 'required|string|min:1|max:254',
            'failOf_studies'               => 'required|string|min:1|max:254',
             'yearOfStudies'               => 'required|string|min:1|max:254',
             'will_you_still'               => 'string',
             'expected_year_graduation'               => 'required|string|min:1|max:254',
             'can_you_be_fully'               => 'required|string',
             'english_level'               => 'string',
             'level_of_italian'               => 'string',
             'other_languages'               => 'string',
             'about_you_eng'               => 'required|string|min:1|max:100',
             'Citizenship'               => 'required|string',

        ], $this->messages);
    }
}

