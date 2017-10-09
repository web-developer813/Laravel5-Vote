@extends('layout')
    @section('body')
        <div class="content">
            <div class="state-header">
                @if($state->color == "swing")
                    <h1 class='title'>You're in a swing state!</h1>
                    <h2>Hey, {{$state->state}}voter,  your state needs all the help it can get. Yes, we're looking at you.</h2>
                    <div class='swing-copy'><p>A swing state is one where voter behavior is hard to predict. Come election day, it could go either way. Swing states like yours get a lot of attention because a small change in voter preference could have a huge effect on the election. In 1960, Kennedy defeated Nixon by just 0.2% of the popular vote. That's the power of a swing state.</p> <p> Remember, the only vote that doesnt count is the one you don't cast. So get out there on November 8th and count yourself in.</p></div> <br/>
                @else
                    <h1 class='title'>You're in a <span class='{{$state->color}}'>{{$state->color}}</span> state!</h1>
                    <div class='state-image' style='background-image: url( /img/states/{{$state->state_abr.".png"}})'> </div>
                    <div class='swing-copy'><p>You live in what some call a "safe" state, because support is pretty strong for one presidential candidate. But that doesn't mean your vote doesn't count. Nobody thought Truman had a chance in 1948. The publisher of the <em>Chicago Daily Tribune</em> was so sure, he printed 150,000 newspapers with the headline "Dewey Defeats Truman." When every vote was counted, Truman had won by 4.5%.</p> <p>Remember, the only vote that doesnt count is the one you don't cast. So get out there on November 8th and count yourself in.</p></div> <br/>
                @endif
            </div>
            <br/>
            <div class="forecast">
                <div class="title">Here's how it looks like it'll go</div>

                <div class="hillary-img"></div>
                <div class="donald-img"></div>
                <div class="clear"></div>
                <div class='forecast-bar'>
                    <div class='H' style='width: {{$state->projection_H."%"}}'></div>
                </div> <br/>
                <div class='hillary-projection'><span class='blue'>Hillary Clinton</span><br/>{{$state->projection_H."%"}} </div>
                <div class='trump-projection'><span class='red'>Donald Trump</span><br/>{{100-$state->projection_H."%"}} </div>
            </div>
            <br/>
            <div class="clear"></div>
            <div class="source"><a href="http://projects.fivethirtyeight.com/2016-election-forecast/<?php echo strtolower(str_replace(" ", "-", $state->state)); ?>">Source</a></div>
            <div class="facts">
                <div class="title">The Facts</div>
                <div class="fact-table">
                    <div class="table">
                        <div class='table-row electoral-votes'><div class='table-padding'> <span class='number'>{{$state->electoral_votes}} </span> <p> electoral votes </p> </div></div>
                        <div class='table-row turnout'>
                            <div class='table-padding'>
                                <p> In 2012, <span class='red'>{{ $state->turnout_2012 }}</span> of the voting age population in <span>{{$state->state}}</span> voted in the presidential election -- out of <span class='red'>{{$state->vap_2012}}</span>. </p> <br/><em> That's only <span class='red'>{{round(($state->turnout_2012 / $state->vap_2012) * 100)."%"}}</span>. </em></div></div>
                    </div>
                    <div class="clear"></div>
                    <!-- table show start-->
                    <div class='table-title'>2016 Polls</div>
                    <div class="table">
                        <div class='table-row polls'>
                            <?php  $stateData = new \App\Model\StateData() ?>
                            @for($i=1; $i<=5; $i++)
                                {!! $stateData::poll_display($state,$i) !!}
                            @endfor
                        </div>
                    </div>
                    <div class='table-title'>Previous Elections</div>
                    <div class="table">
                        @for($i= 2012; $i>1976; $i-=4)

                            {!! $stateData::voting_history($state,$i) !!}
                        @endfor
                    </div>
                    <!-- table show end-->
                </div>
            </div>
            <!-- end facts -->
            <div class="clear"></div>
            <div class="source" style="margin-top: -40px;margin-bottom: 60px;">
                <a href="http://www.270towin.com/states/<?php echo strtolower(str_replace(" ", "_", $state->state)); ?>">Source</a></div>
            <div class="your-vote-matters">
                <img src="/img/vote-hands.png" style="width:400px;">
                <h1>Yes, it counts.</h1>
                <p>This November the US will hold one of the most contentious presidential elections in history. Some people say one vote won't make a difference. We say the only vote that doesn't count is the one you don't cast.</p>
                <br/>
                <p class="election-day red">Vote November 8th and count yourself in.</span>

            </div>
            <br/>

            <!-- -----------   Share ----------  -->


            <div class="share">
                <p>Share</p><div class="clear"></div>
                <a href="#" class="button twitter"><img class="twitter" src="/img/twitter.png" alt="Share on Twitter"></a>
                <a href="#" class="button facebook"><img class="facebook" src="/img/facebook.png" alt="Share on Facebook"></a>
                <a href="#" class="button linkedin">	<img class="linkedin" src="/img/linkedin.png" alt="Share on Linkedin"></a>
            </div>

            <!-- ----------- Register ---------- -->


            <a name="register"></a>
            <div class="register">
                <div class="title">Not registered?</div><br/>
                <?php
                    $online_datetime = new DateTime($state->reg_online);
                    $mail_datetime = new DateTime($state->reg_mail);
                    $person_datetime = new DateTime($state->reg_person);
                    $now = new DateTime();

                    $online_reg = $state->reg_online;
                    $mail_reg = $state->reg_mail;
                    $person_reg = $state->reg_person;

                    $online_reg_date = date('F j', strtotime($state->reg_online));
                    $mail_reg_date = date('F j', strtotime($state->reg_mail));
                    $person_reg_date = date('F j', strtotime($state->reg_person));
                ?>
                @if($state->state == "North Dakota")
                    <p>North Dakota doesn't require voter registration, just valid ID issue by the state. When you vote November 8, bring your ND identification card or driver's license, Tribal ID, long-term care certificate, military ID, or passport.</p>
                @else
                    @if ( ($online_datetime < $now) && ($mail_datetime < $now) && ($person_datetime < $now) )
                        <p>Oh no! Voter registration has closed for {{$state->state}}. But you can still make a difference. Encourage registered friends and family to vote this November, and make sure to register yourself for next time. </p>
                    @elseif (($online_reg == $person_reg) && ($person_reg == $mail_reg))
                        <p>The deadline to register in {{$state->state_abr}} online, by mail, and in person is {{ $online_reg_date }}.
                            It takes about 5 minutes online. Do it now, then vote November 8th.</p><br/>
                        <a class="button blue" href="http://www.iwillvote.com" target="_blank">Register Now</a>
                    @elseif ($online_reg == $mail_reg)
                        @if ($online_datetime < $now)
                            <p>Registration online and by mail has ended for {{$state->state_abr}}, but you can still register in person until  {{ $person_reg_date }}. Get registered asap so you can vote this November.</p>
                        @else
                            <p>The deadline to register in  {{$state->state_abr}} online and by mail is   {{ $online_reg_date }}, and in person is {{ $person_reg_date }}.
                                It takes about 5 minutes online. Do it now, then vote November 8th.</p><br/>
                            <a class="button blue" href="http://www.iwillvote.com" target="_blank">Register Now</a>
                        @endif
                    @elseif ($online_reg == $person_reg)
                        @if ($mail_datetime < $now)
                            <p>Registration by mail has ended for {{$state->state_abr}}, but you can still register online and in person until {{ $online_reg_date }}. Get registered asap so you can vote this November.</p>
                        @else
                            <p>The deadline to register in  {{$state->state_abr}}  online and in person is {{ $online_reg_date }} , and by mail is {{ $mail_reg_date }}.;
                                It takes about 5 minutes online. Do it now, then vote November 8th.</p><br/>
                            <a class="button blue" href="http://www.iwillvote.com" target="_blank">Register Now</a>
                        @endif
                    @elseif ($person_reg == $mail_reg)
                        @if (!is_null($online_reg))
                            @if ($online_datetime < $now)
                                <p>Registration online has ended for {{$state->state_abr}}, but you can still register in person or by mail until {{ $online_reg_date }}. Get registered asap so you can vote this November.</p>
                            @elseif ($mail_datetime < $now)
                                <p>Registration by mail and in person has ended for {{$state->state_abr}}, but you can still register online until {{ $online_reg_date }}. Get registered asap so you can vote this November.</p>
                            @else
                                <p>The deadline to register in  {{$state->state_abr}} online is {{ $online_reg_date }}, and in person and by mail is {{ $person_reg_date }}.
                                     It takes about 5 minutes online. Do it now, then vote November 8th.</p><br/>
                                <a class="button blue" href="http://www.iwillvote.com" target="_blank">Register Now</a>
                            @endif
                        @else
                            @if (!$mail_datetime < $now)
                                <p>You can't register online for {{$state->state_abr}}, but you can still register in person or by mail until {{ $mail_reg_date }}. Get registered asap so you can vote this November.</p>
                            @else
                                <p>Oh no! Voter registration has closed for {{$state}}. But you can still make a difference. Encourage registered friends and family to vote this November, and make sure to register yourself for next time. </p>
                            @endif
                        @endif
                    @endif



                @endif
           </div>
        </div>
    @stop