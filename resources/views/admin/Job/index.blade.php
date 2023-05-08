@extends('admin.components.list')

@section('title', $metadata['list']['detail']->name . ' Job')

@section('page', 'List')

@slot('list')
    {!! $metadata['list'] = $metadata['list']['list'] !!} 
@endslot