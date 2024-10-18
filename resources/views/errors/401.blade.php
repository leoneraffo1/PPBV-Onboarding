@extends('errors::illustrated-layout')

@section('title', __('Não autorizado'))
@section('code', '401')
@section('message', __($exception->getMessage() ?: 'Não autorizado'))
