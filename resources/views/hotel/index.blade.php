@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hotels</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hotel') }}" title="Create a Hotel"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($hotels as $hotel)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->city }}</td>
                <td>{{ $hotel->country }}</td>
                <td>{{ date_format($hotel->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('hotel.destroy', $hotel->id) }}" method="POST">

                        <a href="{{ route('hotel.show', $hotel->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('hotel.edit', $hotel->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
