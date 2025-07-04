@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">

            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link bg-success text-white border-success">&laquo; Sebelumnya</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link bg-success text-white border-success" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Sebelumnya</a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link bg-light text-muted">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link bg-success text-white border-success">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-success text-success" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-success text-white border-success" href="{{ $paginator->nextPageUrl() }}" rel="next">Berikutnya &raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link bg-success text-white border-success">Berikutnya &raquo;</span>
                </li>
            @endif

        </ul>
    </nav>
@endif
