<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl':'ltr'}}">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
	@include('base_layout.components.header.header_meta')
	@yield('style')
</head>
<!-- END HEAD -->
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
        	<!-- BEGIN HEADER -->
        	@include('base_layout.components.header.header')
        	<!-- END HEADER -->

        	<!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container">
            	@includeIf('base_layout.components.sidebar')
            	<!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @elseif(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                    	@yield('body')
                    </div>
                </div>

                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                @includeIf('base_layout.components.quicksidebar')
                <!-- END QUICK SIDEBAR --> 
            </div>

            <!-- BEGIN FOOTER -->
            @include('base_layout.components.footer.footer')
            <!-- END FOOTER -->

		</div>
		
		@include('base_layout.components.footer.footer_meta')
		@yield('script')
	</body>
</html>
