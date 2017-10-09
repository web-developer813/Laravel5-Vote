@extends('layout')
@section('body')
    <div class="content home">
        <div class="state-header home">
            <h1 class='title count-me-in'>Count Me In</h1> <br/><br/>
            <p>Hello, It looks like you're not in the US. You might not be able to vote, but you can still make a difference. Explore, learn, and share with your American friends. This November's election affects all of us around the world.</p>
            <br/>
            <div class="share">
                <p>Share</p><div class="clear"></div>
                <a href="#" class="button twitter"><img class="twitter" src="img/twitter.png" alt="Share on Twitter"></a>
                <a href="#" class="button facebook"><img class="facebook" src="img/facebook.png" alt="Share on Facebook"></a>
                <a href="#" class="button linkedin">	<img class="linkedin" src="img/linkedin.png" alt="Share on Linkedin"></a>
            </div>

            <br/><br/><br/>

            <h1>What's one vote really worth?</h1>
            <h2>Select a state to see how the numbers add up. </h2>

        </div>

        <div class='state-list'>
            @foreach($states as $key =>$state)
                <div class='state-option'>
                    <a href='{{URL::route('state', $state->state)}}'>
                        <div class='state-image' style='background-image: url( img/states/{{$state->state_abr.".png"}})'> </div> <br/>
                        <div class='state-name'> {{$state->state_abr}} </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop