<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $sensitiveWords = $this->checkSensitiveWords();

        return Validator::make($data, [
            'name' => [
                'required',
                'string',
                'min:5',
                'max:30',
                function ($attribute, $value, $fail) use ($sensitiveWords)
                {
                    foreach ($sensitiveWords as $sensitiveWord)
                    {
                        if (strpos(strtolower($value), strtolower($sensitiveWord)) !== false)
                        {
                            $fail('The ' . $attribute . ' contains sensitive words.');
                        }
                    }
                },
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                function ($attribute, $value, $fail) use ($sensitiveWords)
                {
                    foreach ($sensitiveWords as $sensitiveWord)
                    {
                        if (strpos(strtolower($value), strtolower($sensitiveWord)) !== false)
                        {
                            $fail('The ' . $attribute . ' contains sensitive words.');
                        }
                    }
                },
            ],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:50',
                function ($attribute, $value, $fail) use ($sensitiveWords)
                {
                    foreach ($sensitiveWords as $sensitiveWord)
                    {
                        if (strpos(strtolower($value), strtolower($sensitiveWord)) !== false)
                        {
                            $fail('The ' . $attribute . ' contains sensitive words.');
                        }
                    }
                },
            ],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }


    protected function checkSensitiveWords()
    {
        $path = public_path('sensitiveWords.csv');

        if (File::exists($path))
        {
            $sensitiveWords = [];
            if (($handle = fopen($path, 'r')) !== false)
            {
                while (($data = fgetcsv($handle, 1000, ',')) !== false)
                {
                    $sensitiveWords[] = $data[0]; // Assuming the sensitive words are in the first column of the CSV file
                }
                fclose($handle);
            }
            return $sensitiveWords;
        } else {
            // Return an empty array if the file is not found
            return [];
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
