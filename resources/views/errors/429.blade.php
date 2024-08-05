@extends('errors.illustrated-layout')

@section('title', '请求频率受到限制，请1分钟后重试')
@section('code', '429')
@section('message', '请求频率受到限制，请1分钟后重试')
@section('image','/images/errors/429.svg')