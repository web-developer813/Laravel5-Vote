@extends('layout')
    @section('body')
        <div class="content">
            <div class="state-header">
                <div class="title">See how the numbers add up in other states.</div>
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
        </div>
    @stop