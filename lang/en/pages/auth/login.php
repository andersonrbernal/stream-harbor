<?php

return [
    "title" => "Stream Harbor",
    "form_title" => "Sign in",
    "attributes" => [
        "email" => "email",
        "password" => "password",
        'remember_me' => 'remember_me',
    ],
    "email_input" => [
        "label" => "Your Email",
        "placeholder" => "Email Address",
    ],
    "password_input" => [
        "label" => "Password",
        "placeholder" => "********",
    ],
    "remember_me_input" => [
        "label" => "Remember me",
    ],
    "form_button" => 'Sign in',
    'form_error' => [
        'credentials_error' => 'Incorrect email or password.',
    ],
    'form_footer' => [
        'does_not_have_an_account' => 'Already have an account?',
        'sign_up_here' => 'Sign up here',
    ],
];
