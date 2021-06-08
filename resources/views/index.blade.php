@extends('Forum::layouts.app')
@section('title', 'HTSHOP')
@section('content')
    <div class="container">
        <div class="row row-cards justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">创建任务</h3>
                    <div class="col-12">
                        <form action="{{ route('Htshop.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">任务名</label>
                                <input type="text" class="form-control" name="name" placeholder="账号***的任务">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Cookies</label>
                                <textarea class="form-control" name="cookies" rows="4"></textarea>
                              </div>
                              <button class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
