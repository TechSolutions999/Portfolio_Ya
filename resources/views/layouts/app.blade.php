<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $profile['name'].' — Portfolio')</title>
    <meta name="description" content="{{ $profile['title'] }} · Selected work 2021–2026">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="32x32">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <meta name="theme-color" content="#0a0a0a">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@php $home = rtrim(url('/'), '/').'/'; @endphp
<div class="page">
    <nav class="navbar-yn d-flex align-items-center justify-content-between">
        <a class="logo" href="{{ $home }}">{{ $profile['name'] }}</a>
        <div class="d-flex align-items-center">
            <a class="btn-pill btn-solid" href="{{ $home }}#work">View Work</a>
        </div>
    </nav>
    @yield('content')

    <footer class="site-footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 foot-col mb-4 mb-lg-5">
                    <a class="logo serif foot-logo" href="{{ $home }}">{{ $profile['name'] }}</a>
                    <p class="mt-3">{{ $profile['title'] }}</p>
                    <div class="soc-row mt-3">
                        <a class="soc" href="{{ $profile['linkedin'] }}" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.24 8.5h4.52V24H.24V8.5zM8.24 8.5h4.33v2.12h.06c.6-1.14 2.08-2.34 4.28-2.34 4.58 0 5.43 3.01 5.43 6.93V24h-4.52v-7.69c0-1.83-.03-4.19-2.55-4.19-2.56 0-2.95 2-2.95 4.06V24H8.24V8.5z"/></svg>
                        </a>
                        <a class="soc" href="mailto:{{ $profile['email'] }}" aria-label="Email">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 7 9-7"/></svg>
                        </a>
                        <a class="soc" href="tel:{{ $profile['phone_href'] }}" aria-label="Phone">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 006 6l1.5-2 4 1.5v3c0 1-1 2-2 2C9 19.5 4.5 15 4.5 5.5c0-1 1-2 2-2z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-2 foot-col mb-4 mb-lg-5">
                    <h6>Studio</h6>
                    <a href="{{ $home }}#work">Selected Work</a>
                    <a href="{{ $home }}#about">About</a>
                    <a href="{{ $home }}#skills">Skills</a>
                </div>
                <div class="col-6 col-lg-2 foot-col mb-4 mb-lg-5">
                    <h6>Projects</h6>
                    @foreach(array_slice(config('portfolio.projects'), 0, 5) as $p)
                        <a href="{{ route('project.show', $p['slug']) }}">{{ $p['title'] }}</a>
                    @endforeach
                </div>
                <div class="col-12 col-sm-6 col-lg-2 foot-col mb-4 mb-lg-5">
                    <h6>Visit</h6>
                    <p>{{ $profile['location'] }}</p>
                    <a href="tel:{{ $profile['phone_href'] }}">{{ $profile['phone'] }}</a>
                    <a href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a>
                    <a href="{{ $profile['linkedin'] }}" target="_blank" rel="noopener">LinkedIn</a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 foot-col mb-4 mb-lg-5">
                    <h6>Join Digest</h6>
                    @if(session('ok'))
                        <div class="alert-ok">{{ session('ok') }}</div>
                    @endif
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <input type="hidden" name="name" value="Digest">
                        <input type="hidden" name="message" value="Please add me to the studio digest.">
                        <div class="digest">
                            <input type="email" name="email" placeholder="Your email" required>
                            <button type="submit" aria-label="Send">→</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="copy">© {{ date('Y') }} {{ $profile['name'] }} · Selected Work {{ $profile['years'] }}</div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
