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
                          <td><a href="{{ route('content.show', ['id' => $content->id ]) }}">ポートフォリオ</a></td>
                          <td>
                            <form method="POST" action="{{ route('content.destroy', ['id' => $content->id ]) }}" id="delete_{{ $content->id }}" >
                            @csrf
                            <a href="#" data-id="{{ $content->id }}" onclick="deletePost(this);">削除する</a>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

function deletePost(e){
    'use strict';
    if (confirm('本当に削除してよろしいですか？')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
}

</script>

@endsection
