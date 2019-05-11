<?php
/*
Plugin Name: Hello, Flocka
Plugin URI: https://jonathanjanssens.com
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in words sung by Waka Flocka Flame.
Author: Jonathan Janssens
Version: 1.0
Author URI: https://jonathanjanssens.com
*/

function hello_flocka_get_lyric() {
    $lyrics = [
        // 50k - Waka Flocka Flame feat. Gucci Mane
        "Aiming at your top, bust you cantaloupe",
        "How the fuck you ballin' with a car note?",
        "I got weed, I got mollies, what you tryin' to spend?",
        "I'm a get money nigga, don’t use the card, or keep a tab",
        "Thumbing through the bands I be playing with a check",
        "My girl hopped out ass fat",
        "Never be a broke nigga",
        // Grove St. Party - Waka Flocka Flame
        "I got a whole lot of money, bitches count it for me",
        "My bread just start a riot, the girls get excited",
        "Broke two years ago, now I'm worth a million",
        "I'm rolling like a motherfucker, I'ma roll out in this motherfucker",
        "You know how we ball, all I know is ball",
        // Death of Me - Waka Flocka Flame
        "Be a billionaire, that’s my motherfucking destiny",
        "I got my hat cocked, hoodie on, gun cocked, seat back",
        "Dark tints, hanging out the window, nigga eat that",
        "Million dollar seen that, money ain’t shit to me",
        "Victory, tweeking off that ecstasy, vision me",
        "Lambo's, Ferrari's, low key, diamonds make you notice me",
        "Never make another excuse this motherfucking year",
        "I'ma be fighting murder like Gucci Mane",
        "Couple mil, on our grind for it",
        "Flocka, Waka, Flocka, Waka, Waka, Flocka, Flocka, yeah",
    ];

    return wptexturize($lyrics[array_rand($lyrics)]);
}

// This just echoes the chosen line, we'll position it later
function hello_flocka() {
    $chosen = hello_flocka_get_lyric();
    echo "<p id='flocka'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_flocka' );

// We need some CSS to position the paragraph
function flocka_css() {
    $x = is_rtl() ? 'left' : 'right';

    echo "
	<style type='text/css'>
	#flocka {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'flocka_css' );
