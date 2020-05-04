    <div class="sidebarblock">
        <h3>Channels</h3>
        <div class="divline"></div>
        <div class="blocktxt">
            <ul class="cats">
            @foreach($channels as $channel)
                <li><a href="{{ route('channel', ['slug' => $channel->slug ]) }}">{{ $channel->title }} <span class="badge pull-right">{{ $channel->discussions->count() }}</span></a></li>
            @endforeach
            </ul>
        </div>
    </div>
