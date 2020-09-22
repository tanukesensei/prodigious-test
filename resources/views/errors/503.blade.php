@extends('errors::minimal')

@section('title', __('503.service.unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: '503.service.unavailable'))
