<div>
    {{-- @push('scripts')
    <script>
        /*** Custom Audio Player */
        const audioPlayer = document.querySelectorAll('.voice-assistant-item');
        var audios = [];

        if ( audioPlayer ) {
            audioPlayer.forEach((value, index) => {
            const dataAudio = audioPlayer[index].querySelector('.play-button');
            const audio = new Audio(dataAudio.getAttribute("data-audio"));

            audios.push(audio);

            //click on timeline to skip around
            const timeline = audioPlayer[index].querySelector('.audio-controls-bar');
            timeline.addEventListener('click', (e) => {
                const timelineWidth = window.getComputedStyle(timeline).width;
                const timeToSeek = (e.offsetX / parseInt(timelineWidth)) * audio.duration;
                audio.currentTime = timeToSeek;
                },
                false
            );

            //check audio percentage and update time accordingly
            setInterval(() => {
                const progressBar = audioPlayer[index].querySelector('.audio-controls-bar-current');
                progressBar.style.width = (audio.currentTime / audio.duration) * 100 + '%';
                audioPlayer[index].querySelector('.audio-controls-time').textContent =
                getTimeCodeFromNum(audio.currentTime);
            }, 500);

            //toggle between playing and pausing on button click
            const playBtn = audioPlayer[index].querySelector('.play-button');
            playBtn.addEventListener('click', (e) => {
                if (audio.paused) {
                    playBtn.childNodes[0].innerHTML = '';
                    audio.play();
                } else {
                    playBtn.childNodes[0].innerHTML = '';
                    audio.pause();
                }
                },
                false
            );

            audio.addEventListener('play', function(e){
                for(var i = 0, len = audios.length; i < len; i++){
                    if(audios[i] != e.target){
                        audios[i].pause();
                    }
                }
            });

            audio.addEventListener('pause', function() {
                playBtn.childNodes[0].innerHTML = '';
            });

            audio.addEventListener('ended', function() {
                playBtn.childNodes[0].innerHTML = '';
            });

            /*turn seconds into minutes*/
            function getTimeCodeFromNum(num) {
                let seconds = parseInt(num);
                let minutes = parseInt(seconds / 60);
                seconds -= minutes * 60;
                const hours = parseInt(minutes / 60);
                minutes -= hours * 60;

                if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
                return `${String(hours).padStart(2, 0)}:${minutes}:${String(
                seconds % 60
                ).padStart(2, 0)}`;
            }

        });
        }
    </script>
    @endpush --}}

    @push('meta')
        <meta name="title" content="{{ $post['title'] }}">
        <meta name="description" content="{{ $post['meta_desc'] }}">
        <meta name="keywords" content="{{ $post['meta_keys'] }}">
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ URL::current() }}">
        <meta property="og:title" content="{{ $post['title'] }}">
        <meta property="og:description" content="{{ $post['meta_desc'] }}">
        <meta property="og:image" content="{{ asset('storage/'.$post['thumbnail']) }}">
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ URL::current() }}">
        <meta property="twitter:title" content="{{ $post['title'] }}">
        <meta property="twitter:description" content="{{ $post['meta_desc'] }}">
        <meta property="twitter:image" content="{{ asset('storage/'.$post['thumbnail']) }}">
    @endpush

    <div class="row justify-content-center" style="margin-top: 100px !important;">
        <div class="col-sm-11 col-lg-8 border">
            <div class="m-3">
                <h1>{{ $post['title'] }}</h1>
                <div>
                    <span class="text-muted">{{ $post['date'] }}</span>

                    <div class="my-3 fs-7">

                        @foreach ($postTag as $item)
                        <span class="border rounded p-2" style="line-height:3.4;">{{ $item->tag->name_tag }}</span>
                        @endforeach

                    </div>

                </div>


                {{-- thumbnail --}}
                @if ($post['thumbnail'])
                <div class="my-4">
                    <img src="{{ asset('storage/'.$post["thumbnail"]) }}" class="img-fluid rounded mx-auto d-block" alt="">
                </div>
                @endif


                @foreach ($postDetail as $val)

                @include('livewire.blog.components.detail')

                @endforeach

                {{-- <div class="my-4">
                    <div class="voice-assistant-item w-clearfix" style="border-radius: 20px !important;">
                        <div class="voice-assistant-item-button">
                            <a class="play-button w-button" data-audio="{{ asset('file/audio.mp3') }}"><em class="italic-text-7 1"></em></a>
                        </div>

                        <div class="voice-assistant-item-text">
                            <h5 class="heading-51">Enter your audio title 1</h5>
                            <div class="audio-controls">
                                <div class="audio-controls-bar">
                                    <div class="audio-controls-bar-current"></div>
                                </div>

                                <div class="audio-controls-time">0:00</div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>
