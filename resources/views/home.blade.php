@extends('layouts.app')

@section('content')
<?php //print_r($news[0]->category->title_uz);exit; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>Post</th>
                            <th>Category</th>
                        </tr>
                        @foreach ($news as $new)
                            <tr>
                                <td>{{ $new->title }}</td>
                                <td>{{ $new->category?->title_uz }}</td>
                            </tr>
                        @endforeach
                    </table>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
