@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <div class="card-header">Новый заказ</div>

        <div class="card-body">

<div class="form-group">
    <p>ФИО</p>
    <input type="text" class="form-control" placeholder="" v-model="fio">
</div>

<div class="form-group">
    <p>Телефон</p>
    <input type="text" class="form-control" placeholder="" v-model="phone">
</div>

<div class="form-group">
    <p>Дата создания заказа: @{{ formattedDate }}</p>
    <calendar v-model='date' :model-config="modelConfig" :attributes='attrs' />
</div>

<div class="form-group">
    <p>Название рациона питания</p>
    <input type="text" class="form-control" placeholder=""v-model="diet">
</div>

<div class="form-group">
    <p>Период доставки (с даты по дату)</p>
    <date-picker is-range v-model='range' :model-config="modelConfig" :min-date='new Date()' />
</div>

<div class="form-group">
<p>Расписание доставки</p>
<select class="form-control" v-model="schedule">
  <option>ежедневная</option>
  <option>доставка через день на один день питания</option>
  <option>доставка через день на 2 дня питания</option>
</select>
</div>


<div class="form-group">
<p>Дни недели питания</p>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day1">
  <label class="form-check-label" for="">
    понедельник
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day2">
  <label class="form-check-label" for="">
    вторник
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day3">
  <label class="form-check-label" for="">
    среда
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day4">
  <label class="form-check-label" for="">
    четверг
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day5">
  <label class="form-check-label" for="">
    пятница
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day6">
  <label class="form-check-label" for="">
    суббота
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="" v-model="day7">
  <label class="form-check-label" for="">
    воскресенье
  </label>
</div>
</div>

<div class="form-group">
<p>Комментарий</p>
<textarea class="form-control" id="" rows="3" v-model="comment"></textarea>
</div>

<div class="alert alert-success" role="alert" v-if="stored">
  Заказ отправлен!
</div>
<button class="btn btn-primary" v-on:click="store">Создать заказ</button>


        </div>
        </div>
    </div>
</div>
</div>
@endsection