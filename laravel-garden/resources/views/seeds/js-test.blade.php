@extends('main.index')

@section('content')
<h1>JS-Test</h1>
    <script>

        var message = "Hello World";
        console.log(message);

        var name = "Nick";
        console.log("Hello " + name);
        if (name.length > 7){
            console.log("Wow, you have a Really long name");
        }else{
            console.log("Your name isn't very long");
        }

        var lemonChicken = false;
        var beefWithBlackBean = false;
        var sweetAndSourPork = false;

        if (lemonChicken) {
            console.log("Great! I'm having lemon chicken!");
        }else if (beefWithBlackBean) {
            console.log("I'm having the beef");
        }else if (sweetAndSourPork) {
            console.log("I'm having the pork");
        }else{
            console.log("Well, I guess I'll have rice then")
        }

        var name = "Vlad";
        if (name === "Vlad") {
            console.log("Hello Vlad")
        }else{
            console.log("Hello stranger")
        }

        var sheepCounted = 0;
        while (sheepCounted < 10) {
            console.log("I have counted " + sheepCounted + " sheep!");
                sheepCounted++;
        }
        console.log("Zzzzzzzzz");

        for (var sheepCount = 0; sheepCount < 10; sheepCount++) {
            console.log("I have counted " + sheepCounted + " sheep!")
        }
        console.log("Zzzzzzzzz");

        var timeToSayhello = 3;
        for (var i = 0; i < timeToSayhello; i++ ) {
            console.log("Hello!")
        }

        var animals = ["Lion", "Flamingo", "Polar Bear", "Boa Constrictor"];

        for (var i = 0; i < animals.length; i++) {
            console.log("This zoo contains a " + animals[i] + ".");
        }

        for (var x = 2; x < 10000; x = x * 2) {
            console.log(x);
        }

        for (var x = 3; x < 10000; x = x * 3) {
            console.log(x);
        }

        // var y = 3;
        // while (y < 10000) {
        //     console.log(y = y * 3);
        //     y++;
        // }

        var animals = ["Cat", "Fish", "Lemur", "Komodo Dragon"];

        for (var i = 0; i < animals.length; i++) {
            console.log("Awesome " + animals[i]);
        }

        var alphabet = "ABCDEFGHIKLMNOPQRSTVXYZ"

        var math = Math.floor(Math.random() * alphabet.length)
        console.log(alphabet[math])

        // var randomString = "";
        // while (randomString.length < 6) {
        //     console.log(randomString);
        //     alphabet++;

        // }


        // var input = "javascript is awesome";
        // var output = "";

        // for (var i = 0; i < input.length; i++) {

        // }

    </script>

@endsection
