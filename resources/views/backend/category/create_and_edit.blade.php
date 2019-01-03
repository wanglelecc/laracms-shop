@extends('backend::layouts.app')

@section('title', $title = $category->id ? '编辑分类' : '添加分类' )

@section('breadcrumb')
    <li><a href="javascript:;">商城设置</a></li>
    <li><a href="javascript:;">类目管理</a></li>
    <li class="active">{{$title}}</li>
@endsection

@section('content')

    @php
        $categoryHandler = app(\Wanglelecc\Laracms\Handlers\CategoryHandler::class);
        $categoryItems = $categoryHandler->select($categorys);
    @endphp

    <h2 class="header-dividing">{{$title}} <small></small></h2>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $category->id ? route('administrator.shop.category.update', [$category->id]) : route('administrator.shop.category.store') }}?redirect={{ previous_url() }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" class="mini-hidden" value="{{ $category->id ? 'PUT' : 'POST' }}">

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="parent" class="col-md-2 col-sm-2 control-label required">父级</label>
                            <div class="col-md-5 col-sm-10">
                            <select data-placeholder="请选择父级菜单" class="chosen-select form-control"  tabindex="2" name="parent">
                                <option value=""></option>
                                <option @if($parent == 0) selected @endif value="0">/</option>
                                @foreach($categoryItems as $key => $value)
                                    <option @if($parent == $key) selected @endif value="{{$key}}">/ {{$value}}</option>
                                @endforeach
                            </select></div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="name" class="col-md-2 col-sm-2 control-label required">名称</label>
                            <div class="col-md-5 col-sm-10">
                            <input type="text" name="name" autocomplete="off" class="form-control" value="{{ old('name',$category->name) }}"
                                   required
                                   data-fv-trigger="blur"
                                   minlength="1"
                                   maxlength="128"
                            ></div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="" class="col-md-2 col-sm-2 control-label">别名</label>
                            <div class="col-md-5 col-sm-10">
                            <input type="text" name="alias" placeholder="请输入别名" class="form-control" value="{{  old('description', $category->alias) }}"
                                      data-fv-trigger="blur"
                                      maxlength="255"
                            ></div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="" class="col-md-2 col-sm-2 control-label required">排序</label>
                            <div class="col-md-5 col-sm-10">
                            <input type="number" name="order" autocomplete="off" placeholder="请输入排序" class="form-control" value="{{ old('order',$category->order) }}"
                                   required
                                   data-fv-trigger="blur"
                                   min="1"
                                   max="99999"
                            ></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-5 col-sm-10">
                                <button type="submit" class="btn btn-primary">提交</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection