<?php

return [
    "form_title" => "Criar Conta",
    "attributes" => [
        "name" => "nome",
        "email" => "e-mail",
        "password" => "senha",
        "password_confirmation" => "confirmação de senha",
        "country_id" => "país",
        "profile_photo" => "foto de perfil",
    ],
    "name_input" => [
        "label" => "Nome Completo",
        "placeholder" => "Seu Nome",
    ],
    "email_input" => [
        "label" => "Seu E-mail",
        "placeholder" => "Endereço de E-mail",
    ],
    "password_input" => [
        "label" => "Senha",
        "placeholder" => "********",
    ],
    "password_confirmation_input" => [
        "label" => "Confirmar Senha",
        "placeholder" => "********",
    ],
    "profile_photo_input" => [
        "label" => "Foto de Perfil",
        "placeholder" => "Selecione uma foto",
        "description" => "A foto deve estar no formato :values e não pode ser maior que 1MB.",
    ],
    "country" => [
        "label" => "País",
        "placeholder" => "Selecione um país",
    ],
    "form_button" => 'Enviar',
    'form_error' => 'Algo deu errado. Por favor, tente mais tarde.',
    'form_footer' => [
        'already_have_an_account' => 'Já possui uma conta?',
        'login_here' => 'Faça Login Aqui',
    ]
];
