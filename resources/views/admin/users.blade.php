@extends('layouts.main')

@section('content')
<!-- List of users -->
<div class="table-wrapper">
    <h3>Kõik kasutajad:</h3>
    <table class="alt">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nimi</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->name == $currentUser->name)
                    <tr>
                        <td>{{'# '. $user->id }}</td>
                        <td>{{ $user->name. ' (Teie)' }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-align: center;">
                            <span class="edit-buttons">
                                <a href="{{ route('found') }}"><i class="fas fa-trash-alt"></i></a>
                            </span>
                            <span class="edit-buttons">
                                <a href="{{ route('found') }}"><i class="fas fa-edit"></i></a>
                            </span>
                        </td>
                    </tr>  
                @else
                    <tr>
                        <td>{{'# '. $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-align: center;">
                            <span class="edit-buttons">
                                <a href="{{ route('found') }}"><i class="fas fa-trash-alt"></i></a>
                            </span>
                            <span class="edit-buttons">
                                <a href="{{ route('found') }}"><i class="fas fa-edit"></i></a>
                            </span>
                        </td>
                    </tr>  
                @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('register') }}" style="border:none;"><button>Loo uus kasutaja</button></a>
</div>
@endsection