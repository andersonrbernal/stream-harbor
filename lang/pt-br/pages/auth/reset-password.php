<?php

return [
    'title' => 'Redefinir Senha',
    'description' => 'Por favor, insira uma nova senha que seja diferente da sua senha anterior para garantir a segurança da sua conta. Lembre-se de que uma senha forte contém uma combinação de letras, números e símbolos.',
    'attributes' => [
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
    ],
    'password_input' => [
        'label' => 'Senha',
        'placeholder' => '********',
    ],
    'password_confirmation_input' => [
        'label' => 'Confirmação de Senha',
        'placeholder' => '********',
    ],
    'messages' => [
        'success' => 'Sua senha foi redefinida com sucesso.',
        'error' => 'Algo deu errado. Por favor, tente novamente.',
        'same_password' => 'Sua nova senha não pode ser igual à sua senha atual.',
    ],
    'submit_button' => 'Redefinir Senha',
    'go_to_login_link' => 'Ir para o Login',
    'register_link' => 'Registrar',
];
