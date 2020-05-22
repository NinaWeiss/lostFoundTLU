@extends('layouts.main')

@section('content')
<div class="form-wrap">
    <div class="col-12">
        <h3>Kogumispunktid:</h3>
        <div class="table-wrapper">
            <table class="alt">
                <tbody>
                    @foreach ($locations as $loc)
                        <tr>
                            <td>{{'# '. $loc->id }}</td>
                            <td>{{ $loc->name }}</td>
                            <td style="text-align: center;">
                                <span class="edit-buttons">
                                    <a href="{{ route('found') }}"><i class="fas fa-trash-alt"></i></a>
                                </span>
                                <span class="edit-buttons">
                                    <a href="{{ route('found') }}"><i class="fas fa-edit"></i></a>
                                </span>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="#" method="post">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="new-cat" placeholder="Uus kogumispunkt">
                    <input type="submit" value="Lisa uus" style="float: left; margin-top: 10px;">
                </div>
        </form>
    </div>
</div>
@endsection