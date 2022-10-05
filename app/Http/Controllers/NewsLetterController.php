<?php

namespace App\Http\Controllers;

use App\Services\NewsLetter;
use Illuminate\Validation\ValidationException;


class NewsLetterController extends Controller
{
    public function __invoke(NewsLetter $newsletter)
    {
        request()->validate([
          'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'The email could not be added to our newsletter'
            ]);
        }

        return redirect('/')->with('success', 'You are now subscribed to our newsletter');
    }
}
