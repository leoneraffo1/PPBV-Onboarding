@extends('errors::illustrated-layout')

@section('title', __('Página expirada'))
@section('code', '419')
@section('message', __($exception->getMessage() ?: 'Página expirada'))
