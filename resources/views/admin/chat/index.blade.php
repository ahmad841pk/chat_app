@extends('admin.layouts.master')
@section('title')
    Admin chat
@endsection
@section('extra_css')
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/pages/app-chat.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/pages/app-chat-list.css')}}">
@endsection
@section('index')
    <div class="content-area-wrapper container-xxl p-0">
        <div class="sidebar-left">
            <div class="sidebar">
                <!-- Admin user profile area -->
                <div class="chat-profile-sidebar">
                    <header class="chat-profile-header">
                            <span class="close-icon">
                                <i data-feather="x"></i>
                            </span>
                        <!-- User Information -->
                        <div class="header-profile-sidebar">
                            <div class="avatar box-shadow-1 avatar-xl avatar-border">
                                <img src="{{asset('backend/app-assets/images/portrait/small/avatar-s-11.jpg')}}"
                                     alt="user_avatar"/>
                                <span class="avatar-status-online avatar-status-xl"></span>
                            </div>
                            <h4 class="chat-user-name">John Doe</h4>
                            <span class="user-post">Admin</span>
                        </div>
                        <!--/ User Information -->
                    </header>
                    <!-- User Details start -->
                    <div class="profile-sidebar-area">
                        <h6 class="section-label mb-1">About</h6>
                        <div class="about-user">
                                <textarea data-length="120" class="form-control char-textarea" id="textarea-counter"
                                          rows="5" placeholder="About User">
Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                            <small class="counter-value float-end"><span class="char-count">108</span> / 120 </small>
                        </div>
                        <!-- To set user status -->
                        <h6 class="section-label mb-1 mt-3">Status</h6>
                        <ul class="list-unstyled user-status">
                            <li class="pb-1">
                                <div class="form-check form-check-success">
                                    <input type="radio" id="activeStatusRadio" name="userStatus"
                                           class="form-check-input" value="online" checked/>
                                    <label class="form-check-label ms-25" for="activeStatusRadio">Active</label>
                                </div>
                            </li>
                            <li class="pb-1">
                                <div class="form-check form-check-danger">
                                    <input type="radio" id="dndStatusRadio" name="userStatus" class="form-check-input"
                                           value="busy"/>
                                    <label class="form-check-label ms-25" for="dndStatusRadio">Do Not Disturb</label>
                                </div>
                            </li>
                            <li class="pb-1">
                                <div class="form-check form-check-warning">
                                    <input type="radio" id="awayStatusRadio" name="userStatus" class="form-check-input"
                                           value="away"/>
                                    <label class="form-check-label ms-25" for="awayStatusRadio">Away</label>
                                </div>
                            </li>
                            <li class="pb-1">
                                <div class="form-check form-check-secondary">
                                    <input type="radio" id="offlineStatusRadio" name="userStatus"
                                           class="form-check-input" value="offline"/>
                                    <label class="form-check-label ms-25" for="offlineStatusRadio">Offline</label>
                                </div>
                            </li>
                        </ul>
                        <!--/ To set user status -->

                        <!-- User settings -->
                        <h6 class="section-label mb-1 mt-2">Settings</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center">
                                    <i data-feather="check-square" class="me-75 font-medium-3"></i>
                                    <span class="align-middle">Two-step Verification</span>
                                </div>
                                <div class="form-check form-switch me-0">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1" checked/>
                                    <label class="form-check-label" for="customSwitch1"></label>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center">
                                    <i data-feather="bell" class="me-75 font-medium-3"></i>
                                    <span class="align-middle">Notification</span>
                                </div>
                                <div class="form-check form-switch me-0">
                                    <input type="checkbox" class="form-check-input" id="customSwitch2"/>
                                    <label class="form-check-label" for="customSwitch2"></label>
                                </div>
                            </li>
                            <li class="mb-1 d-flex align-items-center cursor-pointer">
                                <i data-feather="user" class="me-75 font-medium-3"></i>
                                <span class="align-middle">Invite Friends</span>
                            </li>
                            <li class="d-flex align-items-center cursor-pointer">
                                <i data-feather="trash" class="me-75 font-medium-3"></i>
                                <span class="align-middle">Delete Account</span>
                            </li>
                        </ul>
                        <!--/ User settings -->

                        <!-- Logout Button -->
                        <div class="mt-3">
                            <button class="btn btn-primary">
                                <span>Logout</span>
                            </button>
                        </div>
                        <!--/ Logout Button -->
                    </div>
                    <!-- User Details end -->
                </div>
                <!--/ Admin user profile area -->

                <!-- Chat Sidebar area -->
                <div class="sidebar-content">
                        <span class="sidebar-close-icon">
                            <i data-feather="x"></i>
                        </span>
                    <!-- Sidebar header start -->
                    <div class="chat-fixed-search">
                        <div class="d-flex align-items-center w-100">
                            <div class="sidebar-profile-toggle">
                                <div class="avatar avatar-border">
                                    <img src="{{asset('backend/app-assets/images/portrait/small/avatar-s-11.jpg')}}"
                                         alt="user_avatar" height="42" width="42"/>
                                    <span class="avatar-status-online"></span>
                                </div>
                            </div>
                            <div class="input-group input-group-merge ms-1 w-100">
                                <span class="input-group-text round"><i data-feather="search"
                                                                        class="text-muted"></i></span>
                                <input type="text" class="form-control round" id="chat-search"
                                       placeholder="Search or start a new chat" aria-label="Search..."
                                       aria-describedby="chat-search"/>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar header end -->

                    <!-- Sidebar Users start -->
                    <div id="users-list" class="chat-user-list-wrapper list-group">
                        @if($active_chat_users->isNotEmpty())
                            <h4 class="chat-list-title">Chats</h4>
                        @endif
                        <ul class="chat-users-list chat-list media-list">
                            @foreach($active_chat_users as $user)
                                <li onclick="showChat(event,{{$user->id}})">
                                    <span class="avatar"><img
                                            src="{{asset('backend/app-assets/images/portrait/small/avatar-s-3.jpg')}}"
                                            height="42"
                                            width="42" alt="Generic placeholder image"/>
                                        <span class="avatar-status-online"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">{{$user->name}}</h5>
                                        @foreach($conversations as $conversation)
                                            @if($conversation->created_by == Auth::user()->id && $conversation->chat_with == $user->id)
                                                <p class="card-text text-truncate">{{$conversation->messages->last()->message}}</p>
                                                @break
                                            @elseif($conversation->created_by == $user->id && $conversation->chat_with ==Auth::user()->id)
                                                <p class="card-text text-truncate">{{$conversation->messages->last()->message}}</p>
                                                @break
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="chat-meta text-nowrap">
                                        <small class="float-end mb-25 chat-time">{{$conversation->messages->last()->created_at->diffForHumans()}}</small>
                                        <span class="badge bg-danger rounded-pill float-end">3</span>
                                    </div>
                                </li>
                            @endforeach
                            <li class="no-results">
                                <h6 class="mb-0">No Chats Found</h6>
                            </li>
                        </ul>

                        <h4 class="chat-list-title">Groups</h4>
                        <ul class="chat-users-list chat-list media-list">
                            @foreach($groups as $group)
                                <li onclick="showGroupChat(event,{{$group->id}})">
                                    <span class="avatar"><img
                                            src="{{asset('backend/app-assets/images/portrait/small/avatar-s-3.jpg')}}"
                                            height="42"
                                            width="42" alt="Generic placeholder image"/>
                                        <span class="avatar-status-online"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">{{$group->name}}</h5>
                                        {{--                                            @foreach($conversations as $conversation)--}}
                                        {{--                                                @if($conversation->created_by == Auth::user()->id && $conversation->chat_with == $user->id)--}}
                                        {{--                                                    <p class="card-text text-truncate">{{$conversation->messages->last()->message}}</p>--}}
                                        {{--                                                    @break--}}
                                        {{--                                                @elseif($conversation->created_by == $user->id && $conversation->chat_with ==Auth::user()->id)--}}
                                        {{--                                                    <p class="card-text text-truncate">{{$conversation->messages->last()->message}}</p>--}}
                                        {{--                                                    @break--}}
                                        {{--                                                @endif--}}
                                        {{--                                            @endforeach--}}

                                    </div>
                                    <div class="chat-meta text-nowrap">
                                        <small class="float-end mb-25 chat-time"></small>
                                        <span class="badge bg-danger rounded-pill float-end">3</span>
                                    </div>
                                </li>
                            @endforeach
                            <li class="no-results">
                                <h6 class="mb-0">No Groups Found</h6>
                            </li>
                        </ul>

                        <h4 class="chat-list-title">Contacts</h4>
                        <ul class="chat-users-list contact-list media-list">
                            @foreach($users as $user)
                                @if($user->id != Auth::user()->id)
                                    <li onclick="showChat(event,{{$user->id}})">
                                    <span class="avatar"><img
                                            src="{{asset('backend/app-assets/images/portrait/small/avatar-s-7.jpg')}}"
                                            height="42"
                                            width="42" alt="Generic placeholder image"/>
                                    </span>
                                        <div class="chat-info">
                                            <h5 class="mb-0">{{$user->name}}</h5>
                                            @foreach($conversations as $conversation)
                                                @if($conversation->created_by == Auth::user()->id && $conversation->chat_with == $user->id)
                                                    <p class="card-text text-truncate">{{$conversation->messages->last()->message}}</p>
                                                    @break
                                                @elseif($conversation->created_by == $user->id && $conversation->chat_with ==Auth::user()->id)
                                                    <p class="card-text text-truncate">{{$conversation->messages->last()->message}}</p>
                                                    @break
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            <li class="no-results">
                                <h6 class="mb-0">No Contacts Found</h6>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Users end -->
                </div>
                <!--/ Chat Sidebar area -->

            </div>
        </div>
        <div class="content-right">
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="body-content-overlay"></div>
                    <!-- Main chat area -->
                    <section class="chat-app-window">
                        <!-- To load Conversation -->
                        <div class="start-chat-area">
                            <div class="mb-1 start-chat-icon">
                                <i data-feather="message-square"></i>
                            </div>
                            <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                        </div>
                        <!--/ To load Conversation -->

                        <!-- Active Chat -->
                        <div class="active-chat d-none">
                            <!-- Chat Header -->
                            <div class="chat-navbar">
                                <header class="chat-header">
                                    <div class="d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-lg-none me-1">
                                            <i data-feather="menu" class="font-medium-5"></i>
                                        </div>
                                        <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                            <img
                                                src="{{asset('backend/app-assets/images/portrait/small/avatar-s-7.jpg')}}"
                                                alt="avatar" height="36" width="36"/>
                                            <span class="avatar-status-busy"></span>
                                        </div>
                                        <h6 class="mb-0" id="chat_with"></h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i data-feather="phone-call"
                                           class="cursor-pointer d-sm-block d-none font-medium-2 me-1"></i>
                                        <i data-feather="video"
                                           class="cursor-pointer d-sm-block d-none font-medium-2 me-1"></i>
                                        <i data-feather="search"
                                           class="cursor-pointer d-sm-block d-none font-medium-2"></i>
                                        <div class="dropdown">
                                            <button
                                                class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i data-feather="more-vertical" id="chat-header-actions"
                                                   class="font-medium-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"
                                                 aria-labelledby="chat-header-actions">
                                                <a class="dropdown-item" href="#">View Contact</a>
                                                <a class="dropdown-item" href="#">Mute Notifications</a>
                                                <a class="dropdown-item" href="#">Block Contact</a>
                                                <a class="dropdown-item" href="#">Clear Chat</a>
                                                <a class="dropdown-item" href="#">Report</a>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                            </div>
                            <!--/ Chat Header -->

                            <!-- User Chat messages -->
                            <div class="user-chats">
                                <div class="chats">
                                </div>
                            </div>
                            <!-- User Chat messages -->

                            <!-- Submit Chat form -->
                            <form id="chat_form" class="chat-app-form" action="javascript:void(0)"
                                  onsubmit="enterChat()" ;>
                                <div class="input-group input-group-merge me-1 form-send-message">
                                    <span class="speech-to-text input-group-text"><i data-feather="mic"
                                                                                     class="cursor-pointer"></i></span>
                                    <input type="text" class="form-control message"
                                           placeholder="Type your message or use speech to text"/>
                                    <input class="message_value" type="text" hidden name="message">
                                    <input class="conversation_value" type="text" hidden name="conversation">
                                    <input class="chat_with_value" type="text" hidden name="chat_with">
                                    <span class="input-group-text">
                                            <label for="attach-doc" class="attachment-icon form-label mb-0">
                                                <i data-feather="image" class="cursor-pointer text-secondary"></i>
                                                <input type="file" id="attach-doc" hidden/> </label></span>
                                </div>
                                <button type="submit" class="btn btn-primary send">
                                    <i data-feather="send" class="d-lg-none"></i>
                                    <span class="d-none d-lg-block">Send</span>
                                </button>
                            </form>
                            <!--/ Submit Chat form -->
                        </div>
                        <!--/ Active Chat -->
                    </section>
                    <!--/ Main chat area -->

                    <!-- User Chat profile right area -->
                    <div class="user-profile-sidebar">
                        <header class="user-profile-header">
                                <span class="close-icon">
                                    <i data-feather="x"></i>
                                </span>
                            <!-- User Profile image with name -->
                            <div class="header-profile-sidebar">
                                <div class="avatar box-shadow-1 avatar-border avatar-xl">
                                    <img src="{{asset('backend/app-assets/images/portrait/small/avatar-s-7.jpg')}}"
                                         alt="user_avatar" height="70" width="70"/>
                                    <span class="avatar-status-busy avatar-status-lg"></span>
                                </div>
                                <h4 class="chat-user-name">Kristopher Candy</h4>
                                <span class="user-post">UI/UX Designer 👩🏻‍💻</span>
                            </div>
                            <!--/ User Profile image with name -->
                        </header>
                        <div class="user-profile-sidebar-area">
                            <!-- About User -->
                            <h6 class="section-label mb-1">About</h6>
                            <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop.</p>
                            <!-- About User -->
                            <!-- User's personal information -->
                            <div class="personal-info">
                                <h6 class="section-label mb-1 mt-3">Personal Information</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-1">
                                        <i data-feather="mail" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">kristycandy@email.com</span>
                                    </li>
                                    <li class="mb-1">
                                        <i data-feather="phone-call" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">+1(123) 456 - 7890</span>
                                    </li>
                                    <li>
                                        <i data-feather="clock" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">Mon - Fri 10AM - 8PM</span>
                                    </li>
                                </ul>
                            </div>
                            <!--/ User's personal information -->

                            <!-- User's Links -->
                            <div class="more-options">
                                <h6 class="section-label mb-1 mt-3">Options</h6>
                                <ul class="list-unstyled">
                                    <li class="cursor-pointer mb-1">
                                        <i data-feather="tag" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">Add Tag</span>
                                    </li>
                                    <li class="cursor-pointer mb-1">
                                        <i data-feather="star" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">Important Contact</span>
                                    </li>
                                    <li class="cursor-pointer mb-1">
                                        <i data-feather="image" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">Shared Media</span>
                                    </li>
                                    <li class="cursor-pointer mb-1">
                                        <i data-feather="trash" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">Delete Contact</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <i data-feather="slash" class="font-medium-2 me-50"></i>
                                        <span class="align-middle">Block Contact</span>
                                    </li>
                                </ul>
                            </div>
                            <!--/ User's Links -->
                        </div>
                    </div>
                    <!--/ User Chat profile right area -->

                </div>
            </div>
        </div>
    </div>
    <input id="current_user" type="text" hidden value="{{Auth::user()->id}}">
    <input id="icon" type="text" hidden value="{{asset('backend/app-assets/images/icons/technology/laravel.png')}}">
@endsection

@section('extra_script')
    {{--    <script src="{{asset('build/assets/app-029dff7a.js')}}"></script>--}}
    {{--    <script>--}}
    {{--        Echo.channel('chat')--}}
    {{--            .listen('MessageSent', (e) => console.log('Message: ' + e.message));--}}
    {{--    </script>--}}

    <script src="{{asset('backend/app-assets/js/scripts/pages/app-chat.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("form").on("submit", function (e) {
                e.preventDefault();
                var message = $('.message_value').val();
                var conversation = $('.conversation_value').val();
                var chat_with = $('.chat_with_value').val();
                $.ajax({
                    url: '{{route('send.message')}}',
                    type: 'POST',
                    data: {
                        _token: "{{csrf_token()}}",
                        message: message,
                        conversation: conversation,
                        chat_with: chat_with
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script>
        function showChat(event, user_id) {
            $('.chats').empty();
            // $('.chats').find('div').remove();
            var conversation_id = null;
            event.preventDefault();
            $.ajax({
                url: '{{route('fetch.message')}}',
                type: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    user_id: user_id
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    $('#chat_with').text(response['second_user']['name']);
                    $('#chat_with_id').val(response['second_user']['id']);
                    if (response['conversation'] != null) {
                        conversation_id = response['conversation']['id'];
                        var chat = response['conversation']['messages'];
                        for (let i = 0; i < chat.length; i++) {
                            if (chat[i].creator_id == response['current_user']) {
                                var html = '<div class="chat">' +
                                    '<div class="chat-body">' +
                                    '<div class="chat-content">' +
                                    '<p>' + chat[i].message + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('.chats').append(html);
                            } else {
                                var html = '<div class="chat chat-left">' +
                                    '<div class="chat-body">' +
                                    '<div class="chat-content">' +
                                    '<p>' + chat[i].message + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('.chats').append(html);
                            }
                        }
                    }
                    $('.conversation_value').val(conversation_id);
                    $('.chat_with_value').val(user_id);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>

    <script>
        function showGroupChat(event, group_id) {
            $('.chats').empty();
            var conversation_id = null;
            event.preventDefault();
            $.ajax({
                url: '{{route('fetch.group.message')}}',
                type: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    group_id: group_id
                },
                dataType: 'JSON',
                success: function (response) {
                    $('#chat_with').text(response['group']['name']);
                    if (response['group']['conversation'] != null) {
                        conversation_id = response['group']['conversation']['id'];

                        console.log("conversation_id = " + conversation_id);
                        var chat = response['group']['conversation']['messages'];
                        for (let i = 0; i < chat.length; i++) {
                            if (chat[i].creator_id == response['current_user']) {
                                var html = '<div class="chat">' +
                                    '<div class="chat-body">' +
                                    '<div class="chat-content">' +
                                    '<p style="font-size: 12px; color:white; text-decoration: underline;">'+chat[i].creator.name+'</p>'+
                                    '<p>' + chat[i].message + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('.chats').append(html);
                            } else {
                                var html = '<div class="chat chat-left">' +
                                    '<div class="chat-body">' +
                                    '<div class="chat-content">' +
                                    '<p style="font-size: 12px; color:green; text-decoration: underline;">'+chat[i].creator.name+'</p>'+
                                    '<p>' + chat[i].message + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('.chats').append(html);
                            }
                        }
                    }
                    $('.conversation_value').val(conversation_id);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="{{asset('backend/js/push.min.js')}}"></script>
    <script>
        var iconPath = $('#icon').val();
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('b89edac162663d4277e1', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('chat');
        channel.bind('App\\Events\\MessageSent', function(data) {
            // console.clear();
            var currentUser = $('#current_user').val()
            var conversationId = $('.conversation_value').val();
            var chatWith = $('.chat_with_value').val();
            if(data.user.id != currentUser) {
                // alert(JSON.stringify(data.user.name + " has messaged you"));
                Push.create("New SMS!", {
                    body: data.user.name + " has messaged you",
                    timeout: 5000,
                    icon: iconPath
                });

                var html = '<div class="chat chat-left">' +
                    '<div class="chat-body">' +
                    '<div class="chat-content">' +
                    // '<p style="font-size: 12px; color:green; text-decoration: underline;">'+data.message.creator.name+'</p>'+
                    '<p>' + data.message.message + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                if(conversationId == data.conversation_id ) {
                    $('.chats').append(html);
                    $('.user-chats').scrollTop($('.user-chats > .chats').height());
                }
            }

        });
    </script>

@endsection
