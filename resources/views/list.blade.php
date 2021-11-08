@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        @forelse ($orders as $order)
            <div class="card">
            <div class="card-header">Заказ от {{ date('d-m-Y', strtotime($order->date)) }}</div>
                
            <div class="card-body">
                <p>
                    Период: от {{ date('d-m-Y', strtotime($order->range_start)) }}
                    до
                    {{ date('d-m-Y', strtotime($order->range_end)) }}
                </p>
                <p>
                    {{ $order->schedule }}
                </p>
                <p>
                    Дни питания: 
                </p>
                @php
                $days = array('понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье');

                $daysVars = array('day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7');

                $daysValues = array($order->day1,$order->day2,$order->day3,$order->day4,$order->day5,$order->day6,$order->day7);

                
                $begin = new DateTime($order->range_start);
                $end = new DateTime($order->range_end);
                $end = $end->modify( '+1 day' );
                $interval = new DateInterval('P1D');
                $period = new DatePeriod(
                     $begin,
                     $interval,
                     $end
                );

                @endphp
                @for ($i = 0; $i < 7; $i++)
                    @if($order->{$daysVars[$i]})
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="" checked="checked" style="pointer-events: none;">
                      <label class="form-check-label" for="">
                        {{ $days[$i] }}
                      </label>
                    </div>
                    @else
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="" style="pointer-events: none;">
                      <label class="form-check-label" for="">
                        {{ $days[$i] }}
                      </label>
                    </div>
                    @endif                    
                @endfor

                <br>
                <p>Дни доставки:</p>
                @php
                $daysOfOrder = [];
                foreach($period as $key => $value) {
                    if($value->format('w') == 0) $day = 6;
                    else
                    $day = $value->format('w')-1;
                    if($daysValues[$day]){
                    $daysOfOrder[] = $value->format('d-m-Y');   
                    }
                } 

                if($order->schedule == 'доставка через день на один день питания' || $order->schedule == 'доставка через день на 2 дня питания')
                for($i=0; $i < count($daysOfOrder); $i+=2)
                echo $daysOfOrder[$i] . "; "; 
                else
                for($i=0; $i < count($daysOfOrder); $i++)
                echo $daysOfOrder[$i] . "; "; 
                @endphp
                <br><br>
                <p>Всего будет доставлено порций:&nbsp;
                @if($order->schedule == 'доставка через день на один день питания')
                {{ count($daysOfOrder)/2 }}
                @else
                {{ count($daysOfOrder) }}
                @endif
                </p>                
            </div>
            </div>
        @empty
            <p>Нет заказов</p>
        @endforelse
    </div>
</div>
</div>
@endsection