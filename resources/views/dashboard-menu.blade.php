<div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard_menu">
                       <!-- <li class="active">-->
                            @if(Auth::user()->user_type == 'vendor')
                            <li>
                                <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                    <span class="lnr lnr-home"></span>{{ Helper::translation(2926,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/profile-settings') }}">
                                    <span class="lnr lnr-cog"></span>{{ Helper::translation(2927,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/purchases') }}">
                                    <span class="lnr lnr-cart"></span>{{ Helper::translation(2928,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/favourites') }}">
                                    <span class="lnr lnr-heart"></span> {{ Helper::translation(2929,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/coupon') }}">
                                <span class="lnr lnr-location"></span>{{ Helper::translation(2919,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/sales') }}">
                                    <span class="lnr lnr-chart-bars"></span>{{ Helper::translation(2930,$translate) }}</a>
                            </li>
                            <?php /*?><li>
                                <a href="{{ URL::to('/upload-item') }}">
                                    <span class="lnr lnr-upload"></span>{{ Helper::translation(2931,$translate) }}</a>
                            </li><?php */?>
                            <li>
                                <a href="{{ URL::to('/manage-item') }}">
                                    <span class="lnr lnr-briefcase"></span>{{ Helper::translation(2932,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/withdrawal') }}">
                                    <span class="lnr lnr-briefcase"></span>{{ Helper::translation(2933,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/logout') }}">
                                    <span class="lnr lnr-exit"></span>{{ Helper::translation(3023,$translate) }}</a>
                            </li>
                            @endif
                            @if(Auth::user()->user_type == 'customer')
                            <li>
                                <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                    <span class="lnr lnr-home"></span>{{ Helper::translation(2926,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/profile-settings') }}">
                                    <span class="lnr lnr-cog"></span>{{ Helper::translation(2927,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/purchases') }}">
                                    <span class="lnr lnr-cart"></span>{{ Helper::translation(2928,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/favourites') }}">
                                    <span class="lnr lnr-heart"></span> {{ Helper::translation(2929,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/withdrawal') }}">
                                    <span class="lnr lnr-briefcase"></span>{{ Helper::translation(2933,$translate) }}</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/logout') }}">
                                    <span class="lnr lnr-exit"></span>{{ Helper::translation(3023,$translate) }}</a>
                            </li>
                            @endif
                        </ul>
                        <!-- end /.dashboard_menu -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>