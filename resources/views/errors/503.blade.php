@extends('errors::illustrated-layout')

@section('title', __('Serviço indisponível'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Serviço indisponível, entre em contato com o suporte'))
