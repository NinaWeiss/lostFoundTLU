<!-- Sidebar -->
<div id="sidebar">
    <div class="inner">

        @if ($currentPage == 'found')
            <livewire:search-dropdown-found>
        @elseif ($currentPage == 'lost')
            <livewire:search-dropdown-lost>
        @endif
        <!-- Menu -->
        <nav id="menu">
            <header class="major major-heading">
                <h2>Kategooriad</h2>
            </header>
            <ul>
                @foreach ($categories as $cat)
                    <li><a href="{{ route('found', ['category' => $cat->id]) }}">{{ $cat->name }}</a></li>
                @endforeach
                @if ($currentPage == 'found')
                    <li><a href="{{ route('found') }}">{{ __('Kõik') }}</a></li>
                @elseif ($currentPage == 'lost')
                    <li><a href="{{ route('lost') }}">{{ __('Kõik') }}</a></li>
                @endif
            </ul>
        </nav>
        <livewire:styles>
        <livewire:scripts>
    </div>
</div>