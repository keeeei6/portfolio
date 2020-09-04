@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">入力フォーム</div>
                <br>
                <p class="text-danger">※入力欄は半角数字で入力してください</p>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('content.update', ['id' => $content->id ]) }}" >
                    @csrf
                      <div class="form-group">
                        <label>月 <span class="text-danger small"> ※必須</span> </label>
                        <br>
                        <input type="month" name="month" value="{{ $content->month }}">
                      </div>
                      <div class="form-group">
                        <label>収入 <span class="text-danger small"> ※必須</span> </label>
                        <br>
                        <input type="text" name="income" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ ($content->income) }}">
                      </div>

                      <div class="form-group">
                        <label>家賃</label>
                        <br>
                        <input type="text" name="rent" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ ($content->rent) }}">
                      </div>

                      <div class="form-group">
                        <label>光熱費</label>
                        <br>
                        <input type="text" name="utility" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ ($content->utility) }}">
                      </div>

                      <div class="form-group">
                        <label>クレジット</label>
                        <br>
                        <input type="text" name="credit" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ ($content->credit) }}">
                      </div>

                      <div class="form-group">
                        <label>その他の経費</label>
                        <br>
                        <input type="text" name="etc" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ ($content->etc) }}">
                      </div>
                      <br><br>
                      <button type="submit" class="btn btn-primary">ポートフォリオを再作成する</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection