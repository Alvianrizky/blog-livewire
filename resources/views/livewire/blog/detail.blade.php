<div>
    @push('scripts')
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
    @endpush
    <div class="row justify-content-center" style="margin-top: 100px !important;">
        <div class="col-sm-11 col-lg-8 border">
            <div class="m-3">
                <h1>Lorem Ipsum</h1>
                <div>
                    <span class="text-muted">15 Februari 2022</span>
                    <div class="my-3 fs-7">
                        <span class="border rounded p-2" style="line-height:3.4;">Website</span>
                        <span class="border rounded p-2" style="line-height:3.4;">Teknologi</span>
                        <span class="border rounded p-2" style="line-height:3.4;">Tutorial</span>
                    </div>
                </div>

                <div class="my-4">
                    <img src="{{ asset('img/work-1.jpg') }}" class="img-fluid" alt="">
                </div>

                <div class="my-4">
                    <h2>Ini Heading</h2>
                </div>

                <div class="my-4">
                    <h5 class="text-justify" style="line-height:28px; color: #292929 !important; font-weight: 100 !important;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h5>
                </div>

                <div class="my-4">
                    <a href="http://" class="btn btn-outline-primary"><i class="fas fa-link"></i> Follow Me</a>
                </div>

                <div class="my-4">
                    <div class="o-video">
                        <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ?&showinfo=0&modestbranding=1&rel=0&autohide=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="my-4">
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
                </div>

            </div>
        </div>
    </div>
</div>
