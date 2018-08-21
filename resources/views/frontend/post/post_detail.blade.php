@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => @$postDetail->title ])
        @include('frontend.message')
        <div class="content_wrap r_sidebar">
            <div class="content entry">
                <div class="blog opened-article">
                    <!--  Start Post Single Article  -->
                    <article id="post-{{@$postDetail->id}}"
                             class="cmsmasters_open_post post-85 post type-post status-publish format-image has-post-thumbnail hentry category-advice category-training post_format-post-format-image">
                        <div class="cmsmasters_post_date_wrap"><span class="cmsmasters_post_date"><abbr
                                        class="published"
                                        title="{{@$postDetail->created_at}}">{{@$postDetail->created_at}}</abbr><abbr
                                        class="dn date updated"
                                        title="{{@$postDetail->updated_at}}">{{@$postDetail->updated_at}}</abbr></span>
                            <header class="cmsmasters_post_header entry-header"><h2
                                        class="cmsmasters_post_title entry-title">{{@$postDetail->title}}</h2>
                            </header>
                            <figure class="cmsmasters_img_wrap">
                                <a title="{{@$postDetail->title}}" class="cmsmasters_img_link">
                                    <img width="860" height="526"
                                         src="{{ asset($postDetail->image_url) }}"
                                         class="" alt="6 Full-Body Stretching Exercises"
                                         title="{{$postDetail->title}}"
                                         srcset="{{ asset($postDetail->image_url) }} 860w,
                                                 {{ asset($postDetail->image_url) }} 300w,
                                                 {{ asset($postDetail->image_url) }} 768w,
                                                 {{ asset($postDetail->image_url) }} 1024w,
                                                 {{ asset($postDetail->image_url) }} 600w,
                                                 {{ asset($postDetail->image_url) }} 580w,
                                                 {{ asset($postDetail->image_url) }} 1160w"
                                         sizes="(max-width: 860px) 100vw, 860px"/></a>
                            </figure>
                            <div class="cmsmasters_post_content entry-content">
                                {!!html_entity_decode(@$postDetail->content) !!}
                            </div>
                    </article>

                </div>
            </div>
            <!--  Finish Content  -->
            @include('frontend.post.post_sidebar')
        </div>
    </div>
    </div>


    </div>
@stop
