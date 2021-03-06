@extends('blog.layouts.master',['meta_description' => '联系我们'])

@section('page-header')
    <header class="masthead" style="background-image: url('{{ page_image('contact-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>联系我们</h1>
                        <span class="subheading">你有问题？我有答案</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @include('admin.partials.errors')
                @include('admin.partials.success')

                <p>
                    想与我联系？填写下面的表单给我发消息，我会尽快回复！
                </p>

                <form name="sentMessage" action="/contact" method="post" id="contactForm" novalidate>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>姓名</label>
                            <input type="text" name="name" class="form-control" placeholder="填写您的姓名" id="name">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>邮箱</label>
                            <input type="email" name="email" class="form-control" placeholder="填写您的邮箱" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>手机</label>
                            <input type="tel" name="phone" class="form-control" placeholder="填写您的手机" id="phone">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>消息</label>
                            <textarea name="message" id="message" rows="8" placeholder="填写您想发送的消息"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="sublimt" class="btn btn-primary" id="sendMessageButton">发送</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
