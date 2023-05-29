<?php
if ($this->session->flashdata('success') != '') {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          icon: 'success',
          title: 'Progress Berhasil',
      })    
      </script>
      ";
} elseif ($this->session->flashdata('feedback') != '') {
    echo "
    <script>
    Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        icon: 'success',
        title: 'Feedback Terkirim',
    })    
    </script>
    ";
}
?>

<style>
    #progressBar {
        width: 0%;
        height: 5px;
        top: 0;
        left: 0;
        animation: progressAnimation 10s linear infinite;
        background-color: #2c2f75;
    }

    @keyframes progressAnimation {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 100% 0;
        }
    }
</style>


<!--=============== External CSS ================= -->
<link rel="stylesheet" href="<?= base_url('assets/css/star.css') ?>">

<body id="body-pd">
    <!--=============== Course Content ===============-->
    <div class="space-top">
        <div class="d-flex justify-content-between align-items-center">
            <div class="title">
                <h3 class="ft-7"><?= $id_video->title ?></h3>
                <p class="gray-text"><?= $course->instructor ?></p>
            </div>
            <a class="fw-bold gap-3 fs-5 d-none d-md-inline" style="color:#2c2f75" href="<?= site_url('userBranch/classpath/listClass') ?>">
                <i class="bi bi-x-lg"></i>
            </a>
        </div>
        <div class="row pt-2">
            <div class="col-lg-7">
                <div class="video-panel">
                    <div class="bg-white rounded border">
                        <div id="player"></div>
                        <div id="progressContainer" class="p-3 pb-1">
                            <div class="bg-secondary">
                                <div id="progressBar"></div>
                            </div>

                            <div id="progressText">00:00 / <?= $course->intro_duration ?>:00</div>
                        </div>
                        <div class="video-player d-flex justify-content-between p-3 pt-2">
                            <button title="Kualitas Terbaik Di Jaringan Saya" id="qualityButton" onclick="changeVideoQuality()" class="fw-bold btn btn-warning bg-orange">
                                HD
                            </button>
                            <div class="button-control d-flex gap-2">
                                <button id="speedDownButton" class="btn btn-primary bg-first" title="mundur 5 detik">
                                    <i class="bi bi-skip-start-fill"></i>
                                </button>
                                <button id="playPauseButton" onclick="togglePlayPause()" class="btn btn-warning bg-orange text-black" title="Play/Stop">
                                    <i class="bi bi-play-fill"></i>
                                </button>
                                <button id="speedUpButton" class="btn btn-primary bg-first" title="maju 5 detik">
                                    <i class="bi bi-skip-end-fill"></i>
                                </button>
                            </div>
                            <button id="fullscreenButton" onclick="toggleFullscreen()" class="btn btn-warning bg-orange" title="Fullscreen">
                                <i class="bi bi-fullscreen"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-panel pt-2 mt-3 mb-5 bg-white p-2 border">

                    <div class="d-flex gap-3 flex-wrap">
                        <div id="detail1" class="p-3 tab-up" onclick="openCity('detail')" style="border-bottom:  2px solid #2c2f75;">
                            <span class="ft-7">Pengantar</span>
                        </div>
                        <div id="profil1" class="p-3 tab-up" onclick="openCity('profil')">
                            <span class="ft-7">Feedback</span>
                        </div>
                        <?php if ($progress == 100) : ?>
                            <div id="mentoring1" class="p-3 tab-up" onclick="openCity('mentoring')">
                                <span class="ft-7">Gabung Mentoring</span>
                            </div>
                        <?php endif ?>
                    </div>

                    <div id="detail" class="city bg-white p-3">
                        <p><?= $course->summary ?></p>
                    </div>
                    <div id="profil" class="city bg-white p-3" style="display:none">
                        <?php if ($has_relation) : ?>
                            <?php if (empty($feedback->rating)) : ?>
                                <form action="<?= site_url('userBranch/classpath/save_feedback') ?>" method="post">
                                    <input type="text" name="id_user" value="<?php echo $id_user ?>" hidden>
                                    <input type="text" name="id_course" value="<?php echo $course->id ?>" hidden>
                                    <div class="mb-3 p-2">
                                        <label for="rating" class="text-lg ft-7 form-label">Berikan Rating</label>

                                        <input name="rating" class="rating" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" step="0.5" style="--value:0" type="range" value="0">
                                    </div>
                                    <div class="mb-3 p-2">
                                        <label for="feedback" class="text-lg ft-7 form-label">Berikan Masukan dan Saran</label>
                                        <textarea rows="4" name="feedback" class="form-control" placeholder="Leave a comment here"></textarea>
                                    </div>
                                    <button class="btn btn-primary bg-first w-100"> Kirim Feedback</button>
                                </form>
                            <?php else : ?>
                                <div class="feedback p-2 p-md-3 border">
                                    <div class="d-flex justify-content-between py-2">
                                        <h6 class="fw-bold">Tanggapan Saya </h6>
                                        <div class="action-btn">
                                            <button class="btn btn-primary bg-first p-1 px-3 text-white text-lg" data-bs-toggle="modal" data-bs-target="#FeedbackModal"> <i class="bi bi-pencil-square"></i> Edit</button>
                                        </div>
                                    </div>

                                    <input name="rating" class="rating my-3 fs-6" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" step="0.5" style="--value:<?php echo $feedback->rating ?>" type="range" value="0" disabled>
                                    <p class="py-3"><?php echo $feedback->feedback ?></p>
                                </div>

                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <div id="mentoring" class="city bg-white p-3" style="display:none">
                        <h6>Gabung Mentoring Melalui Link di Bawah ini : </h6>
                        <a href="<?= $course->mentoring_link ?>" class="text-decoration-underline" target="_blank"><?= $course->mentoring_link ?></a>
                    </div>
                </div>

            </div>
            <div class="col-lg-5">
                <div class="right-content mb-5 pb-5">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="ft-7 mb-4">Perkembangan Belajar Anda</h6>
                            <div class="progress orange">
                                <?php
                                $width = $progress > 100 ? 100 : (int)($progress / 10) * 10; // Menghitung lebar progress bar

                                if ($width === 0) {
                                    $width = 0; // Atur lebar minimal jika progress = 0
                                }
                                ?>

                                <div class="progress-bar" id="progress" style="width:<?php echo $width; ?>%;background:#f7810e;">
                                </div>
                            </div>
                            <div class="progress-value fw-bold text-warning text-center"><span><?= round($progress) ?></span>%</div>
                        </div>
                    </div>

                    <?php if ($has_relation) : ?>
                        <!-- Success roll -->
                        <h6 class="ft-7 pt-3">Intro Kelas </h6>
                        <div class="list-course pt-1 d-flex flex-column gap-3 kelas">
                            <div class="bg-white rounded d-flex gap-2 px-15 border">
                                <div class=" icon-progress w-10 icon-center">
                                    <i id="icon-<?= $course->id ?>" class="text-center bi bi-check2-circle fs-5 text-success"></i>
                                </div>
                                <div class="course-progress w-75 block-center">
                                    <a href="<?= site_url('userBranch/classpath/detail_course/' . $course->id)  ?>" class="video-ready text-success">Intro Kelas</a>
                                </div>
                                <div class="time-course w-15 d-flex justify-content-end">
                                    <button id="button-<?= $course->id ?>" class="btn btn-success">
                                        <i class="bi bi-check-all"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php
                    $no = 1;
                    foreach ($playlists as $playlist) { ?>
                        <h6 class="ft-7 pt-3"><?php echo $playlist->name; ?></h6>
                        <?php foreach ($playlist->videos as $video) { ?>
                            <?php if ($video->id == $id_video->id) : ?>
                                <?php if ($video->status != 1) : ?>
                                    <form action="<?= site_url('userBranch/classpath/user_has_video/' . $video->id) ?>" method="post" id="form-id-detail" hidden>
                                        <input type="text" name="id_user" value="<?php echo $id_user ?>">
                                        <input type="text" name="id_video" value="<?= $id_video->id ?>">
                                        <input type="text" name="id_course" value="<?= $course->id ?>">
                                        <input type="text" name="status" value="1">
                                        <input type="text" name="progress" value="<?= $class_progress ?>">
                                    </form>
                                <?php endif ?>
                            <?php endif ?>
                            <div class="list-course pt-1 d-flex flex-column gap-3 kelas">
                                <div class="bg-white gap-2 rounded d-flex px-15 border">
                                    <?php if ($video->status == 1) : ?>
                                        <div class=" icon-progress w-10 icon-center">
                                            <i id="ready_icon" class="text-center bi bi-check2-circle fs-5 text-success"></i>
                                        </div>
                                    <?php else : ?>
                                        <div class=" icon-progress w-10 icon-center">
                                            <i id="ready_icon" class="text-center bx bx-pause-circle ready-icon"></i>
                                        </div>
                                    <?php endif ?>
                                    <div class="course-progress w-75 block-center">
                                        <?php if ($video->status == 1) : ?>
                                            <a href="<?= site_url('userBranch/classpath/detail_video_course/' . $course->id . "/" . $video->id)  ?>" class="video-ready text-success"><?= $video->title  ?></a>
                                        <?php else : ?>
                                            <a href="<?= site_url('userBranch/classpath/detail_video_course/' . $course->id . "/" . $video->id)  ?>" class="video-ready text-warning"><?= $video->title  ?></a>
                                        <?php endif ?>

                                    </div>
                                    <?php if ($video->id == $id_video->id) : ?>
                                        <div class="time-course w-15 d-flex justify-content-end" id="duration">
                                            <?php if ($video->status == 1) : ?>
                                                <button id="button-<?= $course->id ?>" class="btn btn-success">
                                                    <i class="bi bi-check-all"></i>
                                                </button>
                                            <?php else : ?>
                                                <?= $video->duration ?>min
                                            <?php endif ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="time-course w-15 d-flex justify-content-end"></div>
                                        <?php if ($video->status == 1) : ?>
                                            <button id="button-<?= $course->id ?>" class="btn btn-success">
                                                <i class="bi bi-check-all"></i>
                                            </button>
                                        <?php else : ?>
                                            <?= $video->duration ?>min
                                        <?php endif ?>
                                </div>
                            <?php endif ?>
                            </div>
                        <?php } ?>

                    <?php } ?>

                </div>
            </div>


        </div>
    </div>




    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
        // Global variable untuk menyimpan objek pemutar video
        var player;
        var isPlaying = false;
        var progressBar;
        var progressText;

        // Fungsi untuk memuat ulang halaman secara otomatis
        function reloadPage() {
            location.reload();
        }
        // Fungsi untuk memanggil API YouTube dan membuat pemutar video
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                videoId: '<?= $id_video->link ?>', // Ganti VIDEO_ID dengan ID video YouTube yang ingin diputar
                playerVars: {
                    autoplay: 1,
                    controls: 0,
                    disablekb: 1,
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                    fs: 1
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange,
                    'onError': onPlayerError // Menambahkan penanganan kesalahan pada pemutar video
                }
            });
            progressBar = document.getElementById('progressBar');
        }

        function onPlayerReady(event) {
            // Mendapatkan elemen iframe
            var iframe = event.target.getIframe();
            // Mengatur ukuran pemutar YouTube sesuai kebutuhan
            iframe.style.width = '100%';
            iframe.style.height = '25rem';
            document.getElementById('playPauseButton').disabled = false;
            document.getElementById('fullscreenButton').disabled = false;
            progressText = document.getElementById('progressText');
        }

        // Fungsi penanganan kesalahan pada pemutar video
        function onPlayerError(event) {
            // Memeriksa apakah kesalahan terjadi pada pemanggilan API YouTube
            if (event.data === 2 || event.data === 5 || event.data === 100 || event.data === 101 || event.data === 150) {
                // Memuat ulang halaman setelah 3 detik
                setTimeout(reloadPage, 3000);
            }
        }

        function changeVideoQuality() {
            // Mendapatkan daftar kualitas video yang tersedia
            var availableQualities = player.getAvailableQualityLevels();

            // Misalnya, Anda dapat mengubah kualitas ke "medium" saat tombol diklik
            // Ganti "medium" dengan kualitas yang diinginkan
            player.setPlaybackQuality("hd720");
        }

        function toggleFullscreen() {
            var iframe = player.getIframe();
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) {
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        }

        function togglePlayPause() {
            if (isPlaying) {
                player.pauseVideo();
                document.getElementById('playPauseButton').innerHTML = '<i class="bi bi-play-fill text-white"></i>';
                isPlaying = false;
            } else {
                player.playVideo();
                document.getElementById('playPauseButton').innerHTML = '<i class="bi bi-pause-fill text-white"></i>';
                isPlaying = true;
            }
        }
        // Fungsi untuk menangani perubahan status pemutar video
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING) {
                animateProgressBar();
                startDurationTimer();
                // showVideoDuration();
            } else if (event.data == YT.PlayerState.PAUSED) {
                // Video sedang dijeda
                stopDurationTimer();
            } else if (event.data == YT.PlayerState.ENDED) {
                document.getElementById("form-id-detail").submit();
                stopDurationTimer();
            } else {
                stopProgressBarAnimation();
            }
        }

        function animateProgressBar() {
            var duration = player.getDuration();
            var currentTime = player.getCurrentTime();

            var progressPercentage = (currentTime / duration) * 100;
            progressBar.style.width = progressPercentage + '%';
            progressText.textContent = formatTime(currentTime) + ' / ' + formatTime(duration);

            if (currentTime < duration) {
                setTimeout(animateProgressBar, 1000);
            }
        }

        function stopProgressBarAnimation() {
            progressBar.style.width = '0%';
            progressText.textContent = '';
        }

        function formatTime(time) {
            var minutes = Math.floor(time / 60);
            var seconds = Math.floor(time % 60);
            return pad(minutes) + ':' + pad(seconds);
        }

        function pad(value) {
            return value < 10 ? '0' + value : value;
        }


        function showVideoDuration() {
            // Mendapatkan durasi total video
            var duration = player.getDuration();

            // Memperbarui durasi video pada elemen HTML dengan id 'duration'
            var durationElement = document.getElementById('duration');
            durationElement.innerHTML = formatTime(duration);
        }

        function startDurationTimer() {
            // Memperbarui durasi video setiap detik
            timer = setInterval(updateDuration, 1000);
        }

        function stopDurationTimer() {
            // Menghentikan pembaruan durasi video
            clearInterval(timer);
        }

        function updateDuration() {
            // Mendapatkan waktu saat ini dalam video
            var currentTime = player.getCurrentTime();

            // Mendapatkan durasi total video
            var duration = player.getDuration();

            // Menghitung durasi yang tersisa
            var remainingTime = duration - currentTime;

            // Memperbarui durasi video pada elemen HTML dengan id 'duration'
            var durationElement = document.getElementById('duration');
            durationElement.innerHTML = formatTime(remainingTime);
        }

        function formatTime(time) {
            // Mengonversi waktu dalam detik menjadi format menit:detik
            var minutes = Math.floor(time / 60);
            var seconds = Math.floor(time % 60);
            return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        }

        function speedUpVideo(seconds) {
            var currentTime = player.getCurrentTime();
            var newTime = currentTime + seconds;
            player.seekTo(newTime, true);
        }

        function speedDownVideo(seconds) {
            var currentTime = player.getCurrentTime();
            var newTime = currentTime - seconds;
            player.seekTo(newTime, true);
        }
        
       
        function adjustPlayerSize() {
        var playerDiv = document.getElementById('player');

        if (window.innerWidth >= 768) {
            // Gaya untuk laptop
            playerDiv.style.width = '100%';
            playerDiv.style.height = '25rem';
        } else {
            // Gaya untuk layar hp
            playerDiv.style.width = '100%';
            playerDiv.style.height = '11.4rem';
        }
    }

    // Panggil fungsi saat halaman dimuat dan saat ukuran layar berubah
    window.addEventListener('load', adjustPlayerSize);
    window.addEventListener('resize', adjustPlayerSize);

 
       
    </script>

    <script>
        var speedUpButton = document.getElementById('speedUpButton');
        speedUpButton.addEventListener('click', function() {
            speedUpVideo(5); // Ganti angka 5 dengan jumlah detik yang Anda inginkan
        }, {
            passive: true
        });

        var speedDownButton = document.getElementById('speedDownButton');
        speedDownButton.addEventListener('click', function() {
            speedDownVideo(5); // Ganti angka 5 dengan jumlah detik yang Anda inginkan
        }, {
            passive: true
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.progress-value > span').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>
    <!--=============== Footer Tab and Desktop ===============-->
    <footer class="p-0 border rounded">
        <div class="d-flex justify-content-center">
            <p class="mt-3 ft-7">NaZMa Office &copy 2023
            </p>
        </div>
    </footer>


</body>