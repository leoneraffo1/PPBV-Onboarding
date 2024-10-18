@extends('errors::illustrated-layout')

@section('title', __('Proibido'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Não autorizado'))
