<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4>{{$pageTitle}}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @isset($breadcrumbs)
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
                                @if(isset($breadcrumb['link']))
                                    <a href="{{asset($breadcrumb['link'])}}">
                                        @if($breadcrumb['name'] === 'Dashboard')
                                            <i class="bx bxs-dashboard font-size-16" title="Dashboard"></i>
                                        @else
                                            {{$breadcrumb['name']}}
                                        @endif
                                    </a>
                                @else
                                    {{$breadcrumb['name']}}
                                @endif
                            </li>
                        @endforeach
                    @endisset
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
