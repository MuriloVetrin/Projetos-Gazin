var playBtn = document.getElementById("playBtn");

var wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: '#ddd',
    progressColor: '#ff006c',
    barWidth: 4,
    responsive: true,
    height: 90,
    barRadius: 4
});

wavesurfer.load('media/teste.mpeg');

playBtn.onclick = function(){
    wavesurfer.playPause();
    if(playBtn.scroll.includes("1.jpeg")){
        playBtn.src = "media/2.jpeg";
    }else{
        playBtn.src = "media/1.jpeg";
    }
}

wavesurfer.on('finish', function(){
    playBtn.src = "media/1.jpeg";
    wavesurfer.stop();
})