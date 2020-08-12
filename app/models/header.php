<?php

/**
 * @var array $header associative array, 
 * data to generete header, includs by Controller->before()
 */
$header = [
      'home' => [
            'title' => 'Hello world!',
            'subtitle' => "Simple implementaion MVC App based on 
            <a href='https://www.youtube.com/watch?v=pQG_jgttwps'>MVC</a>. 
            <a href='https://github.com/wojciechgawronski/mvc_php'>See code on GitHub</a></p>"
      ],
      'posts' => [
            'title' => 'Posts',
            'subtitle' => '&rarr;'
      ],
      'info' => [
            'title' => 'Info',
            'subtitle' => 'How to separate View and Model by Controller ↓'
      ],
      'contact' => [
            'title' => 'Contact',
            'subtitle' => "<span class='orange'>&darr;</span>"
      ],

      'log_in' => [
            'title' => "Log In",
            'subtitle' => "Zaloguj się<span class='orange'>&darr;</span>"
      ],

      'sign_in' => [
            'title' => "Sign In",
            'subtitle' => "Zaloguj się<span class='orange'>&darr;</span>"
      ]
];