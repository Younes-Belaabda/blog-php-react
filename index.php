<?php

    use App\Models\User;

    require_once __DIR__ . '/vendor/autoload.php';

    User::create([
        'name' => 'Younes Belaabda',
        'email' => 'belaabda.youness@gmail.com',
    ]);

    print_r(User::all());

