@extends('layouts.master')
@section('script')
@stop
<style id='sports-store-retina-inline-css' type='text/css'>
    #cmsmasters_row_dd69359c02 .cmsmasters_row_outer_parent {
        padding-top: 70px;
    }

    #cmsmasters_row_dd69359c02 .cmsmasters_row_outer_parent {
        padding-bottom: 90px;
    }


</style>
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Bài viết'])
        @include('frontend.message')
        <div class="middle_inner">
            <div class="content_wrap fullwidth">
            </div>
            <div id="cmsmasters_row_dd69359c02"
                 class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
                <div class="cmsmasters_row_outer_parent">
                    <div class="cmsmasters_row_outer">
                        <div class="cmsmasters_row_inner">
                            <div class="cmsmasters_row_margin cmsmasters_11">
                                <div id="cmsmasters_column_cc9f84b14e" class="cmsmasters_column one_first">
                                    <div class="cmsmasters_column_inner">
                                        <div id="blog_fb6a93754e" class="cmsmasters_wrap_blog entry-summary"
                                             data-layout="columns" data-layout-mode="grid"
                                             data-url="http://sports-store.cmsmasters.net/wp-content/plugins/cmsmasters-content-composer/"
                                             data-orderby="date" data-order="ASC" data-count="6"
                                             data-categories="advice,fitness-fashion,perfect-body,sports-together,training"
                                             data-metadata="date,more" data-pagination="pagination">
                                            <div class="blog columns grid cmsmasters_3 isotope"
                                                 style="position: relative; height: 864.876px;">
                                                <!--  Start Post Masonry Article  -->

                                                @foreach($postList as $key => $post)
                                                    <article id="post-{{$post->id}}"
                                                             class="cmsmasters_post_masonry post-10736 post type-post status-publish format-image has-post-thumbnail hentry category-perfect-body post_format-post-format-image shortcode_animated"
                                                             data-category="perfect-body"
                                                             style="width: 325px; position: absolute; left: 0px; top: 0px;">
                                                        <div class="cmsmasters_post_cont">
                                                            <figure class="cmsmasters_img_wrap">
                                                                <a href="{{route('post.show', ['id' => $post->id])}}" title="{{$post->title}}"
                                                                   rel="ilightbox[img_10736_5b77914d5f921]"
                                                                   class="cmsmasters_img_link">
                                                                    <img width="580" height="355"
                                                                         src="{{$post->image_url}}"
                                                                         class="wp-post-image"
                                                                         alt="{{$post->title}}"
                                                                         title="{{$post->title}}"
                                                                         sizes="(max-width: 580px) 100vw, 580px"
                                                                         srcset="{{$post->image_url}} 580w, {{$post->image_url}} 300w, {{$post->image_url}} 768w, {{$post->image_url}} 1024w,{{$post->image_url}} 600w, {{$post->image_url}} 860w, {{$post->image_url}} 1160w">
                                                                </a>
                                                            </figure>
                                                            <div class="cmsmasters_post_date_wrap"><span
                                                                        class="cmsmasters_post_date"><abbr
                                                                            class="published"
                                                                            title="{{$post->created_at}}">{{$post->created_at}}</abbr><abbr
                                                                            class="dn date updated"
                                                                            title="{{$post->updated_at}}">{{$post->updated_at}}</abbr></span>
                                                            </div>
                                                            <header class="cmsmasters_post_header entry-header"><h5
                                                                        class="cmsmasters_post_title entry-title"><a
                                                                            href="">"{{$post->title}}" </a></h5>
                                                            </header>
                                                            <div class="cmsmasters_post_content entry-content">
                                                                <p>
                                                                    {{$post->description}}
                                                                </p>
                                                            </div>
                                                            <footer class="cmsmasters_post_footer"><a
                                                                        class="cmsmasters_post_read_more" href="{{route('post.show', ['id' => $post->id])}}">Read
                                                                    More</a></footer>
                                                        </div>
                                                    </article>
                                                    <!--  Finish Post Masonry Article  -->
                                            @endforeach
                                            <!--  Finish Post Masonry Article  -->
                                            </div>
                                            <div class="cmsmasters_wrap_more_posts cmsmasters_wrap_more_items"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
