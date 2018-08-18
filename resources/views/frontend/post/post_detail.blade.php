@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => $postDetail->title ])
        @include('frontend.message')

        <div class="content_wrap r_sidebar">
            <div class="content entry">
                <div class="blog opened-article"><!--  Start Post Single Article  -->
                    <article id="post-85"
                             class="cmsmasters_open_post post-85 post type-post status-publish format-image has-post-thumbnail hentry category-advice category-training post_format-post-format-image">
                        <div class="cmsmasters_post_date_wrap"><span class="cmsmasters_post_date"><abbr
                                        class="published" title="{{$postDetail->created_at}}">{{$postDetail->created_at}}</abbr><abbr
                                        class="dn date updated" title="{{$postDetail->updated_at}}">{{$postDetail->updated_at}}</abbr></span>
                            <header class="cmsmasters_post_header entry-header"><h2
                                        class="cmsmasters_post_title entry-title">{{$postDetail->title}}</h2>
                            </header>
                            <figure class="cmsmasters_img_wrap"><a
                                        title="{{$postDetail->title}}" rel="ilightbox[img_85_5b77b295587aa]"
                                        class="cmsmasters_img_link"><img width="860" height="526"
                                                                         src="{{$postDetail->image_url}}"
                                                                         class="" alt="6 Full-Body Stretching Exercises"
                                                                         title="{{$postDetail->title}}"
                                                                         srcset="{{$postDetail->image_url}} 860w, {{$postDetail->image_url}} 300w, {{$postDetail->image_url}} 768w, {{$postDetail->image_url}} 1024w, h{{$postDetail->image_url}} 600w, {{$postDetail->image_url}} 580w,{{$postDetail->image_url}} 1160w"
                                                                         sizes="(max-width: 860px) 100vw, 860px"/></a>
                            </figure>
                            <div class="cmsmasters_post_content entry-content">
                                {{$postDetail->content}}
                            </div>
                    </article>

                </div>
            </div>
            <!--  Finish Content  -->
            <!--  Start Sidebar  -->
            <div class="sidebar">
                <aside id="custom-posts-tabs-2" class="widget widget_custom_posts_tabs_entries">
                    <div class="cmsmasters_tabs tabs_mode_tab lpr">
                        <ul class="cmsmasters_tabs_list">
                            <li class="cmsmasters_tabs_list_item current_tab">
                                <a href="#"><span>Latest</span></a></li>

                        </ul>
                        <div class="cmsmasters_tabs_wrap">
                            <div class="cmsmasters_tab tab_latest">
                                <ul>
                                    @foreach($newestPost as $post)
                                    <li>
                                        <div class="cmsmasters_lpr_tabs_img">
                                            <figure class="cmsmasters_img_wrap"><a
                                                        href="{{route('post.show', ['id' => $post->id])}}"
                                                        title=" {{$post->title}}"
                                                        class="cmsmasters_img_link"><img width="70" height="70"
                                                                                         src=" {{$post->image_url}}"
                                                                                         class=" wp-post-image"
                                                                                         alt=" {{$post->title}}"
                                                                                         title=" {{$post->title}}"
                                                                                         srcset="{{$post->image_url}} 70w,{{$post->image_url}} 150w, {{$post->image_url}} 300w, {{$post->image_url}} 360w,{{$post->image_url}} 580w, {{$post->image_url}} 180w, {{$post->image_url}} 600w"
                                                                                         sizes="(max-width: 70px) 100vw, 70px"/></a>
                                            </figure>
                                        </div>

                                        <div class="cmsmasters_lpr_tabs_cont">
                                            <a href="{{route('post.show', ['id' => $post->id])}}"
                                               title="{{$post->title}}">
                                                {{$post->title}}
                                            </a>
                                            <abbr class="published" title="{{$post->created_at}}">{{$post->created_at}}
                                            </abbr>
                                        </div>

                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>

                </aside>
            </div>
            <!--  Finish Sidebar  -->


        </div>
    </div>
    </div>


    </div>
@stop
