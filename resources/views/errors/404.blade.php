@extends('errors::illustrated-layout')

@section('title', __('Página não encontrada'))
@section('code', '404')
@section('message', __($exception->getMessage() ?: 'Página não encontrada'))
