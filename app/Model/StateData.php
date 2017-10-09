<?php


namespace  App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class StateData extends Eloquent
{
    protected $table = 'state_data';

    public static function poll_display($state,$num) {

        $poll_title_link = "poll".$num."_title_link";
        $poll_title = "poll". $num ."_title";
        $H_title = "poll". $num ."_H";
        $T_title = "poll". $num ."_T";

        $title_link = $state->$poll_title_link;
        $title = $state->$poll_title;
        $H = round($state->$H_title);
        $T = round($state->$T_title);
        $other = round(100 - ($H + $T));
        $list = "";
        $list .="<div class='poll' id='poll".$num."cont'>";
        $list .="<canvas id='poll".$num."'></canvas><div class='clear'></div>";
        $list .="<a href='". $title_link ."' target='_blank'>". $title ."</a><br/>";
        $list .="<p class='blue'><span class='clinton'>". $H ."</span>% Clinton </p>";
        $list .="<p class='red'><span class='trump'>". $T ."</span>% Trump </p>";;
        $list .="<p class='tan'><span class='other'>". $other ."</span>% Other </p>";
        $list .="</div>";
        return $list;
    }
    public static function voting_history($state,$year){
        $voting_history_year ="voting_history_". $year;
        $result = $state->$voting_history_year;
        $list = "";
        $list .="<div class='point'><div class='dot ".$result."'>". $result ."</div>";
        $list .="<p>". $year ."</p>";
        $list .= "</div>";
        return $list;

    }

}

