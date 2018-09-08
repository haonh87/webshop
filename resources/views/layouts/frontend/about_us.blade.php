@extends('layouts.master')
@section('script')
@stop
@section('content')
    <style id='sports-store-retina-inline-css' type='text/css'>
        #cmsmasters_row_b34dab1607 .cmsmasters_row_outer_parent {
            padding-top: 100px;
        }

        #cmsmasters_row_b34dab1607 .cmsmasters_row_outer_parent {
            padding-bottom: 100px;
        }
    </style>
    <div id="content">
        @include('frontend.header_line', ['name' => 'Giới thiệu'])
        @include('frontend.message')
        <div class="middle_inner">
            <div class="content_wrap fullwidth">
                <!--  Start Content  -->
                <div class="middle_content entry"></div>
            </div>
            <div id="cmsmasters_row_b34dab1607"
                 class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
                <div class="cmsmasters_row_outer_parent">
                    <div class="cmsmasters_row_outer">
                        <div class="cmsmasters_row_inner">
                            <div class="cmsmasters_row_margin cmsmasters_11">
                                <div id="cmsmasters_column_c731b5760e" class="cmsmasters_column one_first">
                                    <div class="cmsmasters_column_inner">
                                        <div class="cmsmasters_text">
                                            {!!html_entity_decode(@$info->content) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cl"></div>
            <div class="content_wrap fullwidth">
                <div class="middle_content entry"></div>
                <!--  Finish Content  -->
            </div>
        </div>
    </div>
@stop
