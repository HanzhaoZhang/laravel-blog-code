@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">用户登录</div>
                    <div class="card-body">
                        @include('admin.partials.errors')
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-md-4 clo-form-label text-md-right">邮箱</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 clo-form-label text-md-right">密码</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-offset-md-4">
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input" type="checkbox" name="remember"> 记住我
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-offset-md-4">
                                    <button class="btn btn-primary" type="submit">登录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
