<?php

return [
    'title' => 'Reset Password',
    'description' => 'Please enter a new password that is different from your previous password to ensure the security of your account. Remember that a strong password contains a combination of letters, numbers, and symbols.',
    'attributes' => [
        'password' => 'password',
        'password_confirmation' => 'password confirmation',
    ],
    'password_input' => [
        'label' => 'Password',
        'placeholder' => '********',
    ],
    'password_confirmation_input' => [
        'label' => 'Password Confirmation',
        'placeholder' => '********',
    ],
    'messages' => [
        'success' => 'Your password has been reset successfully.',
        'error' => 'Something went wrong. Please try again.',
        'same_password' => 'Your new password cannot be the same as your current password.',
    ],
    'submit_button' => 'Reset Password',
    'go_to_login_link' => 'Go to Login',
    'register_link' => 'Register',
];
