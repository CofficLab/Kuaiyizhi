@extends('errors.illustrated-layout')

@section('code','403')
@section('title','Forbidden')
@section('message',$exception->getMessage() ?? 'Forbidden')
@section('image','/images/errors/403.svg')
