@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">入力フォーム</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/" >
                    @csrf
                      <div class="form-group">
                        <label>月</label>
                        <br>
                        <input type="month" name="month">
                      </div>
                      <div class="form-group">
                        <label>収入</label>
                        <br>
                        <input type="text" name="incom" oninput="value = value.replace(/[^0-9]+/i,'');">
                      </div>

                      <div class="form-group">
                        <label>家賃</label>
                        <br>
                        <input type="text" name="rent" oninput="value = value.replace(/[^0-9]+/i,'');">
                      </div>

                      <div class="form-group">
                        <label>光熱費</label>
                        <br>
                        <input type="text" name="utility" oninput="value = value.replace(/[^0-9]+/i,'');">
                      </div>

                      <div class="form-group">
                        <label>クレジット</label>
                        <br>
                        <input type="text" name="credit" oninput="value = value.replace(/[^0-9]+/i,'');">
                      </div>

                      <div class="form-group">
                        <label>その他の経費</label>
                        <br>
                        <input type="text" name="etc" oninput="value = value.replace(/[^0-9]+/i,'');">
                      </div>


                      <button type="submit" class="btn btn-primary">完了</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection