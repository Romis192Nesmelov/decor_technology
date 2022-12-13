@extends('layouts.mail')

@section('content')
    @include('emails.blocks.head_block',['hLevel' => 2, 'head' => 'Заявка на обратный звонок'])
    @include('emails.blocks.head_block',['hLevel' => 2, 'head' => $phone])
@endsection