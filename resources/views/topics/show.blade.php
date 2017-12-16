@extends('layouts.master')
@section('content')

    <div class="main__container">

        @include('partials.status')

        <header class="main__title">
            <div class="row">
                <h2>{{ $topic->name }}</h2>

                <div class="action-header__item action-header__add">
                    <a href="/topics/{{ $topic->id }}/sub-topic/create" class="btn btn-success btn-md">+ Add New Sub Topic</a>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-md-12">
                <div class="list-group list-group--block contact-lists">
                    <div class="list-group__wrap">
                        @if($topic->subTopics->count() === 0)
                            <div class="col-sm-12">
                                <h5>There no sub topics that have been added.</h5>
                            </div>
                        @else

                            @foreach($topic->subTopics as $subTopic)
                                {{-- <a class="list-group-item media" href="/topics/sub-topic/{{ $subTopic->id }}" data-toggle="modal"> --}}
                                <div class="list-group-item media" data-toggle="modal">
                                    <div class="pull-left">
                                        <div class="avatar-char mdc-bg-amber-400">ST</div>
                                    </div>
                                    <div class="media-body list-group__text">
                                        <h4>{{ $subTopic->name }}</h4>
                                        <i>{{ $subTopic->description }}</i>
                                        <br><br>
                                        <div class="col-sm-12">
                                            <span><h5>Translations: {{ 5 }}</h5></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="action-header__item action-header__add">
            <form method="POST" action="/topics/{{ $topic->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="btn btn-danger btn-md">
                    <i class="zmdi zmdi-delete"></i>  Delete Topic
                </button>
            </form>
        </div>

    </div>

@endsection