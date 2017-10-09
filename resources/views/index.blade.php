@extends('layout')
   @section('body')
       @if ($country == "United States")
           @if(count($state_result) >0)
               <?php $abr = $state_result->state_abr; ?>
           @else
           @endif
           <div class="content home">
               <div class="state-header home">
                   <h1 class='title count-me-in'>Count Me In</h1>
                   <h2 class='home'> What's one vote really worth? Let's find out. </h2>
                    {!! "<div class='state-image' style='background-image: url( img/states/". $abr .".png )'> </div>" !!}
                    <div class='swing-copy'><p style='margin-bottom: 0px;'>It looks like you're in {!! $state  !!}</p>
                        <p style='margin-bottom: 0px;'> Are you registered to vote in {!! $abr !!} ?</p></div> <br/>
                        <div class='buttons'>
                            <a class='button red' href='{{URL::route('state',$state)}}'>Yes</a>
                            <a class='button red' href='{{URL::route('states')}}'>I'm registered elsewhere</a><br/>
                            <a class='button blue' href='{{URL::route('state',array($state, "register"))}}'>I'm not registered</a>
                        </div>
                </div>
           </div>
       @endif
   @stop