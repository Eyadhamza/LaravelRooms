<?php

use \Faker\Generator;
use TheProfessor\Laravelchatchannels\Models\Channel;
use TheProfessor\Laravelchatchannels\Models\Message;
use TheProfessor\Laravelchatchannels\Models\Participant;


/* @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Message::class, function (Generator $faker) {
    return [
        'body'=>'body of the message',
        'sender_id'=>factory(Participant::class)
    ];
});