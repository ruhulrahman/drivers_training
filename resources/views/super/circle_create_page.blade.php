@extends('index')
@section('page_content');
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN THEME CUSTOMIZER-->
        <div id="theme-change" class="hidden-phone">
            <i class="icon-cogs"></i>
            <span class="settings">
                <span class="text">Theme Color:</span>
                <span class="colors">
                    <span class="color-default" data-style="default"></span>
                    <span class="color-green" data-style="green"></span>
                    <span class="color-gray" data-style="gray"></span>
                    <span class="color-purple" data-style="purple"></span>
                    <span class="color-red" data-style="red"></span>
                </span>
            </span>
        </div>
        <!-- END THEME CUSTOMIZER-->
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Creating Circle Office
        </h3>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
                <span class="divider">/</span>
            </li>
            <li class="active">
                Circle Office
            </li>
            <li class="pull-right search-wrap">
                <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                    <div class="input-append search-input-area">
                        <input class="" id="appendedInputButton" type="text">
                        <button class="btn" type="button"><i class="icon-search"></i> </button>
                    </div>
                </form>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span6">
        <h4 class="text-success">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
        </h4>
        <div class="widget box purple">
            <div class="widget-title">
                <h4>
                    <span><i class="icon-reorder"></i> Create New Circle Office</span>
                </h4>

                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="alert alert-success print-success-msg text-center" style="display: none;"></div>
                <div class="" id="">
                    <h3>Create a Circle Office</h3>

                    <form action="{{ url('/circle-create') }}" method="post">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <label class="control-label">Enter Circle Office Name</label>
                            <div class="controls">
                                <input name="circle_name" type="text" placeholder="Enter Circle Office Name" class="span6" required="required" />
                                <span class="help-inline"></span>

                                <input type="submit" class="form-control btn btn-primary" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="span6">
        <h4 class="text-success">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
        </h4>
        <div class="widget box purple">
            <div class="widget-title">
                <h4>
                    <span><i class="icon-reorder"></i> Create New Circle Office</span>
                </h4>

                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="alert alert-success print-success-msg text-center" style="display: none;"></div>
                <div class="" id="">
                    <h3>Create a Circle Office</h3>

                    <form action="{{ url('/circle-create') }}" method="post">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <label class="control-label">Enter Circle Office Name</label>
                            <div class="controls">
                                <input name="circle_name" type="text" placeholder="Enter Circle Office Name" class="span6" required="required" />
                                <span class="help-inline"></span>

                                <input type="submit" class="form-control btn btn-primary" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->


<script type="text/javascript">
    function ajaxGET(div, url, data) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function () {
            $('#' + div).html("").css('color', '#000');
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                $('#' + div).append(xmlhttp.responseText);
//                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                if (div == 'create_dist_division_id' || div == 'create_thana_division_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select Country First</option>';
                    $('#' + div).css('color', 'red');
                } else if (div == 'create_thana_dist_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select Division/State First</option>';
                    $('#' + div).css('color', 'red');
                } else if (div == 'org_cty') {
                    document.getElementById(div).innerHTML = '<option value="">Select Division/State First</option>';
                    $('#' + div).css('color', 'red');
                }
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send(data);
    }
</script>

@endsection
