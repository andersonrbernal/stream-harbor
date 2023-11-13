<?php

return [
    "title"=> "Stream Harbor",
    "form_title" => "Create Account",
    "attributes" => [
        "name" => "name",
        "email" => "email",
        "password" => "password",
        "password_confirmation" => "password confirmation",
        "country_id" => "country",
    ],
    "name_input" => [
        "label" => "Full Name",
        "placeholder" => "Your Name",
    ],
    "email_input" => [
        "label" => "Your Email",
        "placeholder" => "Email Address",
    ],
    "password_input" => [
        "label" => "Password",
        "placeholder" => "********",
    ],
    "password_confirmation_input" => [
        "label" => "Confirm Password",
        "placeholder" => "********",
    ],
    "country" => [
        "label" => "Country",
        "placeholder" => "Select a country",
    ],
    "form_button" => 'Submit',
    'form_error' => 'Something went wrong. Please, try again later.',
    'form_footer' => [
        'already_have_an_account' => 'Already have an account?',
        'login_here' => 'Login Here',
    ]
];
