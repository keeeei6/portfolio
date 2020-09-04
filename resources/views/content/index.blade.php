@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('content.create') }}">
                    <button type="submit" class="btn btn-outline-primary">
                        新規作成
                    </button>
                    </form>
                    <br>
                    
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Month</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contents as $content)
                        <tr>
                          <th scope="row"></th>
                          <td>{{ $content->month }}</td>
                          <td><a href="{{ route('content.show', ['id' => $content->id ]) }}">詳細</a></td>
                          <td>削除</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
