@extends('layouts.app')

@section('content')
@php
    $hero = collect($projects)->firstWhere('hero', true);
    $sats = collect($projects)->where('slug', '!=', $hero['slug'])->take(4)->values();
    $featured = collect($projects)->where('featured', true)->values();
@endphp

<section class="hero">
    <div class="hero-glow"></div>
    <div class="container">
        <div class="text-center reveal">
            <div class="live-pill">
                <span class="live-dot"></span>
                <span class="live-k">LIVE</span>
                <span class="live-t">Open to studio opportunities</span>
            </div>
            <h1>Architecture as a<br><span class="gold">Journey</span> to Healing</h1>
            <p class="mb-4" style="color:#9ca3af;font-weight:300;max-width:560px;margin:0 auto 8px;font-size:16px;">
                {{ $profile['name'] }} · {{ $profile['title'] }} · Selected work {{ $profile['years'] }}
            </p>
            <div class="hero-cta justify-content-center">
                <a class="btn-pill btn-line" href="#work">Selected Work</a>
                <a class="btn-pill btn-solid" href="#contact">Start a Conversation</a>
            </div>
        </div>

        <div class="hero-stage">
            <svg id="neural"></svg>
            @foreach($sats as $i => $sat)
                <a class="sat sat-{{ $i+1 }} glass reveal" href="{{ route('project.show', $sat['slug']) }}" data-node="sat{{ $i+1 }}">
                    <img src="{{ asset('images/works/'.$sat['cover']) }}" alt="{{ $sat['title'] }}">
                    <div class="sat-body">
                        <span class="label">{{ $sat['code'] }}</span>
                        <span style="font-weight:600;font-size:14px;">{{ $sat['title'] }}</span>
                    </div>
                </a>
            @endforeach
            <a class="center-node glass d-block" href="{{ route('project.show', $hero['slug']) }}" data-node="center">
                <img src="{{ asset('images/works/'.$hero['cover']) }}" alt="{{ $hero['title'] }}">
                <div class="center-cap glass">
                    <span class="label">{{ $hero['code'] }} · Thesis</span>
                    <div class="serif" style="font-style:italic;font-size:22px;">{{ $hero['title'] }}</div>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="section" id="work">
    <div class="container">
        <div class="section-head reveal-up">
            <div class="label">Selected Work</div>
            <h2>Selected work, 2021–2026</h2>
        </div>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-6 col-lg-4 mb-4 reveal-up">
                    <a class="work-card glass" href="{{ route('project.show', $project['slug']) }}">
                        <img src="{{ asset('images/works/'.$project['cover']) }}" alt="{{ $project['title'] }}">
                        <div class="pad">
                            <div class="code">{{ $project['code'] }} · {{ $project['year'] }}</div>
                            <h3>{{ $project['title'] }}</h3>
                            <p>{{ $project['excerpt'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="skills" style="padding-top:40px;">
    <div class="container">
        <div class="section-head reveal-up">
            <div class="label">Craft</div>
            <h2>Software & method</h2>
        </div>
        <div class="row">
            @foreach($skills as $skill)
                <div class="col-md-6 col-lg-3 mb-4 reveal-up">
                    <div class="skill-card glass">
                        <div class="ico">{{ strtoupper(substr($skill['name'],0,2)) }}</div>
                        <div class="label mb-2">{{ $skill['group'] }}</div>
                        <h3>{{ $skill['name'] }}</h3>
                        <p>{{ $skill['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="path" style="padding-top:20px;">
    <div class="container">
        <div class="section-head text-center reveal-up">
            <div class="label">Path</div>
            <h2>Study, practice, craft</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4 reveal-up">
                <div class="path-card glass">
                    <div class="label">Education</div>
                    <div class="num">UJ</div>
                    <h3>Architecture</h3>
                    <p>{{ $education[0]['place'] }}<br>{{ $education[0]['dates'] }} · {{ $education[0]['city'] }}</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4 reveal-up">
                <div class="path-card glass hot">
                    <div class="badge-pop">Most Recent</div>
                    <div class="label">Practice</div>
                    <div class="num">25</div>
                    <h3>{{ $experience[0]['role'] }}</h3>
                    <p>{{ $experience[0]['place'] }}<br>{{ $experience[0]['dates'] }} · {{ $experience[0]['city'] }}</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4 reveal-up">
                <div class="path-card glass">
                    <div class="label">Training</div>
                    <div class="num">08</div>
                    <h3>OMNIPLAN</h3>
                    <p>Revit · Lumion · D5 · Enscape<br>V-Ray · 3D Max · Adobe</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="featured" style="padding-top:20px;">
    <div class="container">
        <div class="section-head reveal-up">
            <div class="label">Featured</div>
            <h2>Two rooms of the work</h2>
        </div>
        <div class="row">
            @foreach($featured as $item)
                <div class="col-lg-6 mb-5 reveal-up">
                    <a class="feat-card" href="{{ route('project.show', $item['slug']) }}">
                        <div class="ratio glass">
                            <img src="{{ asset('images/works/'.$item['cover']) }}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="cap">
                            <h3>{{ $item['title'] }}</h3>
                            <div class="role">{{ $item['short'] }} · {{ $item['place'] }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="about" style="padding-top:20px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 reveal-up">
                <div class="label">About</div>
                <h2 class="serif" style="font-style:italic;font-size:clamp(2rem,5vw,3.4rem);margin:12px 0 0;">Precision, held lightly</h2>
            </div>
            <div class="col-lg-7 about-grid reveal-up">
                <p>{{ $profile['about'] }}</p>
                <p class="mt-3">{{ $experience[0]['text'] }}</p>
                <div class="lang-row">
                    @foreach($profile['languages'] as $lang)
                        <span class="lang-chip">{{ $lang['name'] }} · {{ $lang['level'] }}</span>
                    @endforeach
                    @foreach($soft as $s)
                        <span class="lang-chip">{{ $s }}</span>
                    @endforeach
                </div>
                <div class="lang-row">
                    <a class="lang-chip" href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a>
                    <a class="lang-chip" href="tel:{{ $profile['phone_href'] }}">{{ $profile['phone'] }}</a>
                    <a class="lang-chip" href="{{ $profile['linkedin'] }}" target="_blank" rel="noopener">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
