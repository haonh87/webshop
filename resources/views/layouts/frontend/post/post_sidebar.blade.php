<!--  Start Sidebar  -->
<div class="sidebar">
    <aside id="custom-posts-tabs-2" class="widget widget_custom_posts_tabs_entries">
        <div class="cmsmasters_tabs tabs_mode_tab lpr">
            <ul class="cmsmasters_tabs_list">
                <li class="cmsmasters_tabs_list_item current_tab" style="float:left">
                    <a href="javascript:void(0)">
                        <span>Latest</span>
                    </a>
                </li>
            </ul>
            <div class="cmsmasters_tabs_wrap">
                <div class="cmsmasters_tab tab_latest">
                    <ul>
                        @foreach($newestPost as $post)
                            <li>
                                <div class="cmsmasters_lpr_tabs_img">
                                    <figure class="cmsmasters_img_wrap">
                                        <a href="{{route('post.show', ['id' => @$post->id])}}"
                                           title=" {{@$post->title}}"
                                           class="cmsmasters_img_link">
                                            <img style="width: 60px;height: 60px;"
                                                 src="{{ asset(@$post->image_url) }}"
                                                 class=" wp-post-image"
                                                 alt=" {{@$post->title}}"
                                                 title=" {{@$post->title}}"
                                                 srcset="{{ asset(@$post->image_url) }} 70w,
                                                         {{ asset(@$post->image_url) }} 150w,
                                                         {{ asset(@$post->image_url) }} 300w,
                                                         {{ asset(@$post->image_url) }} 360w,
                                                         {{ asset(@$post->image_url) }} 580w,
                                                         {{ asset(@$post->image_url) }} 180w,
                                                         {{ asset(@$post->image_url) }} 600w"
                                                 sizes="(max-width: 70px) 100vw, 70px"/></a>
                                    </figure>
                                </div>

                                <div class="cmsmasters_lpr_tabs_cont">
                                    <a href="{{route('post.show', ['id' => @$post->id])}}"
                                       title="{{@$post->title}}">
                                        {{str_limit(@$post->title, 19)}}
                                    </a>
                                    <abbr class="published"
                                          title="{{@$post->created_at}}">{{@$post->created_at}}
                                    </abbr>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>
<!--  Finish Sidebar  -->