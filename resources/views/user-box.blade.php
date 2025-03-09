@if($user['user']->user_type == 'vendor')
<div class="col-md-4 col-sm-4">
                            <div class="author-info mcolorbg4">
                                <p>{{ Helper::translation(3195,$translate) }}</p>
                                <h3>{{ $getitemcount }}</h3>
                            </div>
                        </div>
                        <!-- end /.col-md-4 -->

                        <div class="col-md-4 col-sm-4">
                            <div class="author-info pcolorbg">
                                <p>{{ Helper::translation(3039,$translate) }}</p>
                                <h3>{{ $getsalecount }}</h3>
                            </div>
                        </div>
                        <!-- end /.col-md-4 -->

                        <div class="col-md-4 col-sm-4">
                            <div class="author-info scolorbg">
                                <p>{{ Helper::translation(3196,$translate) }}</p>
                                <div class="rating product--rating">
                                    <ul>
                                        @if($count_rating == 0)
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        @endif
                                        @if($count_rating == 1)
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        @endif
                                        @if($count_rating == 2)
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        @endif
                                        @if($count_rating == 3)
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        @endif
                                        @if($count_rating == 4)
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        @endif
                                        @if($count_rating == 5)
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        @endif
                                    </ul>
                                    <span class="rating__count">({{ $getreview }})</span>
                                </div>
                            </div>
                        </div>
                        @endif