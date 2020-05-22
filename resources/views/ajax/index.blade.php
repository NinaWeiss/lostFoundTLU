

@foreach ($item as $i)
    {{ $i->id }}
    {{ $i->name }}
    {{ $i->description }}
    {{ $i->location }}
    <img src="images/600x400/{{ $i->image }}" alt="{{ $i->name }}">
@endforeach