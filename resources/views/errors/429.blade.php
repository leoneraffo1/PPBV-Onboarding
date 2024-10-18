@extends('errors::illustrated-layout')

@section('title', __('Excesso de solicitações'))
@section('code', '429')
@section('message', __($exception->getMessage() ?: 'Excesso de solicitações'))
