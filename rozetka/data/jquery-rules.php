<?php 

$jquery_rules = [
    [
        'title' => '.addClass()',
        'description' => 'Adds the specified class(es) to each element in the set of matched elements.',
        'example' => '$( "p" ).addClass( "myClass yourClass" );',
    ],
    [
        'title' => '.removeClass()',
        'description' => 'Remove a single class or multiple classes from each element in the set of matched elements.',
        'example' => '$( "p" ).removeClass( "myClass noClass" ).addClass( "yourClass" );',
        
    ],
    [
        'title' => '.hasClass()',
        'description' => 'Determine whether any of the matched elements are assigned the given class.',
        'example' => '$( "#mydiv" ).hasClass( "foo" )',
    ],
    [
        'title' => '.val([string])',
        'description' => 'Get the current value of the first element in the set of matched elements.',
        'example' => '// Get the value from the selected option in a dropdown
        $( "select#foo option:checked" ).val();
         
        // Get the value from a dropdown select directly
        $( "select#foo" ).val();
         
        // Get the value from a checked checkbox
        $( "input[type=checkbox][name=bar]:checked" ).val();
         
        // Get the value from a set of radio buttons
        $( "input[type=radio][name=baz]:checked" ).val();',
    ],
    [
        'title' => 'jQuery.post()',
        'description' => 'Send data to the server using a HTTP POST request.',
        'example' => '$.post( "ajax/test.html", function( data ) {
            $( ".result" ).html( data );
          });',
    ],
    [
        'title' => 'jQuery.trim()',
        'description' => 'Remove the whitespace from the beginning and end of a string.',
        'example' => '$.trim("    hello, how are you?    ");',
    ],
    [
        'title' => 'jQuery.append()',
        'description' => 'Insert content, specified by the parameter, to the end of each element in the set of matched elements.',
        'example' => '$( ".inner" ).append( "<p>Test</p>" );
        $( ".container" ).append( $( "h2" ) );',
    ],
    [
        'title' => 'jQuery.click()',
        'description' => 'Bind an event handler to the "click" JavaScript event, or trigger that event on an element.',
        'example' => '$( "#target" ).click(function() {
            alert( "Handler for .click() called." );
          });
          $( "#other" ).click(function() {
            $( "#target" ).click();
          });',
    ],
    [
        'title' => 'jQuery.keyup()',
        'description' => 'Bind an event handler to the "keyup" JavaScript event, or trigger that event on an element.',
        'example' => '$( "#target" ).keyup(function() {
            alert( "Handler for .keyup() called." );
          });
          $( "#other" ).click(function() {
            $( "#target" ).keyup();
          });',
    ],
];