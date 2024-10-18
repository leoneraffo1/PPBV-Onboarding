@extends('errors::illustrated-layout')

@section('title', __('Erro no Servidor'))
@section('code', '500')
@section('message', __($exception->getMessage() ?: 'Erro no Servidor, entre em contato com o suporte'))
