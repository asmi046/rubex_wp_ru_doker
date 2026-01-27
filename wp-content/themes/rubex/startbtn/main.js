function undo() {
    document.getElementById("buttonStart").classList.remove('buttonStartGreen');
return
}

function start() {
    let timerId = setTimeout(() => {
        document.getElementById("buttonStart").classList.add('buttonStartGreen');
    }, 600);
}

var el = document.getElementById("buttonStart");
  el.addEventListener("touchstart", handleStart, false);
  el.addEventListener("click", handleStart, false);

  document.onkeydown  = handleStartKey;

  function handleStartKey(evt) {
    if (evt.code == "Space") start();
  }

  function handleStart(evt) {
    evt.preventDefault();
    console.log("touchstart.");
    start();
  }