@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
    :root {
        --chat-bg-gradient: linear-gradient(145deg, #f5f0ff 0%, #f6fffb 100%);
        --chat-sidebar-bg: rgba(255, 255, 255, 0.92);
        --chat-main-bg: url('{{ static_asset('assets/img/chat-pattern.png') }}');
        --chat-accent: #25d366;
        --chat-accent-dark: #128c7e;
        --chat-text-dark: #1c1930;
        --chat-text-muted: #7b7690;
    }

    #fluid {
        z-index: 99;
    }

    .aiz-chat {
        background: var(--chat-bg-gradient);
        border-radius: 28px;
        padding: clamp(1.2rem, 3vw, 2rem);
        min-height: calc(100vh - 220px);
        box-shadow: 0 28px 60px rgba(24, 12, 58, 0.12);
    }

    .chat-layout {
        background: rgba(255, 255, 255, 0.75);
        border-radius: 24px;
        overflow: hidden;
        backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.55);
    }

    .chat-sidebar-col {
        border-right: 1px solid rgba(25, 15, 60, 0.06);
        background: var(--chat-sidebar-bg);
    }

    .chat-user-list-wrap {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .chat-sidebar {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .chat-sidebar__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.1rem 1.25rem 0.8rem;
    }

    .chat-sidebar__title {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--chat-text-dark);
    }

    .chat-sidebar__subtitle {
        font-size: 0.78rem;
        color: var(--chat-text-muted);
    }

    .chat-sidebar__search {
        position: relative;
        padding: 0 1.25rem 1rem;
    }

    .chat-sidebar__search i {
        position: absolute;
        top: 50%;
        left: 1.75rem;
        transform: translateY(-50%);
        color: var(--chat-text-muted);
        font-size: 1rem;
    }

    .chat-sidebar__search input {
        width: 100%;
        border-radius: 999px;
        border: 1px solid rgba(123, 118, 144, 0.22);
        padding: 0.55rem 1.1rem 0.55rem 2.6rem;
        font-size: 0.85rem;
        color: var(--chat-text-dark);
        background: rgba(255, 255, 255, 0.92);
        transition: border 0.2s ease, box-shadow 0.2s ease;
    }

    .chat-sidebar__search input:focus {
        outline: none;
        border-color: rgba(37, 211, 102, 0.4);
        box-shadow: 0 0 0 4px rgba(37, 211, 102, 0.12);
    }

    .chat-sidebar__list {
        flex: 1;
        overflow-y: auto;
        padding: 0.35rem 0.6rem 1.2rem;
    }

    .chat-user-item {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 0.75rem 0.95rem;
        border-radius: 18px;
        margin: 0.35rem 0.35rem;
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid rgba(240, 237, 255, 0.65);
        transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        color: inherit;
        text-decoration: none;
    }

    .chat-user-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(24, 12, 58, 0.08);
        background: rgba(255, 255, 255, 0.96);
    }

    .chat-user-item.selected-chat,
    .chat-user-item.bg-soft-primary {
        background: linear-gradient(135deg, rgba(37, 211, 102, 0.18), rgba(18, 140, 126, 0.18));
        border-color: rgba(18, 140, 126, 0.32);
        box-shadow: 0 16px 30px rgba(18, 140, 126, 0.18);
    }

    .chat-conversation__avatar {
        position: relative;
        width: 52px;
        height: 52px;
        border-radius: 16px;
        overflow: hidden;
        flex-shrink: 0;
        background: #fff;
        box-shadow: inset 0 0 0 1px rgba(123, 118, 144, 0.08);
    }

    .chat-conversation__avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .chat-online-indicator {
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 11px;
        height: 11px;
        border-radius: 50%;
        border: 2px solid #fff;
        background: #a7a4ba;
    }

    .chat-online-indicator.is-online {
        background: var(--chat-accent);
    }

    .chat-conversation__content {
        flex: 1;
        min-width: 0;
    }

    .chat-conversation__title {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 0.5rem;
        margin-bottom: 0.25rem;
    }

    .chat-conversation__name {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--chat-text-dark);
        margin: 0;
    }

    .chat-conversation__time {
        font-size: 0.72rem;
        color: var(--chat-text-muted);
        white-space: nowrap;
    }

    .chat-conversation__preview {
        font-size: 0.8rem;
        color: var(--chat-text-muted);
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .chat-conversation__preview i {
        color: rgba(18, 140, 126, 0.75);
    }

    .chat-conversation__badge {
        align-self: flex-start;
        background: var(--chat-accent);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.45rem;
        border-radius: 999px;
        margin-top: 0.35rem;
    }

    .chat-main {
        background: rgba(255, 255, 255, 0.82);
        height: 100%;
        display: flex;
        flex-direction: column;
        backdrop-filter: blur(12px);
    }

    .chat-main__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.1rem 1.4rem;
        border-bottom: 1px solid rgba(25, 15, 60, 0.06);
        background: rgba(255, 255, 255, 0.92);
    }

    .chat-main__title {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--chat-text-dark);
    }

    .chat-main__placeholder {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 2.4rem 1.5rem;
        color: var(--chat-text-muted);
        background: var(--chat-main-bg), linear-gradient(155deg, rgba(255, 255, 255, 0.92), rgba(244, 251, 248, 0.92));
        background-size: 380px;
    }

    .chat-main__placeholder-icon {
        width: 86px;
        height: 86px;
        border-radius: 24px;
        background: linear-gradient(135deg, rgba(37, 211, 102, 0.16), rgba(18, 140, 126, 0.16));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--chat-accent-dark);
        font-size: 2.2rem;
        margin-bottom: 1.2rem;
    }

    .chat-main__placeholder h5 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--chat-text-dark);
        margin-bottom: 0.6rem;
    }

    .chat-main__placeholder p {
        max-width: 320px;
        font-size: 0.9rem;
        margin: 0;
    }

    .aiz-mobile-toggler span,
    .aiz-mobile-toggler span::before,
    .aiz-mobile-toggler span::after {
        background: var(--chat-text-dark);
    }

    @media (max-width: 991.98px) {
        .aiz-chat {
            padding: clamp(0.8rem, 4vw, 1.4rem);
            border-radius: 18px;
        }

        .chat-layout {
            border-radius: 18px;
        }

        /* Stack list and chat vertically on small screens */
        .chat-sidebar-col,
        .chat-main-col {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .chat-main__placeholder {
            background-size: 260px;
        }
    }

    @media (max-width: 575.98px) {
        .chat-conversation__avatar {
            width: 46px;
            height: 46px;
        }

        .chat-conversation__name {
            font-size: 0.9rem;
        }

        .chat-conversation__preview {
            font-size: 0.76rem;
        }
    }
</style>
    <div class="aiz-chat">
        <div class="chat-layout row no-gutters">
            <div class="col-lg-4 chat-sidebar-col">
                <div class="chat-user-list-wrap z-1035">
                    <div class="overlay dark c-pointer" data-toggle="class-toggle" data-target=".chat-user-list-wrap" data-same=".aiz-all-chat-toggler"></div>
                    <div class="chat-sidebar">
                        <div class="chat-sidebar__header">
                            <div>
                                <h6 class="chat-sidebar__title mb-1">{{ translate('Chats') }}</h6>
                                <span class="chat-sidebar__subtitle">{{ translate('Keep in touch with your matches') }}</span>
                            </div>
                            <button class="btn btn-icon d-lg-none" data-toggle="class-toggle" data-target=".chat-user-list-wrap"><i class="las la-times"></i></button>
                        </div>
                        <div class="chat-sidebar__search">
                            <i class="las la-search"></i>
                            <input type="search" class="form-control" placeholder="{{ translate('Search conversations') }}">
                        </div>
                        <div class="chat-user-list chat-sidebar__list c-scrollbar-light">
                            @forelse ($chat_threads as $key => $single_chat_thread)
                                @php
                                    $current_user = Auth::user()->id;
                                    $lastChat = optional($single_chat_thread->chats)->last();
                                    $unreadCount = $single_chat_thread->chats->where('sender_user_id', '!=', $current_user)->where('seen', 0)->count();
                                @endphp
                                @if ($single_chat_thread->receiver != null && $single_chat_thread->sender != null)
                                    @if($current_user == $single_chat_thread->sender->id)
                                        @php $user_to_show = 'receiver'; @endphp
                                    @else
                                        @php $user_to_show = 'sender'; @endphp
                                    @endif
                                    <a href="javascript:void(0)" class="chat-user-item chat-conversation" data-url="{{ route('chat_view', $single_chat_thread->id) }}" data-refresh="{{ route('chat_refresh', $single_chat_thread->id) }}" onclick="loadChats(this)">
                                        <span class="chat-conversation__avatar">
                                            @if ($single_chat_thread->$user_to_show->photo != null)
                                                <img src="{{ uploaded_asset($single_chat_thread->$user_to_show->photo) }}" alt="no.1marry">
                                            @else
                                                <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="no.1marry">
                                            @endif
                                            <span class="chat-online-indicator {{ Cache::has('user-is-online-' . $single_chat_thread->$user_to_show->id) ? 'is-online' : '' }}"></span>
                                        </span>
                                        <div class="chat-conversation__content">
                                            <div class="chat-conversation__title">
                                                <h6 class="chat-conversation__name text-truncate">{{ $single_chat_thread->$user_to_show->first_name.' '.$single_chat_thread->$user_to_show->last_name }}</h6>
                                                @if ($lastChat)
                                                    <span class="chat-conversation__time">{{ Carbon\Carbon::parse($lastChat->created_at)->diffForHumans() }}</span>
                                                @endif
                                            </div>
                                            <div class="chat-conversation__preview text-truncate">
                                                @if ($lastChat)
                                                    @if ($lastChat->message)
                                                        {{ \Illuminate\Support\Str::limit($lastChat->message, 70) }}
                                                    @else
                                                        <i class="las la-paperclip"></i>
                                                        <span>{{ translate('Attachments') }}</span>
                                                    @endif
                                                @else
                                                    {{ translate('Say hello to start chatting!') }}
                                                @endif
                                            </div>
                                        </div>
                                        @if ($unreadCount > 0)
                                            <span class="chat-conversation__badge">{{ $unreadCount }}</span>
                                        @endif
                                    </a>
                                @endif
                            @empty
                                <div class="text-center py-5">
                                    <i class="las la-comments la-3x mb-3 opacity-50"></i>
                                    <h6 class="mb-0">{{ translate('No conversations yet') }}</h6>
                                    <small class="text-muted">{{ translate('Start a conversation to see it appear here.') }}</small>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 chat-main-col" id="single_chat">
                <div class="chat-main">
                    <div class="chat-main__header">
                        <h6 class="chat-main__title mb-0">{{ translate('Messages') }}</h6>
                    </div>
                    <div class="chat-main__placeholder">
                        <span class="chat-main__placeholder-icon">
                            <i class="las la-comments"></i>
                        </span>
                        <h5>{{ translate('Select a conversation') }}</h5>
                        <p>{{ translate('Pick a chat from the left panel to continue your conversation or start a new one.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @include('modals.package_update_alert_modal')
@endsection

@section('script')
    <script type="text/javascript">
        function loadChats(el){
            $('.selected-chat').each(function() {
                $(this).removeClass('bg-soft-primary');
                $(this).removeClass('selected-chat');
            });
            $(el).addClass('selected-chat');
            $(el).addClass('bg-soft-primary');
            $.get($(el).data('url'),{}, function(data){
                $('#single_chat').html(data);
                AIZ.extra.scrollToBottom();
                initializeLoadMore();
                $('#send-mesaage').on('submit',function(e){
                    e.preventDefault();
                    send_reply();
                });
            });
        }
        function send_reply(){
            var chat_thread_id = $('#chat_thread_id').val();
            var message = $('#message').val();
            var attachment = $('#attachment').val();
            if(message.length > 0 || attachment.length > 0){
                $.post('{{ route('chat.reply') }}',{_token:'{{ csrf_token() }}', chat_thread_id:chat_thread_id, message:message, attachment:attachment}, function(data){
                    $('#message').val('');
                    $('#attachment').val('');
                    $('#chat-messages').append(data);
                    AIZ.extra.scrollToBottom();
                });
            }
        }
        $(document).on('click','.chat-attachment',function(){
            AIZ.uploader.trigger(
                this,
                'direct',
                'all',
                '',
                true,
                function(files){
                    $('#attachment').val(files);
                    send_reply();
                }
            );
        });
        $(document).ready(function () {
            setInterval(function () {
                refreshChats();
            }, 5000);
        });
        function refreshChats(){
            var el = $('.selected-chat');
            $.get($(el).data('refresh'),{}, function(data){
                if (data.count > 0) {
                    $('#chat-messages').append(data.messages);
                    AIZ.extra.scrollToBottom();
                }
            });
        }
        function initializeLoadMore(){
            $('.load-more-btn').on('click', function(){
                $.post('{{ route('get-old-message') }}', {_token:'{{ csrf_token() }}', first_message_id:$(this).data('first')}, function(data){
                    if (data.first_message_id > 0) {
                        $('#chat-messages').prepend(data.messages);
                        $('.load-more-btn').data('first', data.first_message_id);
                    }
                });
            });
        }

        function package_update_alert(){
          $('.package_update_alert_modal').modal('show');
        }
    </script>
@endsection
