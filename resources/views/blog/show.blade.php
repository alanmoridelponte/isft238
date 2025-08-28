@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="{{ implode(', ', $post->tags->pluck('name')->toArray()) }}">
    <meta name="description" content="{{ $post->excerpt }}">
    <meta property="og:title" content="{{ $post->title }} - {{ $general_setting->institute_name }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    <meta property="og:image" content="{{ asset($post->banner) }}">
    <meta property="og:url"
        content="{{ route('blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }} - {{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="{{ $post->excerpt }}">
    <meta name="twitter:image" content="{{ asset($post->banner) }}">
@endsection

@section('content')
    <div class="max-h-full max-w-4xl aspect-video mx-auto px-4 py-12">

        {{-- Botón Volver --}}
        <div class="mb-6">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center text-amber-600 text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Volver al blog
            </a>
        </div>

        {{-- Breadcrumb + Tiempo de lectura --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center text-sm text-gray-500 mb-4 gap-2">

            {{-- Breadcrumbs --}}
            <nav aria-label="Breadcrumb">
                <ol class="list-none flex flex-wrap items-center space-x-1">
                    <li>
                        <a href="{{ route('page.index') }}" class="hover:underline text-amber-600 font-medium">
                            <i class="fas fa-home mr-2"></i>Inicio
                        </a>
                    </li>
                    <li><span class="mx-1 text-gray-400"><i class="fas fa-chevron-right"></i></span></li>
                    <li>
                        <a href="{{ route('blog.index') }}" class="hover:underline text-amber-600 font-medium">
                            Blog
                        </a>
                    </li>
                    <li><span class="mx-1 text-gray-400"><i class="fas fa-chevron-right"></i></span></li>
                    <li>
                        <a href="{{ route('blog.category', ['category' => $post->category->slug]) }}"
                            class="hover:underline text-amber-600 font-medium">
                            {{ $post->category->name }}
                        </a>
                    </li>
                    <li><span class="mx-1 text-gray-400"><i class="fas fa-chevron-right"></i></span></li>
                    <li class="text-gray-600 truncate max-w-[24rem] sm:max-w-xs md:max-w-md" title="{{ $post->title }}">
                        {{ $post->title }}
                    </li>
                </ol>
            </nav>

            {{-- Tiempo de lectura --}}
            <div class="text-xs italic text-right text-gray-500 whitespace-nowrap">
                <i class="fas fa-calendar-alt text-amber-500 mr-1"></i>{{ $post->created_at->diffForHumans() }}
            </div>
        </div>


        <article class="bg-white rounded-xl shadow overflow-hidden">
            {{-- Imagen arriba --}}
            <img src="{{ asset('storage/' . $post->banner) }}" alt="Imagen de {{ $post->title }}"
                class="w-full aspect-video object-cover object-center bg-amber-600">

            <hr>

            <div class="p-6">
                {{-- Categoría, fecha y tiempo de lectura --}}
                <div class="flex flex-wrap justify-between items-center text-sm text-gray-500 mb-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('blog.category', ['category' => $post->category->slug]) }}"
                            class="inline-flex items-center bg-amber-100 text-amber-700 font-semibold px-2 py-1 rounded text-xs">
                            {{ $post->category->name }}
                        </a>
                    </div>
                    <span class="text-xs">
                        <i
                            class="fas fa-clock text-amber-500 mr-1"></i>{{ ceil(str_word_count(strip_tags($post->body)) / 200) }}
                        min de lectura
                    </span>
                </div>

                {{-- Título --}}
                <h1 class="text-3xl font-bold text-amber-600 mb-4">{{ $post->title }}</h1>

                {{-- Extracto --}}
                <p class="text-lg text-gray-600 mb-6">{{ $post->excerpt }}</p>

                {{-- Contenido principal --}}
                <div class="prose prose-amber max-w-none">
                    <style>
                        .prose {
                            color: var(--tw-prose-body);
                            max-width: 65ch
                        }

                        .prose :where(p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em;
                            margin-top: 1.25em
                        }

                        .prose :where([class~=lead]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-lead);
                            font-size: 1.25em;
                            line-height: 1.6;
                            margin-bottom: 1.2em;
                            margin-top: 1.2em
                        }

                        .prose :where(a):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-links);
                            font-weight: 500;
                            text-decoration: underline
                        }

                        .prose :where(strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-bold);
                            font-weight: 600
                        }

                        .prose :where(a strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(blockquote strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(thead th strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: decimal;
                            margin-bottom: 1.25em;
                            margin-top: 1.25em;
                            padding-inline-start: 1.625em
                        }

                        .prose :where(ol[type=A]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: upper-alpha
                        }

                        .prose :where(ol[type=a]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: lower-alpha
                        }

                        .prose :where(ol[type=A s]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: upper-alpha
                        }

                        .prose :where(ol[type=a s]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: lower-alpha
                        }

                        .prose :where(ol[type=I]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: upper-roman
                        }

                        .prose :where(ol[type=i]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: lower-roman
                        }

                        .prose :where(ol[type=I s]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: upper-roman
                        }

                        .prose :where(ol[type=i s]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: lower-roman
                        }

                        .prose :where(ol[type="1"]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: decimal
                        }

                        .prose :where(ul):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            list-style-type: disc;
                            margin-bottom: 1.25em;
                            margin-top: 1.25em;
                            padding-inline-start: 1.625em
                        }

                        .prose :where(ol>li):not(:where([class~=not-prose], [class~=not-prose] *))::marker {
                            color: var(--tw-prose-counters);
                            font-weight: 400
                        }

                        .prose :where(ul>li):not(:where([class~=not-prose], [class~=not-prose] *))::marker {
                            color: var(--tw-prose-bullets)
                        }

                        .prose :where(dt):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-headings);
                            font-weight: 600;
                            margin-top: 1.25em
                        }

                        .prose :where(hr):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-color: var(--tw-prose-hr);
                            border-top-width: 1px;
                            margin-bottom: 3em;
                            margin-top: 3em
                        }

                        .prose :where(blockquote):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-inline-start-color: var(--tw-prose-quote-borders);
                            border-inline-start-width: .25rem;
                            color: var(--tw-prose-quotes);
                            font-style: italic;
                            font-weight: 500;
                            margin-bottom: 1.6em;
                            margin-top: 1.6em;
                            padding-inline-start: 1em;
                            quotes: "\201C" "\201D" "\2018" "\2019"
                        }

                        .prose :where(blockquote p:first-of-type):not(:where([class~=not-prose], [class~=not-prose] *)):before {
                            content: open-quote
                        }

                        .prose :where(blockquote p:last-of-type):not(:where([class~=not-prose], [class~=not-prose] *)):after {
                            content: close-quote
                        }

                        .prose :where(h1):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-headings);
                            font-size: 2.25em;
                            font-weight: 800;
                            line-height: 1.1111111;
                            margin-bottom: .8888889em;
                            margin-top: 0
                        }

                        .prose :where(h1 strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit;
                            font-weight: 900
                        }

                        .prose :where(h2):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-headings);
                            font-size: 1.5em;
                            font-weight: 700;
                            line-height: 1.3333333;
                            margin-bottom: 1em;
                            margin-top: 2em
                        }

                        .prose :where(h2 strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit;
                            font-weight: 800
                        }

                        .prose :where(h3):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-headings);
                            font-size: 1.25em;
                            font-weight: 600;
                            line-height: 1.6;
                            margin-bottom: .6em;
                            margin-top: 1.6em
                        }

                        .prose :where(h3 strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit;
                            font-weight: 700
                        }

                        .prose :where(h4):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-headings);
                            font-weight: 600;
                            line-height: 1.5;
                            margin-bottom: .5em;
                            margin-top: 1.5em
                        }

                        .prose :where(h4 strong):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit;
                            font-weight: 700
                        }

                        .prose :where(img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose :where(picture):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            display: block;
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose :where(video):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose :where(kbd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .3125rem;
                            box-shadow: 0 0 0 1px rgb(var(--tw-prose-kbd-shadows)/10%), 0 3px 0 rgb(var(--tw-prose-kbd-shadows)/10%);
                            color: var(--tw-prose-kbd);
                            font-family: inherit;
                            font-size: .875em;
                            font-weight: 500;
                            padding-inline-end: .375em;
                            padding-bottom: .1875em;
                            padding-top: .1875em;
                            padding-inline-start: .375em
                        }

                        .prose :where(code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-code);
                            font-size: .875em;
                            font-weight: 600
                        }

                        .prose :where(code):not(:where([class~=not-prose], [class~=not-prose] *)):before {
                            content: "`"
                        }

                        .prose :where(code):not(:where([class~=not-prose], [class~=not-prose] *)):after {
                            content: "`"
                        }

                        .prose :where(a code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(h1 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(h2 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit;
                            font-size: .875em
                        }

                        .prose :where(h3 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit;
                            font-size: .9em
                        }

                        .prose :where(h4 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(blockquote code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(thead th code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: inherit
                        }

                        .prose :where(pre):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            background-color: var(--tw-prose-pre-bg);
                            border-radius: .375rem;
                            color: var(--tw-prose-pre-code);
                            font-size: .875em;
                            font-weight: 400;
                            line-height: 1.7142857;
                            margin-bottom: 1.7142857em;
                            margin-top: 1.7142857em;
                            overflow-x: auto;
                            padding-inline-end: 1.1428571em;
                            padding-bottom: .8571429em;
                            padding-top: .8571429em;
                            padding-inline-start: 1.1428571em
                        }

                        .prose :where(pre code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            background-color: #fff0;
                            border-radius: 0;
                            border-width: 0;
                            color: inherit;
                            font-family: inherit;
                            font-size: inherit;
                            font-weight: inherit;
                            line-height: inherit;
                            padding: 0
                        }

                        .prose :where(pre code):not(:where([class~=not-prose], [class~=not-prose] *)):before {
                            content: none
                        }

                        .prose :where(pre code):not(:where([class~=not-prose], [class~=not-prose] *)):after {
                            content: none
                        }

                        .prose :where(table):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .875em;
                            line-height: 1.7142857;
                            margin-bottom: 2em;
                            margin-top: 2em;
                            table-layout: auto;
                            width: 100%
                        }

                        .prose :where(thead):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-bottom-color: var(--tw-prose-th-borders);
                            border-bottom-width: 1px
                        }

                        .prose :where(thead th):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-headings);
                            font-weight: 600;
                            padding-inline-end: .5714286em;
                            padding-bottom: .5714286em;
                            padding-inline-start: .5714286em;
                            vertical-align: bottom
                        }

                        .prose :where(tbody tr):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-bottom-color: var(--tw-prose-td-borders);
                            border-bottom-width: 1px
                        }

                        .prose :where(tbody tr:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-bottom-width: 0
                        }

                        .prose :where(tbody td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            vertical-align: baseline
                        }

                        .prose :where(tfoot):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-top-color: var(--tw-prose-th-borders);
                            border-top-width: 1px
                        }

                        .prose :where(tfoot td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            vertical-align: top
                        }

                        .prose :where(th, td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            text-align: start
                        }

                        .prose :where(figure>*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose :where(figcaption):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            color: var(--tw-prose-captions);
                            font-size: .875em;
                            line-height: 1.4285714;
                            margin-top: .8571429em
                        }

                        .prose {
                            --tw-prose-body: #374151;
                            --tw-prose-headings: #111827;
                            --tw-prose-lead: #4b5563;
                            --tw-prose-links: #111827;
                            --tw-prose-bold: #111827;
                            --tw-prose-counters: #6b7280;
                            --tw-prose-bullets: #d1d5db;
                            --tw-prose-hr: #e5e7eb;
                            --tw-prose-quotes: #111827;
                            --tw-prose-quote-borders: #e5e7eb;
                            --tw-prose-captions: #6b7280;
                            --tw-prose-kbd: #111827;
                            --tw-prose-kbd-shadows: 17 24 39;
                            --tw-prose-code: #111827;
                            --tw-prose-pre-code: #e5e7eb;
                            --tw-prose-pre-bg: #1f2937;
                            --tw-prose-th-borders: #d1d5db;
                            --tw-prose-td-borders: #e5e7eb;
                            --tw-prose-invert-body: #d1d5db;
                            --tw-prose-invert-headings: #fff;
                            --tw-prose-invert-lead: #9ca3af;
                            --tw-prose-invert-links: #fff;
                            --tw-prose-invert-bold: #fff;
                            --tw-prose-invert-counters: #9ca3af;
                            --tw-prose-invert-bullets: #4b5563;
                            --tw-prose-invert-hr: #374151;
                            --tw-prose-invert-quotes: #f3f4f6;
                            --tw-prose-invert-quote-borders: #374151;
                            --tw-prose-invert-captions: #9ca3af;
                            --tw-prose-invert-kbd: #fff;
                            --tw-prose-invert-kbd-shadows: 255 255 255;
                            --tw-prose-invert-code: #fff;
                            --tw-prose-invert-pre-code: #d1d5db;
                            --tw-prose-invert-pre-bg: rgba(0, 0, 0, .5);
                            --tw-prose-invert-th-borders: #4b5563;
                            --tw-prose-invert-td-borders: #374151;
                            font-size: 1rem;
                            line-height: 1.75
                        }

                        .prose :where(picture>img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose :where(li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .5em;
                            margin-top: .5em
                        }

                        .prose :where(ol>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .375em
                        }

                        .prose :where(ul>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .375em
                        }

                        .prose :where(.prose>ul>li p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .75em;
                            margin-top: .75em
                        }

                        .prose :where(.prose>ul>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.25em
                        }

                        .prose :where(.prose>ul>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em
                        }

                        .prose :where(.prose>ol>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.25em
                        }

                        .prose :where(.prose>ol>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em
                        }

                        .prose :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .75em;
                            margin-top: .75em
                        }

                        .prose :where(dl):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em;
                            margin-top: 1.25em
                        }

                        .prose :where(dd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: .5em;
                            padding-inline-start: 1.625em
                        }

                        .prose :where(hr+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose :where(h2+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose :where(h3+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose :where(h4+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose :where(thead th:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose :where(thead th:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose :where(tbody td, tfoot td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: .5714286em;
                            padding-bottom: .5714286em;
                            padding-top: .5714286em;
                            padding-inline-start: .5714286em
                        }

                        .prose :where(tbody td:first-child, tfoot td:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose :where(tbody td:last-child, tfoot td:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose :where(figure):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose :where(.prose>:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose :where(.prose>:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0
                        }

                        .prose-sm {
                            font-size: .875rem;
                            line-height: 1.7142857
                        }

                        .prose-sm :where(p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.1428571em;
                            margin-top: 1.1428571em
                        }

                        .prose-sm :where([class~=lead]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.2857143em;
                            line-height: 1.5555556;
                            margin-bottom: .8888889em;
                            margin-top: .8888889em
                        }

                        .prose-sm :where(blockquote):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em;
                            margin-top: 1.3333333em;
                            padding-inline-start: 1.1111111em
                        }

                        .prose-sm :where(h1):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 2.1428571em;
                            line-height: 1.2;
                            margin-bottom: .8em;
                            margin-top: 0
                        }

                        .prose-sm :where(h2):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.4285714em;
                            line-height: 1.4;
                            margin-bottom: .8em;
                            margin-top: 1.6em
                        }

                        .prose-sm :where(h3):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.2857143em;
                            line-height: 1.5555556;
                            margin-bottom: .4444444em;
                            margin-top: 1.5555556em
                        }

                        .prose-sm :where(h4):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            line-height: 1.4285714;
                            margin-bottom: .5714286em;
                            margin-top: 1.4285714em
                        }

                        .prose-sm :where(img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7142857em;
                            margin-top: 1.7142857em
                        }

                        .prose-sm :where(picture):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7142857em;
                            margin-top: 1.7142857em
                        }

                        .prose-sm :where(picture>img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose-sm :where(video):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7142857em;
                            margin-top: 1.7142857em
                        }

                        .prose-sm :where(kbd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .3125rem;
                            font-size: .8571429em;
                            padding-inline-end: .3571429em;
                            padding-bottom: .1428571em;
                            padding-top: .1428571em;
                            padding-inline-start: .3571429em
                        }

                        .prose-sm :where(code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8571429em
                        }

                        .prose-sm :where(h2 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .9em
                        }

                        .prose-sm :where(h3 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8888889em
                        }

                        .prose-sm :where(pre):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .25rem;
                            font-size: .8571429em;
                            line-height: 1.6666667;
                            margin-bottom: 1.6666667em;
                            margin-top: 1.6666667em;
                            padding-inline-end: 1em;
                            padding-bottom: .6666667em;
                            padding-top: .6666667em;
                            padding-inline-start: 1em
                        }

                        .prose-sm :where(ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.1428571em;
                            margin-top: 1.1428571em;
                            padding-inline-start: 1.5714286em
                        }

                        .prose-sm :where(ul):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.1428571em;
                            margin-top: 1.1428571em;
                            padding-inline-start: 1.5714286em
                        }

                        .prose-sm :where(li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .2857143em;
                            margin-top: .2857143em
                        }

                        .prose-sm :where(ol>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .4285714em
                        }

                        .prose-sm :where(ul>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .4285714em
                        }

                        .prose-sm :where(.prose-sm>ul>li p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .5714286em;
                            margin-top: .5714286em
                        }

                        .prose-sm :where(.prose-sm>ul>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.1428571em
                        }

                        .prose-sm :where(.prose-sm>ul>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.1428571em
                        }

                        .prose-sm :where(.prose-sm>ol>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.1428571em
                        }

                        .prose-sm :where(.prose-sm>ol>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.1428571em
                        }

                        .prose-sm :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .5714286em;
                            margin-top: .5714286em
                        }

                        .prose-sm :where(dl):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.1428571em;
                            margin-top: 1.1428571em
                        }

                        .prose-sm :where(dt):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.1428571em
                        }

                        .prose-sm :where(dd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: .2857143em;
                            padding-inline-start: 1.5714286em
                        }

                        .prose-sm :where(hr):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2.8571429em;
                            margin-top: 2.8571429em
                        }

                        .prose-sm :where(hr+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-sm :where(h2+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-sm :where(h3+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-sm :where(h4+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-sm :where(table):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8571429em;
                            line-height: 1.5
                        }

                        .prose-sm :where(thead th):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 1em;
                            padding-bottom: .6666667em;
                            padding-inline-start: 1em
                        }

                        .prose-sm :where(thead th:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose-sm :where(thead th:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose-sm :where(tbody td, tfoot td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 1em;
                            padding-bottom: .6666667em;
                            padding-top: .6666667em;
                            padding-inline-start: 1em
                        }

                        .prose-sm :where(tbody td:first-child, tfoot td:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose-sm :where(tbody td:last-child, tfoot td:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose-sm :where(figure):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7142857em;
                            margin-top: 1.7142857em
                        }

                        .prose-sm :where(figure>*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose-sm :where(figcaption):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8571429em;
                            line-height: 1.3333333;
                            margin-top: .6666667em
                        }

                        .prose-sm :where(.prose-sm>:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-sm :where(.prose-sm>:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0
                        }

                        .prose-base {
                            font-size: 1rem;
                            line-height: 1.75
                        }

                        .prose-base :where(p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em;
                            margin-top: 1.25em
                        }

                        .prose-base :where([class~=lead]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.25em;
                            line-height: 1.6;
                            margin-bottom: 1.2em;
                            margin-top: 1.2em
                        }

                        .prose-base :where(blockquote):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.6em;
                            margin-top: 1.6em;
                            padding-inline-start: 1em
                        }

                        .prose-base :where(h1):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 2.25em;
                            line-height: 1.1111111;
                            margin-bottom: .8888889em;
                            margin-top: 0
                        }

                        .prose-base :where(h2):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.5em;
                            line-height: 1.3333333;
                            margin-bottom: 1em;
                            margin-top: 2em
                        }

                        .prose-base :where(h3):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.25em;
                            line-height: 1.6;
                            margin-bottom: .6em;
                            margin-top: 1.6em
                        }

                        .prose-base :where(h4):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            line-height: 1.5;
                            margin-bottom: .5em;
                            margin-top: 1.5em
                        }

                        .prose-base :where(img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose-base :where(picture):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose-base :where(picture>img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose-base :where(video):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose-base :where(kbd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .3125rem;
                            font-size: .875em;
                            padding-inline-end: .375em;
                            padding-bottom: .1875em;
                            padding-top: .1875em;
                            padding-inline-start: .375em
                        }

                        .prose-base :where(code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .875em
                        }

                        .prose-base :where(h2 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .875em
                        }

                        .prose-base :where(h3 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .9em
                        }

                        .prose-base :where(pre):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .375rem;
                            font-size: .875em;
                            line-height: 1.7142857;
                            margin-bottom: 1.7142857em;
                            margin-top: 1.7142857em;
                            padding-inline-end: 1.1428571em;
                            padding-bottom: .8571429em;
                            padding-top: .8571429em;
                            padding-inline-start: 1.1428571em
                        }

                        .prose-base :where(ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em;
                            margin-top: 1.25em;
                            padding-inline-start: 1.625em
                        }

                        .prose-base :where(ul):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em;
                            margin-top: 1.25em;
                            padding-inline-start: 1.625em
                        }

                        .prose-base :where(li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .5em;
                            margin-top: .5em
                        }

                        .prose-base :where(ol>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .375em
                        }

                        .prose-base :where(ul>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .375em
                        }

                        .prose-base :where(.prose-base>ul>li p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .75em;
                            margin-top: .75em
                        }

                        .prose-base :where(.prose-base>ul>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.25em
                        }

                        .prose-base :where(.prose-base>ul>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em
                        }

                        .prose-base :where(.prose-base>ol>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.25em
                        }

                        .prose-base :where(.prose-base>ol>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em
                        }

                        .prose-base :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .75em;
                            margin-top: .75em
                        }

                        .prose-base :where(dl):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.25em;
                            margin-top: 1.25em
                        }

                        .prose-base :where(dt):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.25em
                        }

                        .prose-base :where(dd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: .5em;
                            padding-inline-start: 1.625em
                        }

                        .prose-base :where(hr):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 3em;
                            margin-top: 3em
                        }

                        .prose-base :where(hr+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-base :where(h2+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-base :where(h3+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-base :where(h4+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-base :where(table):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .875em;
                            line-height: 1.7142857
                        }

                        .prose-base :where(thead th):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: .5714286em;
                            padding-bottom: .5714286em;
                            padding-inline-start: .5714286em
                        }

                        .prose-base :where(thead th:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose-base :where(thead th:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose-base :where(tbody td, tfoot td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: .5714286em;
                            padding-bottom: .5714286em;
                            padding-top: .5714286em;
                            padding-inline-start: .5714286em
                        }

                        .prose-base :where(tbody td:first-child, tfoot td:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose-base :where(tbody td:last-child, tfoot td:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose-base :where(figure):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 2em;
                            margin-top: 2em
                        }

                        .prose-base :where(figure>*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose-base :where(figcaption):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .875em;
                            line-height: 1.4285714;
                            margin-top: .8571429em
                        }

                        .prose-base :where(.prose-base>:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-base :where(.prose-base>:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0
                        }

                        .prose-lg {
                            font-size: 1.125rem;
                            line-height: 1.7777778
                        }

                        .prose-lg :where(p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em;
                            margin-top: 1.3333333em
                        }

                        .prose-lg :where([class~=lead]):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.2222222em;
                            line-height: 1.4545455;
                            margin-bottom: 1.0909091em;
                            margin-top: 1.0909091em
                        }

                        .prose-lg :where(blockquote):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.6666667em;
                            margin-top: 1.6666667em;
                            padding-inline-start: 1em
                        }

                        .prose-lg :where(h1):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 2.6666667em;
                            line-height: 1;
                            margin-bottom: .8333333em;
                            margin-top: 0
                        }

                        .prose-lg :where(h2):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.6666667em;
                            line-height: 1.3333333;
                            margin-bottom: 1.0666667em;
                            margin-top: 1.8666667em
                        }

                        .prose-lg :where(h3):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: 1.3333333em;
                            line-height: 1.5;
                            margin-bottom: .6666667em;
                            margin-top: 1.6666667em
                        }

                        .prose-lg :where(h4):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            line-height: 1.5555556;
                            margin-bottom: .4444444em;
                            margin-top: 1.7777778em
                        }

                        .prose-lg :where(img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7777778em;
                            margin-top: 1.7777778em
                        }

                        .prose-lg :where(picture):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7777778em;
                            margin-top: 1.7777778em
                        }

                        .prose-lg :where(picture>img):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose-lg :where(video):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7777778em;
                            margin-top: 1.7777778em
                        }

                        .prose-lg :where(kbd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .3125rem;
                            font-size: .8888889em;
                            padding-inline-end: .4444444em;
                            padding-bottom: .2222222em;
                            padding-top: .2222222em;
                            padding-inline-start: .4444444em
                        }

                        .prose-lg :where(code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8888889em
                        }

                        .prose-lg :where(h2 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8666667em
                        }

                        .prose-lg :where(h3 code):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .875em
                        }

                        .prose-lg :where(pre):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            border-radius: .375rem;
                            font-size: .8888889em;
                            line-height: 1.75;
                            margin-bottom: 2em;
                            margin-top: 2em;
                            padding-inline-end: 1.5em;
                            padding-bottom: 1em;
                            padding-top: 1em;
                            padding-inline-start: 1.5em
                        }

                        .prose-lg :where(ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em;
                            margin-top: 1.3333333em;
                            padding-inline-start: 1.5555556em
                        }

                        .prose-lg :where(ul):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em;
                            margin-top: 1.3333333em;
                            padding-inline-start: 1.5555556em
                        }

                        .prose-lg :where(li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .6666667em;
                            margin-top: .6666667em
                        }

                        .prose-lg :where(ol>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .4444444em
                        }

                        .prose-lg :where(ul>li):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: .4444444em
                        }

                        .prose-lg :where(.prose-lg>ul>li p):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .8888889em;
                            margin-top: .8888889em
                        }

                        .prose-lg :where(.prose-lg>ul>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.3333333em
                        }

                        .prose-lg :where(.prose-lg>ul>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em
                        }

                        .prose-lg :where(.prose-lg>ol>li>p:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.3333333em
                        }

                        .prose-lg :where(.prose-lg>ol>li>p:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em
                        }

                        .prose-lg :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: .8888889em;
                            margin-top: .8888889em
                        }

                        .prose-lg :where(dl):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.3333333em;
                            margin-top: 1.3333333em
                        }

                        .prose-lg :where(dt):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 1.3333333em
                        }

                        .prose-lg :where(dd):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: .6666667em;
                            padding-inline-start: 1.5555556em
                        }

                        .prose-lg :where(hr):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 3.1111111em;
                            margin-top: 3.1111111em
                        }

                        .prose-lg :where(hr+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-lg :where(h2+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-lg :where(h3+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-lg :where(h4+*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-lg :where(table):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8888889em;
                            line-height: 1.5
                        }

                        .prose-lg :where(thead th):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: .75em;
                            padding-bottom: .75em;
                            padding-inline-start: .75em
                        }

                        .prose-lg :where(thead th:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose-lg :where(thead th:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose-lg :where(tbody td, tfoot td):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: .75em;
                            padding-bottom: .75em;
                            padding-top: .75em;
                            padding-inline-start: .75em
                        }

                        .prose-lg :where(tbody td:first-child, tfoot td:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-start: 0
                        }

                        .prose-lg :where(tbody td:last-child, tfoot td:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            padding-inline-end: 0
                        }

                        .prose-lg :where(figure):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 1.7777778em;
                            margin-top: 1.7777778em
                        }

                        .prose-lg :where(figure>*):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0;
                            margin-top: 0
                        }

                        .prose-lg :where(figcaption):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            font-size: .8888889em;
                            line-height: 1.5;
                            margin-top: 1em
                        }

                        .prose-lg :where(.prose-lg>:first-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-top: 0
                        }

                        .prose-lg :where(.prose-lg>:last-child):not(:where([class~=not-prose], [class~=not-prose] *)) {
                            margin-bottom: 0
                        }
                    </style>
                    {{-- Sanitizar HTML para evitar XSS --}}
                    {!! str($post->body)->sanitizeHtml() !!}
                </div>

                {{-- Video en lengua de señas (si aplica) --}}
                @if ($post->banner_video_url)
                    <div class="mt-10">
                        <h2 class="text-sm font-semibold text-gray-700 mb-2">Video en Lengua de Señas:</h2>
                        <div class="aspect-video bg-black rounded-lg overflow-hidden shadow">
                            <iframe class="w-full h-full" src="{{ $post->banner_video_url }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                @endif

                {{-- Tags --}}
                @if ($post->tags->count())
                    <div class="mt-6">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('blog.category', ['category' => $tag->slug]) }}"
                                    class="text-xs bg-amber-100 text-amber-700 font-medium px-2 py-1 rounded">
                                    <i class="fas fa-tag text-amber-500 mr-1"></i>{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </article>
    </div>
@endsection
