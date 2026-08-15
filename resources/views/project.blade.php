@extends('layouts.app')

@section('title', $project['title'].' — '.$profile['name'])

@section('content')
<section class="project-hero">
    <div class="container">
        <div class="label reveal">{{ $project['code'] }} · {{ $project['year'] }} · {{ $project['short'] }}</div>
        <h1 class="reveal">{{ $project['title'] }}</h1>
        <p class="reveal" style="color:#c9b8a0;font-family:'Playfair Display',serif;font-style:italic;font-size:22px;max-width:720px;">
            “{{ $project['quote'] }}”
        </p>
        <p class="reveal" style="color:#9ca3af;max-width:640px;">{{ $project['place'] }} · {{ $project['studio'] }}</p>
        <div class="cover-xl glass mt-4 reveal">
            <img src="{{ asset('images/works/'.$project['cover']) }}" alt="{{ $project['title'] }}">
        </div>
    </div>
</section>

<section class="section" style="padding-top:64px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="glass p-4 reveal-up">
                    <div class="label mb-3">Concept</div>
                    <h3 class="serif" style="font-style:italic;font-size:28px;">{{ $project['concept'] }}</h3>
                    @if(!empty($project['logo']))
                        <img class="mt-4" src="{{ asset('images/logos/'.$project['logo']) }}" alt="" style="width:88px;border-radius:12px;background:#fff;padding:8px;">
                    @endif
                </div>
            </div>
            <div class="col-lg-8">
                @foreach($project['body'] as $para)
                    <p class="reveal-up" style="color:rgba(255,255,255,.72);font-weight:300;line-height:1.85;font-size:16px;">{{ $para }}</p>
                @endforeach
            </div>
        </div>

        <div class="label mt-5 mb-4 reveal-up">Drawings & shots</div>
        <div class="row">
            @foreach($project['gallery'] as $n)
                <div class="col-md-6 col-lg-4">
                    <a class="gallery-item" href="{{ asset('images/works/'.$n.'.jpeg') }}">
                        <img src="{{ asset('images/works/'.$n.'.jpeg') }}" alt="{{ $project['title'] }} {{ $n }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="label mt-5 mb-4">Other work</div>
        <div class="row">
            @foreach($others as $item)
                <div class="col-md-4 mb-4">
                    <a class="work-card glass" href="{{ route('project.show', $item['slug']) }}">
                        <img src="{{ asset('images/works/'.$item['cover']) }}" alt="{{ $item['title'] }}">
                        <div class="pad">
                            <div class="code">{{ $item['code'] }}</div>
                            <h3>{{ $item['title'] }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="lightbox" id="lightbox"><img src="" alt=""></div>
@endsection
