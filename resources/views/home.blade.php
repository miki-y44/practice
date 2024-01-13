@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メッセージ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('ようこそ！！') }}</p>
                    <p>{{ __('ご新規の方は新規登録をしてください。')}}</p>
                    <p>{{ __('登録済みの方はログインをしてください。')}}</p>
                    <p>{{ __('終了の方はログアウトをしてください。')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
