@if ($paginator->hasPages())
    <nav role="navigation" class="navigation align-center">

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                
                                        <a href="#" class="page-numbers bg-border-color current">{{ $page }}</a>
                                 
                                @else
                                    <a href="{{ $url }}" class="page-numbers bg-border-color" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
    </nav>
@endif
